<?php
include "../../config/connection.php";

if ($apiKey != $expectedApiKey) {
    $response = [
        'response' => 100,
        'success' => false,
        'message' => "ACCESS DENIED! You are not authorized to call this API!"
    ];
    echo json_encode($response);
    exit();
}

$accessKey = getBearerToken();

$fetchAccessKey = validateAccesskey($conn, $accessKey);
$array = json_decode($fetchAccessKey, true);
$check = $array[0]['check'];
$loginUserId = $array[0]['userId'];

if ($check == false) {
    $response = [
        'check' => $check,
        'response' => 101,
        'success' => false,
        'message' => "ERROR! Invalid AccessToken. Please LogIn Again."
    ];
    echo json_encode($response);
    exit();
}

$fetchProfile = mysqli_prepare($conn, "SELECT a.*, b.*, c.* FROM user_tab a JOIN setup_status_tab b ON a.statusId = b.statusId JOIN setup_title_tab c ON a.titleId = c.titleId WHERE a.userId=?");
mysqli_stmt_bind_param($fetchProfile, 's', $loginUserId);
mysqli_stmt_execute($fetchProfile);
$result = mysqli_stmt_get_result($fetchProfile);

$row = mysqli_fetch_assoc($result);
if ($row) {
    $response = [
        'check' => $check,
        "success" => true,
        "profile" => formatUsers($row)
    ];
}

echo json_encode($response);
exit();
