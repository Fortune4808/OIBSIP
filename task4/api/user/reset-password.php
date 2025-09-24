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

$emailAddress = trim($_POST['emailAddress']);

if (empty($emailAddress)) {
    $response = [
        'response' => 101,
        'success' => false,
        'message' => "ERROR! Enter your Email Address to continue."
    ];
    echo json_encode($response);
    exit();
}

if (filter_var($emailAddress, FILTER_VALIDATE_EMAIL)) {
    $query = mysqli_prepare($conn, "SELECT * FROM user_tab WHERE emailAddress = ?");
    mysqli_stmt_bind_param($query, 's', $emailAddress);
    mysqli_stmt_execute($query);
    $result = mysqli_stmt_get_result($query);

    if (mysqli_num_rows($result) > 0) {
        $success = mysqli_fetch_array($result);
        $userId = $success['userId'];
        $firstName = $success['firstName'];
        $middleName = $success['middleName'];
        $lastName = $success['lastName'];
        $emailAddress = $success['emailAddress'];
        $statusId = $success['statusId'];

        if ($statusId == 2) {
            $response = [
                'response' => 102,
                'success' => false,
                'message' => "ERROR! Account Suspended.",
            ];
            echo json_encode($response);
            exit();
        }

        if ($statusId == 1) {
            $otp = rand(111111, 999999);
            $expiryAt = date('Y-m-d H:i:s', time() + 600);
            $query = mysqli_prepare($conn, "UPDATE user_tab SET otp=?, expiryAt=? WHERE userId =?");
            mysqli_stmt_bind_param($query, 'iss', $otp, $expiryAt, $userId);
            mysqli_stmt_execute($query);

            $response = [
                'response' => 200,
                'success' => true,
                'message' => "SUCCESS! An OTP has been sent to your Email Address",
                'userId' => $userId,
                'firstName' => $firstName,
                'middleName' => $middleName,
                'lastName' => $lastName,
                'emailAddress' => $emailAddress
            ];
        }
    } else {
        $response = [
            'response' => 104,
            'success' => false,
            'message' => "ERROR! Email Address not Found."
        ];
    }
} else {
    $response = [
        'response' => 105,
        'success' => false,
        'message' => "ERROR! Invalid Email Address."
    ];
}
echo json_encode($response);
exit();
