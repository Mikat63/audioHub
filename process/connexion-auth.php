<?php
session_start();
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);
} else {
    echo json_encode([
        'status' => 'error-method',
        'message' => "Méthode non autorisée"
    ]);
    exit();
}

// verify if isset
if (!isset($data['email']) || empty(trim($data['email']))) {
    echo json_encode([
        'status' => 'email-error',
        'message' => "L'adresse mail est obligatoire"
    ]);
    exit();
}

if (!isset($data['password']) || empty(trim($data['password']))) {
    echo json_encode([
        'status' => 'password-error',
        'message' => 'Le mot de passe est obligatoire'
    ]);
    exit();
}

// verify format
if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
    echo json_encode([
        'status' => 'email-error',
        'message' => "Le format de l'email est incorrect"
    ]);
    exit();
};


$email = htmlspecialchars(strip_tags($data['email']));
$passwordUser = $data['password'];

try {
    require_once "../utils/db_connect.php";

    $request = $db->prepare('SELECT id, username, email, password FROM users WHERE email = :email');

    $request->execute([
        'email' => $email,
    ]);

    $user = $request->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        echo json_encode([
            'status' => 'no-account',
            'message' => 'aucun compte est associé à cete mail'
        ]);
        exit();
    }

    if (password_verify($passwordUser, $user['password'])) {
        $_SESSION['id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        echo json_encode([
            'status' => 'ok',
            'message' => 'is-connected'
        ]);
        exit();
    } else {
        echo json_encode([
            'status' => 'bad-password',
            'message' => 'Mot de passe incorrect'
        ]);
        exit();
    }
} catch (PDOException $error) {
    // Removed debug logs
    echo json_encode([
        'status' => 'error_server',
        'message' => "Une erreur s'est produite"
    ]);
    exit();
}
