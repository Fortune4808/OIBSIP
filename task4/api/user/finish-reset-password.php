<?php
include "../config/connection.php";

if ($apiKey != $expectedApiKey) {
    $response = [
        'response' => 100,
        'success' => false,
        'message' => "ACCESS DENIED! You are not authorized to call this API!"
    ];
    echo json_encode($response);
    exit();
}

$userId = trim($_POST['userId']);
$otp = trim($_POST['otp']);
$password = trim($_POST['password']);
$confirmedPassword = trim($_POST['confirmedPassword']);

if (empty($otp) || empty($password) || empty($confirmedPassword)) {
    $response = [
        'response' => 101,
        'success' => false,
        'message' => "ERROR! All Fields are Required."
    ];
    echo json_encode($response);
    exit();
}

if ($password != $confirmedPassword) {
    $response = [
        'response' => 102,
        'success' => false,
        'message' => "ERROR! Password not match with Confirmed Password."
    ];
    echo json_encode($response);
    exit();
}

$otpcheck = mysqli_prepare($conn, "SELECT a.* FROM user_tab a WHERE a.userId=? AND a.otp=?");
mysqli_stmt_bind_param($otpcheck, 'si', $userId, $otp);
mysqli_stmt_execute($otpcheck);
$result = mysqli_stmt_get_result($otpcheck);

if (mysqli_num_rows($result) > 0) {
    $success = mysqli_fetch_array($result);
    $expiryAt = $success['expiryAt'];

    if (time() > strtotime($expiryAt)) {
        $response = [
            'response' => 102,
            'success' => false,
            'message' => "ERROR! OTP has expired!",
        ];
        echo json_encode($response);
        exit();
    }

    $hashedpassword = password_hash($password, PASSWORD_DEFAULT);

    $query = mysqli_prepare($conn, "UPDATE `user_tab` SET password=? WHERE userId=?");
    mysqli_stmt_bind_param($query, 'ss', $hashedpassword, $userId);
    mysqli_stmt_execute($query);

    $response = [
        'response' => 200,
        'success' => true,
        'message' => "SUCCESS! Password Reset Successfully."
    ];
} else {
    $response = [
        'response' => 104,
        'success' => false,
        'message' => "ERROR! Invalid OTP."
    ];
}
echo json_encode($response);
exit();
