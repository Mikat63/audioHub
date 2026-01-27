<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=utf-8');


$json = file_get_contents('php://input');
$data = json_decode($json, true);


if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode([
        'status' => "error",
        'message' => "error"
    ]);
    exit();
};

if (!isset($data['status']) || !isset($data['page'])) {
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

if (!intval($data['page'])) {
    echo json_encode([
        'status' => "error",
        'message' => "page isn't int"
    ]);
    exit();
};

try {;

    $resultTracks = [];

    foreach ($tracks as $track) {
        $resultTracks[] = [
            'idTrack' => $track['id'],
            'coverSrc' => $track['img_path_small'],
            'album' => $track['title_album'],
            'title' => $track['title'],
            'artist' => $track['name'],
            'audioSrc' => $track['track_path'],
        ];
    };

    echo json_encode([
        'status' => 'success',
        'tracks' => $nextTracks
    ]);
} catch (\Throwable $error) {
    // Removed debug logs
    echo json_encode([
        'status' => 'error_server',
        'message' => "error from server"
    ]);
    exit();
}
