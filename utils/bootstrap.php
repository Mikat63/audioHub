<?php
if (!isset($_SESSION['user_id']) && !empty($_COOKIE['remember_me'])) {
    $token = $_COOKIE['remember_me'];

    $request = $db->prepare('SELECT 
                                username,
                                user_id,
                                token_hash
                            FROM 
                                remember_tokens
                            JOIN users on users.id = remember_tokens.user_id
                            WHERE expires_at > NOW()');

    $rememberTokens = $request->fetchAll(PDO::FETCH_ASSOC);

    foreach ($rememberTokens as $rememberToken) {
        if (password_verify($token, $rememberTokens['token_hash'])) {
            session_regenerate_id(true);
            $_SESSION['user_id'] = $rememberToken['user_id'];
            $_SESSION['user_username'] = $rememberToken['username'];
            break;
        }
    };
};
