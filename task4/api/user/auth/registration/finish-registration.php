<?php
include "../../../config/connection.php";

if ($apiKey != $expectedApiKey) {
    $response = [
        'response' => 100,
        'success' => false,
        'message' => "ACCESS DENIED! You are not authorized to call this API!"
    ];
    echo json_encode($response);
    exit();
}

$emailAddress = trim($_POST['emailAddress']);
$otp = trim($_POST['otp']);

if (empty($otp)) {
    $response = [
        'response' => 101,
        'success' => false,
        'message' => "ERROR! OTP Field is Required to Continue."
    ];
    echo json_encode($response);
    exit();
}

$query = mysqli_prepare($conn, "SELECT * FROM pending_user_tab WHERE emailAddress = ? AND otp = ? LIMIT 1");
mysqli_stmt_bind_param($query, 'si', $emailAddress, $otp);
mysqli_stmt_execute($query);
$result = mysqli_stmt_get_result($query);

if (mysqli_num_rows($result) > 0) {
    $fetchRecord = mysqli_fetch_array($result);
    $expiryAt = $fetchRecord['expiryAt'];
    $titleId = $fetchRecord['titleId'];
    $firstName = $fetchRecord['firstName'];
    $middleName = $fetchRecord['middleName'];
    $lastName = $fetchRecord['lastName'];
    $emailAddress = $fetchRecord['emailAddress'];
    $phoneNumber = $fetchRecord['phoneNumber'];
    $homeAddress = $fetchRecord['homeAddress'];
    $password = $fetchRecord['password'];

    if (time() > strtotime($expiryAt)) {
        $response = [
            'response' => 102,
            'success' => false,
            'message' => "ERROR! OTP has been expired.",
        ];
        echo json_encode($response);
        exit();
    }

    $customeId = getCustomId($conn, 'REG');
    $array = json_decode($customeId, true);
    $no = $array[0]['no'];
    $registrationId = 'REG' . date("Ymdhis") . $no;

    $insertRecord = mysqli_prepare($conn, "INSERT INTO user_tab(userId, titleId, statusId, firstName, middleName, lastName, emailAddress, phoneNumber, homeAddress, passport, password, createdTime) VALUES(?, ?, 1, ?, ?, ?, ?, ?, ?, 'default.jpg', ?, NOW())");
    mysqli_stmt_bind_param($insertRecord, 'sisssssss', $registrationId, $titleId, $firstName, $middleName, $lastName, $emailAddress, $phoneNumber, $homeAddress, $password);
    mysqli_stmt_execute($insertRecord);

    $deleteQuery = mysqli_prepare($conn, "DELETE FROM pending_user_tab WHERE emailAddress = ? AND otp = ?");
    mysqli_stmt_bind_param($deleteQuery, 'si', $emailAddress, $otp);
    mysqli_stmt_execute($deleteQuery);
    $result = mysqli_stmt_get_result($deleteQuery);

    $response = [
        'response' => 200,
        'success' => true,
        'message' => "SUCCESS! Registration has been successfully."
    ];
} else {
    $response = [
        'response' => 103,
        'success' => false,
        'message' => "ERROR! OTP is not Valid."
    ];
}
echo json_encode($response);
exit();
