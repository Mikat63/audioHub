# Authentification "Se souvenir de moi" sécurisée en PHP

Ce guide explique comment fonctionne un système de connexion persistante sécurisé ("remember me") en PHP, en s'appuyant sur le code de ton projet.

## 1. Principe général

- Lorsqu'un utilisateur coche "Se souvenir de moi" à la connexion, on génère un **token aléatoire**.
- Ce token est **stocké côté client** dans un cookie, et **stocké côté serveur** (en base de données) sous forme hashée.
- À chaque visite, si l'utilisateur n'a pas de session mais possède un cookie valide, on le reconnecte automatiquement.

---

## 2. Création du token et du cookie (connexion-auth.php)

```php
if (password_verify($passwordUser, $user['password'])) {
    if (isset($data['remember_me']) && $data['remember_me'] == true) {
        // Génère un token aléatoire
        $token = bin2hex(random_bytes(32));
        $tokenHash = password_hash($token, PASSWORD_DEFAULT);

        // Stocke le token hashé en BDD avec une date d'expiration
        $request = $db->prepare('INSERT INTO remember_tokens (user_id, token_hash, expires_at)
                                VALUES (:user_id, :token_hash, :expires_at)');
        $request->execute([
            'user_id' => $user['id'],
            'token_hash' => $tokenHash,
            'expires_at' => date('Y-m-d H:i:s', time() + 14 * 24 * 3600) // 2 semaines
        ]);

        // Crée le cookie côté client (non lisible JS, valable 2 semaines)
        setcookie(
            'remember_me',
            $token,
            [
                'expires' => time() + 14 * 24 * 3600,
                'httponly' => true,
                'path' => '/',
                'samesite' => 'Strict',
                // 'secure' => true // à activer en HTTPS
            ]
        );
    }
    // ...
}
```

**Explications** :

- `random_bytes(32)` : génère un token cryptographiquement sûr.
- `password_hash($token, PASSWORD_DEFAULT)` : on ne stocke jamais le token brut en BDD, seulement son hash.
- Le cookie est `httponly` (non accessible en JS), `samesite` (protection CSRF), et peut être `secure` (HTTPS).

---

## 3. Vérification automatique à la visite (bootstrap.php)

```php
if (!isset($_SESSION['user_id']) && !empty($_COOKIE['remember_me'])) {
    $token = $_COOKIE['remember_me'];

    $request = $db->prepare(
                'SELECT
                    username, user_id, token_hash
                 FROM remember_tokens
                 JOIN
                    users ON users.id = remember_tokens.user_id
                 WHERE
                    expires_at > NOW()');

    $rememberTokens = $request->fetchAll(PDO::FETCH_ASSOC);

    foreach ($rememberTokens as $rememberToken) {
        if (password_verify($token, $rememberToken['token_hash'])) {
            session_regenerate_id(true);
            $_SESSION['user_id'] = $rememberToken['user_id'];
            $_SESSION['user_username'] = $rememberToken['username'];
            break;
        }
    }
}
```

**Explications** :

- Si l'utilisateur n'a pas de session mais possède un cookie, on cherche un token non expiré en BDD.
- On compare le token du cookie (brut) avec le hash stocké (password_verify).
- Si c'est bon, on reconnecte l'utilisateur et on régénère l'ID de session (sécurité).

---

## 4. Sécurité et bonnes pratiques

- **Jamais stocker le token brut en BDD** : toujours le hasher.
- **Cookie HttpOnly** : empêche l'accès JS (XSS).
- **Cookie SameSite** : limite les attaques CSRF.
- **Cookie Secure** : à activer en production HTTPS.
- **Expiration** : le token et le cookie expirent en même temps (ici 2 semaines).
- **Régénération de session** : évite le vol de session.
- **Suppression du token** : à la déconnexion, supprime le cookie et le token en BDD.

---

## 5. Schéma de fonctionnement

1. L'utilisateur se connecte avec "Se souvenir de moi".
2. Un token aléatoire est généré, hashé et stocké en BDD avec une date d'expiration.
3. Le token brut est envoyé dans un cookie sécurisé côté client.
4. À chaque visite, si pas de session mais cookie présent, on vérifie le token côté serveur.
5. Si le token est valide et non expiré, l'utilisateur est reconnecté automatiquement.

---

**Ce système est robuste et conforme aux bonnes pratiques de sécurité web modernes.**
