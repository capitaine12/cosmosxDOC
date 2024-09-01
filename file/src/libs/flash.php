<?php

/* flash(

    'Inscription est en success',
    'Connectez vous.',
    'success',
);

redirect_with_message(
    'login.php',
    'Votre inscription est en sucesse. veillez vous connecter.'
); */

const FLASH = 'FLASH_MESSAGES';

const FLASH_ERROR = 'error';
const FLAS_WARNING = 'warning';
const FLASH_INFO = 'info';
const FLASH_SUCCESS = 'success';


/**
 * Create a flash message
 *
 * @param string $name
 * @param string $message
 * @param string $type
 * @return void
 */

//? ::::::::::::::::::::::::::: FONCTION DE CREATION DE MSG :::::::::::::::::::::::::::::::::::::::::

function create_flash_message(string $name, string $message, string $type): void
{

    //? suppression de la message existant avec le nom

    if (isset($_SESSION[FLASH][$name])) {

        unset($_SESSION[FLASH][$name]);
    }

    //? Ajout de la msg a la session

    $_SESSION[FLASH][$name] = ['message' => $message, 'type' => $type];
}

//? ::::::::::::::::::::::::::: FONCTION DE CREATION DES MSG :::::::::::::::::::::::::::::::::::::::::

/**
 * format a flash message
 *
 *@param array $flash_message
 *@return string

 */

//? ::::::::::::::::::::::::::: FONCTION DE FORMATAGE DES MSG :::::::::::::::::::::::::::::::::::::::::

function format_flash_message(array $flash_message): string
{
    return sprintf(

        '<div class="alert alert-%s">%s</div>',
        $flash_message['type'],
        $flash_message['message']

    );
}

//? ::::::::::::::::::::::::::: FONCTION ACTIVE DES MSG :::::::::::::::::::::::::::::::::::::::::

/**
 * Display a flash message
 * 
 * @param array string $name
 * @return void
 * 
 */

function display_flash_message(string $name): void
{
    if (!isset($_SESSION[FLASH][$name])) {

        return;
    }

    // rececoir le message de la session
    $flash_message = $_SESSION[FLASH][$name];


    //suppremé le message flash
    unset($_SESSION[FLASH][$name]);

    echo format_flash_message($flash_message);
}


/**
 * display all message
 *
 *@return void
 *
 *
 */

function display_all_flash_message(): void
{

    if (!isset($_SESSION[FLASH])) {

        return;
    }

    //recevoir le msg flash
    $flash_message = $_SESSION[FLASH];

    //supprimer les msg

    unset($_SESSION[FLASH]);

    //afficher les msg

    foreach ($flash_message as $flash_message) {

        echo format_flash_message($flash_message);
    }
}

/**
 * Flash a message
 *
 * @param string $name
 * @param string $message
 * @param string $type (error, warning, info, success)
 * @return void
 */

function flash(string $name = '', string $message = '', string $type = ''): void
{

    if ($name !== '' && $message !== '' && $type  !== '') {

        //créantion d'un msg flash

        create_flash_message($name, $message, $type);
    } elseif ($name !== '' && $message === '' && $type === '') {

        //activer un msg

        display_flash_message($name);
    } elseif ($name === '' && $message === '' && $type === '') {

        //activer tout les message

        display_all_flash_message();
    }
}

