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

$otp = rand(111111, 999999);
$expiryAt = date('Y-m-d H:i:s', time() + 600);
$query = mysqli_prepare($conn, "UPDATE user_tab SET otp=?, expiryAt=? WHERE userId =?");
mysqli_stmt_bind_param($query, 'iss', $otp, $expiryAt, $userId);
mysqli_stmt_execute($query);

$response = [
    'response' => 200,
    'success' => true,
    'message' => "SUCCESS! OTP Resent Successfully."
];
echo json_encode($response);
exit();
