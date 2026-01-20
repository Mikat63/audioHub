<?php
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
if (!isset($data['pseudo']) || empty(trim($data['pseudo']))) {
    echo json_encode([
        'status' => 'pseudo-error',
        'message' => 'Le pseudo est obligatoire'
    ]);
    exit();
}

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

if (!preg_match('/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-.]).{8,}$/', $data['password'])) {
    echo json_encode([
        'status' => 'password-error',
        'message' => "Le mot de passe doit contenir au moins 8 caractères, 1 majuscule et 1 caratcère spécial (#?!@$%^&*-)"
    ]);
    exit();
};

// verify length
if (strlen($data['pseudo']) < 5 || strlen($data['pseudo']) > 20) {
    echo json_encode([
        'status' => 'pseudo-error',
        'message' => 'Le pseudo doit être compris entre 5 et 2rror0 caractères'
    ]);
    exit();
};

if (strlen($data['password']) < 8 || strlen($data['password']) > 20) {
    echo json_encode([
        'status' => 'password-error',
        'message' => 'Le mot de passe doit doit être compris entre 8 et 20 caractères'
    ]);
    exit();
};

$pseudo = htmlspecialchars(strip_tags($data['pseudo']));
$email = htmlspecialchars(strip_tags($data['email']));
$passwordUser = password_hash($data['password'], PASSWORD_DEFAULT);

try {
    require_once "../utils/db_connect.php";
    // verify if username exist
    $request = $db->prepare('SELECT 
                        username
                       FROM 
                        users
                       WHERE 
                        username = :pseudo');
    $request->execute([
        'pseudo' => $pseudo
    ]);

    $user = $request->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Removed debug logs
        echo json_encode([
            'status' => 'error-pseudo-exist',
            'message' => 'Ce pseudo est déjà utilisé'
        ]);
        exit();
    }

    // verify if email exist
    $request = $db->prepare('SELECT 
                        email
                       FROM 
                        users
                       WHERE 
                        email = :email');
    $request->execute([
        'email' => $email
    ]);

    $user = $request->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Removed debug logs
        echo json_encode([
            'status' => 'error-email-exist',
            'message' => 'Cette adresse email est déjà utilisée'
        ]);
        exit();
    }

    // verify if email and pseudo exist in same account

    $request = $db->prepare('SELECT 
                        username,
                        email
                       FROM 
                        users
                       WHERE 
                        username = :pseudo AND email = :email');
    $request->execute([
        'pseudo' => $pseudo,
        'email' => $email
    ]);

    $user = $request->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Removed debug logs
        echo json_encode([
            'status' => 'error-account-exist',
            'message' => 'Un compte existe déjà'
        ]);
        exit();
    }

    // create user


    // Removed debug logs
    $request = $db->prepare("INSERT INTO 
                                users (username,email,password,role,created_at)
                                VALUES(:pseudo,:email,:password,:role,:createDate)");

    $request->execute([
        'pseudo' => $pseudo,
        'email' => $email,
        'password' => $passwordUser,
        'role' => "user",
        'createDate' => (new DateTime())->format('Y-m-d H:i:s')
    ]);

    // Removed debug logs
    echo json_encode([
        'status' => 'success',
        'message' => 'Ton compte est créé' . $pseudo . " Bienvenue !"
    ]);
    exit();
} catch (PDOException $error) {
    // Removed debug logs
    echo json_encode([
        'status' => 'error_server',
        'message' => "Une erreur s'est produite"
    ]);
    exit();
}
