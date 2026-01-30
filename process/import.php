<?php
header('Content-Type: application/json; charset=utf-8');

error_log(print_r($_POST, true));
error_log(print_r($_FILES, true));

// method verification
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode([
        'status' => 'method',
        'message' => 'Bad-method'
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
        'status' => 'title-not-exist-or-empty',
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

if (!isset($_POST['genre']) || empty(trim($_POST['genre']))) {
    echo json_encode([
        'status' => 'genre-not-exist-or-empty',
        'message' => "Le genre ne peut être vide"
    ]);
    exit();
};

// $_POST vérification length

if (strlen($_POST['title']) < 3 || strlen($_POST['title']) > 50) {
    echo json_encode([
        'status' => 'errror-title-length',
        'message' => "Le titre doit contenir entre 3 et 50 caractères"
    ]);
    exit();
}

if (strlen($_POST['artist']) < 3 || strlen($_POST['artist']) > 35) {
    echo json_encode([
        'status' => 'errror-artist-length',
        'message' => "L'artist doit contenir entre 3 et 50 caractères"
    ]);
    exit();
}

if (strlen($_POST['genre']) < 3 || strlen($_POST['genre']) > 35) {
    echo json_encode([
        'status' => 'errror-genre-length',
        'message' => "Le genre doit contenir entre 3 et 50 caractères"
    ]);
    exit();
}

if (isset($_POST['album'])) {
    if (empty(trim($_POST['album']))) {
        echo json_encode([
            'status' => 'errror-album-empty',
            'message' => "Le genre doit contenir entre 3 et 50 caractères"
        ]);
        exit();
    }
};
