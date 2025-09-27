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

$title = mysqli_prepare($conn, "SELECT a.titleId, a.titleName FROM setup_title_tab a");
mysqli_stmt_execute($title);
$result = mysqli_stmt_get_result($title);

if ($result && mysqli_num_rows($result) > 0) {
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $response = [
        'response' => 200,
        'success'  => true,
        'data'     => $data
    ];
} else {
    $response = [
        'response' => 404,
        'success'  => false,
        'message'  => 'No records found.'
    ];
}

echo json_encode($response);
exit;
