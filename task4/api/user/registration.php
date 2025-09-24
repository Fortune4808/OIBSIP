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

$titleId = trim($_POST['titleId']);
$firstName = strtoupper(trim($_POST['firstName']));
$middleName = strtoupper(trim($_POST['middleName']));
$lastName = strtoupper(trim($_POST['lastName']));
$emailAddress = strtolower(trim($_POST['emailAddress']));
$phoneNumber = trim($_POST['phoneNumber']);
$homeAddress = strtoupper(trim($_POST['homeAddress']));
$password = trim($_POST['password']);
$confirmedPassword = trim($_POST['confirmedPassword']);

if (empty($titleId) || empty($firstName) || empty($middleName) || empty($lastName) || empty($emailAddress) || empty($phoneNumber) || empty($homeAddress) || empty($password) || empty($confirmedPassword)) {
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

if (filter_var($emailAddress, FILTER_VALIDATE_EMAIL)) {

    if (checkExistingField($conn, 'pending_user_tab', 'emailAddress', $emailAddress)) {
        $response = [
            'response' => 103,
            'success' => false,
            'message' => "ERROR! An OTP has already been sent to $emailAddress"
        ];
        echo json_encode($response);
        exit();
    }

    if (checkExistingField($conn, 'user_tab', 'emailAddress', $emailAddress)) {
        $response = [
            'response' => 104,
            'success' => false,
            'message' => "ERORR! $emailAddress is already Exist"
        ];
        echo json_encode($response);
        exit();
    }

    $otp = rand(100000, 999999);
    $expiryAt = date('Y-m-d H:i:s', time() + 600);

    $hashedpassword = password_hash($password, PASSWORD_BCRYPT);
    $regOtp = mysqli_prepare($conn, "INSERT INTO pending_user_tab(titleId, firstName, middleName, lastName, emailAddress, phoneNumber, homeAddress, password, otp, expiryAt, createdTime) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())");
    mysqli_stmt_bind_param($regOtp, 'isssssssis', $titleId, $firstName, $middleName, $lastName, $emailAddress, $phoneNumber, $homeAddress, $hashedpassword, $otp, $expiryAt);
    mysqli_stmt_execute($regOtp);

    $response = [
        'response' => 200,
        'success' => true,
        'message' => "SUCCESS! Email Vefification OTP has been sent to $emailAddress"
    ];
} else {
    $response = [
        'response' => 106,
        'success' => false,
        'message' => "ERROR! $emailAddress is not a Valid Email Address!"
    ];
}

echo json_encode($response);
exit();
