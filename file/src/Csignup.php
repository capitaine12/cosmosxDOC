<?php
// Inclusion des fichiers nécessaires
include_once __DIR__ . '/bootstrap.php';
include_once __DIR__ . '/../config/database.php';

// Initialisation des variables
$errors = [];
$inputs = [];

if (is_post_request()) {

    // Définition des règles de validation pour chaque champ
    $fields = [
        'firstName' => 'required|varchar|firstName',
        'lastName' => 'required|varchar|lastName',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|secure',
        'cpassword' => 'required|same:password',
        'studyPath' => 'required|option',
        'level' => 'required|option',
        'agree' => 'required'
    ];

    // Messages personnalisés pour les erreurs
    $messages = [
        'cpassword' => [
            'required' => 'Confirmez votre mot de passe',
            'same' => 'Le mot de passe est incorrect'
        ],
        'agree' => [
            'required' => 'Vous devez accepter les conditions d\'utilisation des services avant inscription'
        ]
    ];

    // Récupération des données du formulaire
    $inputs = $_POST;

    // Validation des données
    $errors = validate($inputs, $fields, $messages);

    if ($errors) {
        // Redirection en cas d'erreurs
        redirect_with('signup.php', [
            'inputs' => $inputs,
            'errors' => $errors
        ]);
    } else {
        // Enregistrement de l'utilisateur en cas de succès
        if (register_user($inputs['firstName'], $inputs['lastName'], $inputs['email'], $inputs['studyPath'], $inputs['level'], $inputs['password'])) {
            // Redirection vers la page de connexion avec un message de succès
            redirect_with_message(
                'login.php',
                'Votre inscription est un succès. Veuillez vous connecter.'
            );
        } else {
            // Gestion du cas où l'enregistrement échoue (à ajouter selon votre besoin)
            $errors['register'] = 'L\'enregistrement a échoué. Veuillez réessayer.';
            redirect_with('signup.php', [
                'inputs' => $inputs,
                'errors' => $errors
            ]);
        }
    }
} elseif (is_get_request()) {
    // Récupération des données et erreurs depuis la session en cas de requête GET
    [$inputs, $errors] = session_flash('inputs', 'errors');
}
