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

try {
    require_once "../utils/db_connect.php";
    $numberPage = intval($data["page"]);
    $trackByPage = 50;


    if ($numberPage < 1) {
        $numberPage = 1;
    }

    $offset = ($numberPage - 1) * $trackByPage;

    $request = $db->prepare('SELECT
                                tracks.*,
                                artists.name,
                                albums.title AS title_album
                            FROM
                                tracks
                            LEFT JOIN artists on artists.id = tracks.artist_id
                            LEFT JOIN albums on albums.id = tracks.album_id
                            ORDER BY
                                listen_click ASC
                            LIMIT
                                :byPage
                            OFFSET
                                :offset
                            ');

    $request->bindValue('byPage', $trackByPage, PDO::PARAM_INT);
    $request->bindValue('offset', $offset, PDO::PARAM_INT);
    $request->execute();

    $tracksRaw = $request->fetchAll(PDO::FETCH_ASSOC);
    $tracks = [];
    foreach ($tracksRaw as $row) {
        $tracks[] = [
            'idTrack'   => htmlspecialchars(strip_tags($row['id'])),
            'coverSrc'  => htmlspecialchars(strip_tags($row['img_path_small'])),
            'album'     => htmlspecialchars(strip_tags($row['title_album'])),
            'title'     => htmlspecialchars(strip_tags($row['title'])),
            'artist'    => htmlspecialchars(strip_tags($row['name'])),
            'audioSrc'  => htmlspecialchars(strip_tags($row['track_path'])),
        ];
    }

    // query for count how page need
    $totalTracks = $db->prepare('SELECT 
                                count(*)
                             FROM
                                tracks');

    $totalTracks->execute();
    $total = $totalTracks->fetchColumn();

    $numberOfPages = ceil($total / $trackByPage);

    $nextTracks = [];

    foreach ($tracks as $track) {
        $nextTracks[] = [
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
        'numberPage' => $numberPage,
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
