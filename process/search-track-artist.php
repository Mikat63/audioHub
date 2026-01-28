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

if (!is_string($data['value'])) {
    echo json_encode([
        'status' => "error",
        'message' => "value isn't string"
    ]);
    exit();
};

try {
    require_once "../utils/db_connect.php";

    $value = htmlspecialchars(strip_tags($data['value']));

    $request = $db->prepare(
        'SELECT
            tracks.*,
            artists.name,
            albums.title AS title_album
        FROM    
            tracks
        JOIN albums ON albums.id = tracks.album_id
        JOIN artists ON artists.id = tracks.artist_id
        WHERE tracks.title LIKE :value OR artists.name LIKE :value'
    );

    $request->execute([
        ':value' => $value . "%"
    ]);

    $tracks = $request->fetchAll(PDO::FETCH_ASSOC);

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
        'tracks' => $resultTracks
    ]);
} catch (\Throwable $th) {

    echo json_encode([
        'status' => 'error_server',
        'message' => "error from server"
    ]);
    exit();
}
