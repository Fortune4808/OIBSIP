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

$accessKey = getBearerToken();
$userId = trim($_GET['userId']);

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

$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$itemsPerPage = 50;
$offset = ($page - 1) * $itemsPerPage;

$countQuery = "SELECT COUNT(*) as total FROM user_tab a WHERE a.userId!='$loginUserId'";
$countResult = mysqli_query($conn, $countQuery);
$totalUser = mysqli_fetch_assoc($countResult)['total'];

$totalPages = ceil($totalUser / $itemsPerPage);

if (empty($userId)) {
    $fetchProfile = mysqli_prepare($conn, "SELECT a.*, b.*, c.* FROM user_tab a JOIN setup_status_tab b ON a.statusId = b.statusId JOIN setup_title_tab c ON a.titleId = c.titleId WHERE a.userId!=? LIMIT ?, ?");
    mysqli_stmt_bind_param($fetchProfile, 'sii', $loginUserId, $offset, $itemsPerPage);
    mysqli_stmt_execute($fetchProfile);
    $result = mysqli_stmt_get_result($fetchProfile);

    $profiles = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $profiles[] = formatUsers($row);
    }

    if (!empty($profiles)) {
        $response = [
            'check' => $check,
            "success" => true,
            "profiles" => $profiles,
            'pagination' => [
                'currentPage' => $page,
                'totalUser' => $totalUser,
                'totalPages' => $totalPages,
                'nextPage' => ($page < $totalPages) ? $page + 1 : null,
                'prevPage' => ($page > 1) ? $page - 1 : null
            ],
            "documentStoragePath" => $documentStoragePath . 'user-passport'
        ];
    } else {
        $response = [
            'check' => $check,
            "success" => false,
            "message" => "No records found."
        ];
    }
    echo json_encode($response);
    exit();
}

$fetchProfile = mysqli_prepare($conn, "SELECT a.*, b.*, c.* FROM user_tab a JOIN setup_status_tab b ON a.statusId = b.statusId JOIN setup_title_tab c ON a.titleId = c.titleId WHERE a.userId=?");
mysqli_stmt_bind_param($fetchProfile, 's', $userId);
mysqli_stmt_execute($fetchProfile);
$result = mysqli_stmt_get_result($fetchProfile);

$row = mysqli_fetch_assoc($result);
if ($row) {
    $response = [
        'check' => $check,
        "success" => true,
        "profile" => formatUsers($row),
        "documentStoragePath" => $documentStoragePath . 'user-passport'
    ];
}

echo json_encode($response);
exit();
