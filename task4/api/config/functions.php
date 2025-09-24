<?php

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
    $query = mysqli_query($conn, "SELECT a.* FROM staff_tab a WHERE a.accessKey='$accessKey' AND a.status_id=1;") or die(mysqli_error($conn));
    $count = mysqli_num_rows($query);
    if ($count > 0) {
        $fetch_query = mysqli_fetch_array($query);
        $userId = $fetch_query['userId'];
        $check = 1;
    } else {
        $check = 0;
    }
    return ([
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
