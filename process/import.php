<?php
session_start();
header('Content-Type: application/json; charset=utf-8');

// method verification
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode([
        'status' => 'method',
        'message' => "Une erreur s'est produite"
    ]);
    exit();
}

// $_POST vérification if exist or empty
if (!isset($_POST['title']) || empty(trim($_POST['title']))) {
    echo json_encode([
        'status' => 'title-not-exist-or-empty',
        'message' => 'Le titre ne peut être vide'
    ]);
    exit();
};


if (!isset($_POST['artist']) || empty(trim($_POST['artist']))) {
    echo json_encode([
        'status' => 'artist-not-exist-or-empty',
        'message' => "L'artiste ne peut être vide"
    ]);
    exit();
};

if (!isset($_POST['genre']) || empty(trim($_POST['genre']))) {
    echo json_encode([
        'status' => 'genre-not-exist-or-empty',
        'message' => "Le genre ne peut être vide"
    ]);
    exit();
};

$title = trim($_POST['title']);
$artist = trim($_POST['artist']);
$genre = trim($_POST['genre']);

// $_POST vérification length
if (strlen($title) < 3 || strlen($title) > 50) {
    echo json_encode([
        'status' => 'error-title-length',
        'message' => "Le titre doit contenir entre 3 et 50 caractères"
    ]);
    exit();
};

if (strlen($artist) < 3 || strlen($artist) > 35) {
    echo json_encode([
        'status' => 'error-artist-length',
        'message' => "L'artiste doit contenir entre 3 et 35 caractères"
    ]);
    exit();
}

if (strlen($genre) < 3 || strlen($genre) > 35) {
    echo json_encode([
        'status' => 'error-genre-length',
        'message' => "Le genre doit contenir entre 3 et 35 caractères"
    ]);
    exit();
}

// control optionnal inputs
if (isset($_POST['album']) && trim($_POST['album']) !== '') {
    $album = trim($_POST['album']);

    if (strlen($album) < 2 || strlen($album) > 35) {
        echo json_encode([
            'status' => 'error-album-length',
            'message' => "L'album doit contenir entre 2 et 35 caractères"
        ]);
        exit();
    }
};

// $_FILES verification isset
if (isset($_FILES['input-music']) && $_FILES['input-music']['error'] === UPLOAD_ERR_OK) {
    $musicName = $_FILES['input-music']['name'];
    $musicFullPath = $_FILES['input-music']['full_path'];
    $musicType = $_FILES['input-music']['type'];
    $musicSize = $_FILES['input-music']['size'];
    $musicTmp = $_FILES['input-music']['tmp_name'];
} else {
    echo json_encode([
        'status' => 'error-music-not-exist',
        'message' => "Veuillez importer une track"
    ]);
    exit();
};

if (isset($_FILES['input-image']) && $_FILES['input-image']['error'] === UPLOAD_ERR_OK) {
    $imageName = $_FILES['input-image']['name'];
    $imageFullPath = $_FILES['input-image']['full_path'];
    $imageType = $_FILES['input-image']['type'];
    $imageSize = $_FILES['input-image']['size'];
    $imageTmp = $_FILES['input-image']['tmp_name'];
} else {
    echo json_encode([
        'status' => 'error-image-not-exist',
        'message' => "Veuillez importer une cover"
    ]);
    exit();
};

// $_FILES verification sizes
$maxSizeMusic = 50 * 1024 * 1024;
$maxSizeImage = 5 * 1024 * 1024;

if ($musicSize > $maxSizeMusic) {
    echo json_encode([
        'status' => 'error-music-too-big',
        'message' => "Le fichier ne doit pas dépasser 50Mo"
    ]);
    exit();
}


if ($imageSize > $maxSizeImage) {
    echo json_encode([
        'status' => 'error-image-too-big',
        'message' => "Le cover ne doit pas dépasser 5Mo"
    ]);
    exit();
}

// $_FILES verification extensions
$allowedExtMusic = ['mp3', 'flac', 'wav'];
$extMusic = strtolower(pathinfo($musicName, PATHINFO_EXTENSION));

if (!in_array($extMusic, $allowedExtMusic)) {
    echo json_encode([
        'status' => 'error-music-format',
        'message' => "Le format est incorrect"
    ]);
    exit();
};


$allowedExtImg = ['webp', 'jpeg', 'png', 'jpg'];
$extImg = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));

if (!in_array($extImg, $allowedExtImg)) {
    echo json_encode([
        'status' => 'error-image-format',
        'message' => "Le format est incorrect"
    ]);
    exit();
}

// $_FILES verification MIME
$finfo = finfo_open(FILEINFO_MIME_TYPE);
$musicMime = finfo_file($finfo, $musicTmp);

$allowedMimeMusic = ['audio/mpeg', 'audio/wav', 'audio/x-flac'];

if (!in_array($musicMime, $allowedMimeMusic)) {
    echo json_encode([
        'status' => 'error-music-mime',
        'message' => "Le type du fichier est incorrect"
    ]);
    exit();
}

$imageMime = finfo_file($finfo, $imageTmp);

$allowedMimeimage = ['image/png', 'image/jpeg', 'image/webp',];

if (!in_array($imageMime, $allowedMimeimage)) {
    echo json_encode([
        'status' => 'error-image-mime',
        'message' => "Le type du fichier est incorrect"
    ]);
    exit();
}
finfo_close($finfo);


// add in bdd  
try {
    require_once "../utils/db_connect.php";

    // verify genre or create it and $genre became the genre id
    $request = $db->prepare('SELECT
                                *
                            FROM 
                                genres
                            WHERE
                                LOWER(name) = :genre
                            ');

    $request->execute([
        ':genre' => strtolower($genre)
    ]);

    $genreRequest = $request->fetch();

    if ($genreRequest) {
        $genre = $genreRequest['id'];
    } else {
        $request = $db->prepare('INSERT INTO 
                                    genres(name)
                                VALUES 
                                    (:genre)
                                ');
        $request->execute([
            ':genre' => $genre
        ]);

        $genre = $db->lastInsertId();
    };

    // verify artist or create it and $genre became the genre id
    $request = $db->prepare('SELECT
                                *
                            FROM 
                                artists
                            WHERE
                                LOWER(name) = :name
                            ');

    $request->execute([
        ':name' => strtolower($artist)
    ]);

    $artistRequest = $request->fetch();

    if ($artistRequest) {
        $artist = $artistRequest['id'];
    } else {
        $request = $db->prepare('INSERT INTO 
                                    artists(name)
                                VALUES 
                                    (:name)
                                ');
        $request->execute([
            ':name' => $artist
        ]);

        $artist = $db->lastInsertId();
    };

    // verify album or create it and $genre became the genre id
    $albumId = null;

    if (isset($album)) {
        $request = $db->prepare('SELECT
                                *
                            FROM 
                                albums
                            WHERE
                                LOWER(title) = :title AND id_artist = :idArtist
                            ');

        $request->execute([
            ':title' => strtolower($album),
            ':idArtist' => $artist
        ]);

        $albumRequest = $request->fetch();

        if ($albumRequest) {
            $albumId = $albumRequest['id'];
        } else {
            $request = $db->prepare('INSERT INTO 
                                    albums(title,id_artist)
                                VALUES 
                                    (:title, :idArtist)
                                ');
            $request->execute([
                ':title' => $album,
                ':idArtist' => $artist
            ]);

            $albumId = $db->lastInsertId();
        }
    };

    // add track in bdd and return json success
    $request = $db->prepare('SELECT
                                *
                            FROM
                                tracks
                            WHERE title = :title 
                                AND artist_id = :artist_id 
                            ');


    $request->execute([
        ':title' => $title,
        ':artist_id' => $artist,

    ]);

    $searchTrack = $request->fetch();

    if ($searchTrack) {
        echo json_encode([
            'status' => 'track-exist-yet',
            'message' => "Cette track existe déjà"
        ]);
        exit();
    }

    // move files
    $destinationMusic = '../assets/tracks/' . uniqid() . '_' . basename($musicName);
    if (!move_uploaded_file($musicTmp, $destinationMusic)) {
        echo json_encode([
            'status' => 'error-move-music',
            'message' => "Une erreur s'est produite"
        ]);
        exit();
    }



    $destinationImg = '../assets/covers/' . uniqid() . '_' . basename($imageName);
    if (!move_uploaded_file($imageTmp, $destinationImg)) {
        echo json_encode([
            'status' => 'error-move-image',
            'message' => "Une erreur s'est produite"
        ]);
        exit();
    }

    $request = $db->prepare(
        'INSERT INTO
            tracks(title,artist_id,album_id,genre_id,img_path_small,id_user,created_at,track_path)
         VALUES
            (:title,:artist_id,:album_id,:genre_id,:img_path_small,:id_user,:created_at,:track_path)'
    );
    $request->execute([
        ':title' => $title,
        ':artist_id' => $artist,
        ':album_id' => $albumId,
        ':genre_id' => $genre,
        ':img_path_small' => $destinationImg,
        ':id_user' => $_SESSION['user_id'],
        ':created_at' => (new DateTime())->format('Y-m-d H:i:s'),
        ':track_path' => $destinationMusic
    ]);


    echo json_encode([
        'status' => 'success',
        'message' => "Importation de la track réussi !"
    ]);
    exit();
} catch (PDOException $error) {

    if (isset($destinationMusic) && file_exists($destinationMusic)) {
        unlink($destinationMusic);
    }

    if (isset($destinationImg) && file_exists($destinationImg)) {
        unlink($destinationImg);
    }


    echo json_encode([
        'status' => 'error-server',
        'message' => "Une erreur s'est produite"
    ]);
    exit();
}
