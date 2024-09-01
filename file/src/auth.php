<?php

function register_user(
    string $firstName, 
    string $lastName, 
    string $email, 
    string $studyPath, 
    string $level, 
    string $password, 
    bool $isAdmin = false,
    
): bool {
    $sql = 'INSERT INTO users (firstName, lastName, email, studyPath, level, password, is_admin) 
            VALUES (:firstName, :lastName, :email, :studyPath, :level, :password, :is_admin)';



    try {
        $db = getConecte();
        $statement = $db->prepare($sql);

       
        // Validation de l'email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Invalid email format");
        }

        // Binding des valeurs
        $statement->bindValue(':firstName', htmlspecialchars($firstName, ENT_QUOTES, 'UTF-8'), PDO::PARAM_STR);
        $statement->bindValue(':lastName', htmlspecialchars($lastName, ENT_QUOTES, 'UTF-8'), PDO::PARAM_STR);
        $statement->bindValue(':email', htmlspecialchars($email, ENT_QUOTES, 'UTF-8'), PDO::PARAM_STR);
        $statement->bindValue(':studyPath', htmlspecialchars($studyPath, ENT_QUOTES, 'UTF-8'), PDO::PARAM_STR);
        $statement->bindValue(':level', htmlspecialchars($level, ENT_QUOTES, 'UTF-8'), PDO::PARAM_STR);
        $statement->bindValue(':password', password_hash($password, PASSWORD_BCRYPT), PDO::PARAM_STR);
        $statement->bindValue(':is_admin', (int)$isAdmin, PDO::PARAM_INT);

        // Exécution de la requête
        return $statement->execute();
    } catch (Exception $e) {
        // Gestion des erreurs
        error_log('Error in register_user: ' . $e->getMessage());
        return false;
    }
}

//? :::::::::::::::::::::::::::: FONCTION DE DECONNEXION :::::::::::::::::::::::::::
/* function is_user_logged_in(): bool {
    return isset($_SESSION['email']); // ou toute autre logique pour vérifier si un utilisateur est connecté
}

function logout(): void
{
    if (is_user_logged_in()) {
        unset($_SESSION['email'], $_SESSION['id']);
        session_destroy();
        redirect_to('/public/login.php');
    }
}


//? :::::::::::::::::::::::::::: renvoi le nom de l'utilisateur :::::::::::::::::::::::::::

function current_user()
{
    if(is_user_logged_in()){
        return $_SESSION['firstName'];
    }

    return null;
} */

// Fonction pour trouver un utilisateur par email
function find_user_by_email(string $email) {
    $db = getConecte();
    $sql = 'SELECT id, firstName, lastName, email, password, is_admin FROM users WHERE email = :email';
    $statement = $db->prepare($sql);
    $statement->bindValue(':email', $email, PDO::PARAM_STR);
    $statement->execute();
    return $statement->fetch();
}


// Fonction pour connecter un utilisateur
function login(string $email, string $password): bool {
    $user = find_user_by_email($email);
    if ($user && password_verify($password, $user['password'])) {
        session_regenerate_id();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['firstName'] = $user['firstName'];
        return true;
    }
    return false;
}






