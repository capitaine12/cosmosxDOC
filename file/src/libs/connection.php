<?php

/**
 * ? Connection a la basse de donnée et un return instance de la classe PDO
 * ? ou false si la connection est faible
 * 
 * @return PDO
 */

 function getConecte(): PDO {

    static $pdo;

    if (!$pdo) {
        
        $pdo = new PDO (

            sprintf("mysql:host:=%s;dbname=%s;charchet=UTF8",DB_HOST, DB_NAME),
            DB_USER,
            DB_PASSWORD,
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
    }

    return $pdo;
 }