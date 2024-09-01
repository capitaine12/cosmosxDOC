<?php
include_once __DIR__ . '/../src/bootstrap.php';



$errors = [];
$inputs = [];

if (is_post_request()) {
    // Validation des entrées
    [$inputs, $errors] = filter($_POST, [
        'email' => 'string|required|email',
        'password' => 'string|required'
    ]);

    // Si des erreurs existent, rediriger avec des erreurs
    if ($errors) {
        redirect_with('/public/login.php', ['errors' => $errors, 'inputs' => $inputs]);
    }

    // Si la connexion échoue, retourner une erreur
    if (!login($inputs['email'], $inputs['password'])) {
        $errors['login'] = 'Mot de passe ou Email invalide';
        redirect_with('/public/login.php', ['errors' => $errors, 'inputs' => $inputs]);
    }

    // Rediriger en cas de succès
    redirect_to('../index.php');
} else {
    // Récupérer les erreurs et les entrées en session
    [$errors, $inputs] = session_flash('errors', 'inputs');
}