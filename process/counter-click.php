<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=utf-8');


$json = file_get_contents('php://input');
$data = json_decode($json, true);

error_log(print_r($json, true));


if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode([
        'status' => "error",
        'message' => "error"
    ]);
    exit();
};

if (!isset($data['trackId']) || !isset($data['counterValue'])) {
    echo json_encode([
        'status' => "error",
        'message' => "no infos"
    ]);
    exit();
};


if (!intval($data['trackId']) || !intval($data['counterValue'])) {
    echo json_encode([
        'status' => "error",
        'message' => "Value is not an int"
    ]);
    exit();
};

try {
    require_once "../utils/db_connect.php";

    $trackId = intval($data['trackId']);
    $counterValue = intval($data['counterValue']);

    $request = $db->prepare(
        'UPDATE 
                                tracks
                              SET
                                listen_click = listen_click + :counterValue
                              WHERE
                                id = :trackId'
    );

    $request->execute([
        ':trackId' => $trackId,
        ':counterValue' => $counterValue
    ]);

    echo json_encode([
        'status' => 'success click add on bdd',
        'trackId' => $trackId
    ]);
} catch (\Throwable $error) {
    echo json_encode([
        'status' => 'error_server',
        'message' => "error from server"
    ]);
    exit();
}
