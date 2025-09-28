<?php

function getAuthorizationHeader()
{
    if (isset($_SERVER['HTTP_AUTHORIZATION'])) {
        return trim($_SERVER['HTTP_AUTHORIZATION']);
    } elseif (function_exists('apache_request_headers')) {
        $headers = apache_request_headers();
        if (isset($headers['Authorization'])) {
            return trim($headers['Authorization']);
        }
    }
    return null;
}

function getBearerToken()
{
    $header = getAuthorizationHeader();
    if ($header && preg_match('/Bearer\s(\S+)/', $header, $matches)) {
        return $matches[1];
    }
    return null;
}

function getCustomId($conn, $item)
{
    $count = mysqli_fetch_array(mysqli_query($conn, "SELECT countValue FROM setup_master_count_tab WHERE countId = '$item' FOR UPDATE"));
    $num = $count[0] + 1;
    mysqli_query($conn, "UPDATE `setup_master_count_tab` SET `countValue` = '$num' WHERE countId = '$item'") or die(mysqli_error($conn));
    if ($num < 10) {
        $no = '00' . $num;
    } elseif ($num >= 10 && $num < 100) {
        $no = '0' . $num;
    } else {
        $no = $num;
    }
    return json_encode([
        ["no" => $no]
    ]);
}

function validateAccesskey($conn, $accessKey)
{
    $query = mysqli_query($conn, "SELECT a.* FROM user_tab a WHERE a.accessKey='$accessKey' AND a.statusId=1;") or die(mysqli_error($conn));
    $count = mysqli_num_rows($query);
    if ($count > 0) {
        $fetchQuery = mysqli_fetch_array($query);
        $userId = $fetchQuery['userId'];
        $check = true;
    } else {
        $check = false;
    }
    return json_encode([
        ["userId" => $userId, "check" => $check]
    ]);
}

function checkExistingField($conn, $table, $field, $value)
{
    $query = mysqli_query($conn, "SELECT * FROM $table WHERE $field = '$value'");
    return mysqli_num_rows($query) > 0;
}

function validateTextInput($input)
{
    $input = trim($input);
    return empty($input) || preg_match("/^[a-zA-Z\s]+$/", $input);
}


function validatePhoneNumber($input)
{
    $input = trim($input);
    return preg_match("/^[\d\s()+-]+$/", $input); // Allow digits, spaces, parentheses, and dashes
}

function formatUsers($row)
{
    return [
        "userId" => $row['userId'],
        "firstName" => $row['firstName'],
        "middleName" => $row['middleName'],
        "lastName" => $row['lastName'],
        "emailAddress" => $row['emailAddress'],
        "phoneNumber" => $row['phoneNumber'],
        "homeAddress" => $row['homeAddress'],
        "status" => [
            "statusId" => $row['statusId'],
            "statusName" => $row['statusName']
        ],
        "title" => [
            "titleId" => $row['titleId'],
            "titleName" => $row['titleName']
        ],
        "passport" => $row['passport'],
        "lastLogin" => $row['lastLogin'],
        "createdTime" => $row['createdTime']
    ];
}
