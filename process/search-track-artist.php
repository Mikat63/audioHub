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

if (!isset($data['status']) || !isset($data['value'])) {
    echo json_encode([
        'status' => "error",
        'message' => "no infos"
    ]);
    exit();
};

if (!is_string($data['status'])) {
    echo json_encode([
        'status' => "error",
        'message' => "status isn't string"
    ]);
    exit();
};

if (!intval($data['value'])) {
    echo json_encode([
        'status' => "error",
        'message' => "value isn't int"
    ]);
    exit();
};

try {
    $value = $data['value']

    
} catch (\Throwable $th) {
    //throw $th;
}