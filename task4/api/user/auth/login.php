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

$emailAddress = trim($_POST['emailAddress']);
$password = trim($_POST['password']);

if (empty($emailAddress)  || empty($password)) {
    $response = [
        'response' => 101,
        'success' => false,
        'message' => "LOGIN ERROR! Fill all fields to continue."
    ];
    echo json_encode($response);
    exit();
}

if (filter_var($emailAddress, FILTER_VALIDATE_EMAIL)) {
    $loginEmailQuery = mysqli_prepare($conn, "SELECT a.*, b.*, c.* FROM user_tab a JOIN setup_status_tab b ON a.statusId = b.statusId JOIN setup_title_tab c ON a.titleId = c.titleId WHERE a.emailAddress=?");
    mysqli_stmt_bind_param($loginEmailQuery, 's', $emailAddress);
    mysqli_stmt_execute($loginEmailQuery);
    $result = mysqli_stmt_get_result($loginEmailQuery);

    if (mysqli_num_rows($result) > 0) {
        $fetch = mysqli_fetch_array($result);
        $hashedpassword = $fetch['password'];
        $statusId = $fetch['statusId'];
        $userId = $fetch['userId'];

        if (password_verify($password, $hashedpassword)) {
            if ($statusId == 1) {
                $accessKey = password_hash($userId . date("Ymdhis"), PASSWORD_DEFAULT);
                $updateAccesskey = mysqli_prepare($conn, "UPDATE user_tab SET accessKey=?, lastLogin=NOW() WHERE userId=?");
                mysqli_stmt_bind_param($updateAccesskey, 'ss', $accessKey, $userId);
                mysqli_stmt_execute($updateAccesskey);

                $response = [
                    'response' => 200,
                    'success' => true,
                    'message' => "LOGIN SUCCESS! User successfully logged in",
                    'accessKey' => $accessKey
                ];
            } else {
                $response = [
                    'response' => 103,
                    'success' => false,
                    'message' => "LOGIN ERROR! Account is Inactive",
                ];
            }
        } else {
            $response = [
                'response' => 104,
                'success' => false,
                'message' => "LOGIN ERROR! Invalid Login Credentials!",
            ];
        }
    }
} else {
    $response = [
        'response' => 105,
        'success' => false,
        'message' => "Invalid Email Format"
    ];
}
echo json_encode($response);
exit();
