<?php

//? :::::::::::::::::::::::::::: FONCTION POUR LE TITRES DES PAGES DYNAMIQUE :::::::::::::::::::::::::::
function view(string $filename, array $data = []) : void 
{
    foreach ($data as $key => $value){
        $$key = $value;
    }
    include_once __DIR__ . DIRECTORY_SEPARATOR . $filename . '.php'; 
}

//? :::::::::::::::::::::::::::: FONCTION POUR VERIFIER LES REQUETTES HTTP POST :::::::::::::::::::::::::::
function is_post_request(): bool
{
    return strtoupper($_SERVER['REQUEST_METHOD']) === 'POST';
}

//? :::::::::::::::::::::::::::: FONCTION POUR VERIFIER LES REQUETTES HTTP GET :::::::::::::::::::::::::::
function is_get_request(): bool
{
    return strtoupper($_SERVER['REQUEST_METHOD']) === 'GET';
}

//? :::::::::::::::::::::::::::: FONCTION DE STYLISATION DES MESSAGES D'ERREUR :::::::::::::::::::::::::::
function error_class(array $errors, string $field): string
{
    return isset($errors[$field]) ? 'error' : '';
}

//? :::::::::::::::::::::::::::: FONCTION DE REDIRECTIONS :::::::::::::::::::::::::::
function redirect_to(string $url): void
{
    header('location: ' . $url);
    exit;
}

function redirect_with(string $url, array $items): void 
{
    foreach ($items as $key => $value) {
        $_SESSION[$key] = $value;
    }
    redirect_to($url);
}

function redirect_with_message(string $url, string $message, string $type = FLASH_SUCCESS): void
{
    flash('flash_' . uniqid(), $message, $type);
    redirect_to($url);
}

/**
 * Flash data specified by $keys from the $_SESSION
 * @param mixed ...$keys
 * @return array
 */
function session_flash(...$keys): array
{
    $data = [];
    foreach ($keys as $key) {
        if (isset($_SESSION[$key])) {
            $data[] = $_SESSION[$key];
            unset($_SESSION[$key]);
        } else {
            $data[] = [];
        }
    }
    return $data;
}


//? :::::::::::::::::::::::::::: FONCTION RECHERCHE DE L'UTILISATEUR PAR SON EMAIL :::::::::::::::::::::::::::


/* // Fonction pour rechercher un utilisateur par email
function find_user_by_email(string $email) {
    $sql = 'SELECT userid, email, password FROM users WHERE email = :email';

    $statement = getConecte()->prepare($sql);
    $statement->bindValue(':email', $email, PDO::PARAM_STR);
    $statement->execute();

    return $statement->fetch(PDO::FETCH_ASSOC);
}

// Fonction de connexion
function login(string $email, string $password): bool {
    $user = find_user_by_email($email);

    if ($user && password_verify($password, $user['password'])) {
        session_regenerate_id();
        $_SESSION['email'] = $user['email'];
        $_SESSION['id'] = $user['userid'];
        $_SESSION['firstName'] = $user['firstName']; // Si vous avez le prénom de l'utilisateur
        return true;
    }

    return false;
}

// Fonction de déconnexion
function logout(): void {
    if (is_user_logged_in()) {
        unset($_SESSION['email'], $_SESSION['id'], $_SESSION['firstName']);
        session_destroy();
        redirect_to('public/login.php');
    }
} */

// Fonction pour déconnecter un utilisateur
function logout(): void {
    unset($_SESSION['user_id'], $_SESSION['email'], $_SESSION['firstName']);
    session_destroy();
}

// Fonction pour vérifier si un utilisateur est connecté
function is_user_logged_in(): bool {
    return isset($_SESSION['user_id']);
}

// Fonction pour obtenir l'utilisateur actuel
function current_user() {
    if (is_user_logged_in()) {
        return $_SESSION['firstName'];
    }
    return null;
}




