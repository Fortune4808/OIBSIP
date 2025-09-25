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

$otp = rand(111111, 999999);
$expiryAt = date('Y-m-d H:i:s', time() + 600);
$query = mysqli_prepare($conn, "UPDATE pending_user_tab SET otp=?, expiryAt=? WHERE emailAddress =?");
mysqli_stmt_bind_param($query, 'iss', $otp, $expiryAt, $emailAddress);
mysqli_stmt_execute($query);
mysqli_stmt_close($query);

$response = [
    'response' => 200,
    'success' => true,
    'message' => "OTP Resent Successfully!"
];
echo json_encode($response);
exit();
