<?php
include_once __DIR__ . '../../../config/database.php';

const DEFAULT_VALIDATION_ERRORS = [
    'required' => 'Le %s est obligatoire',
    'email' => 'Le %s n\'est pas une adresse email valide',
    'min' => 'Le %s doit avoir au moins %s caractères',
    'max' => 'Le %s doit avoir au maximum %s caractères',
    'between' => 'Le %s doit avoir entre %d et %d caractères',
    'same' => 'Le %s doit être identique à %s',
    'option' => 'Une option doit être choisie',
    'varchar' => 'Le %s et le %s sont obligatoires',
    'secure' => 'Le %s doit comporter entre 8 et 64 caractères, une lettre majuscule, une lettre minuscule et un caractère spécial',
    'unique' => 'Le %s existe déjà',
];

/**
 * VALIDATION
 * @param array $data
 * @param array $fields
 * @param array $messages
 * @return array
 */
function validate(array $data, array $fields, array $messages = []): array
{
    $split = fn($str, $separator) => array_map('trim', explode($separator, $str));

    $rule_messages = array_filter($messages, fn($message) => is_string($message));
    $validation_errors = array_merge(DEFAULT_VALIDATION_ERRORS, $rule_messages);

    $errors = [];

    if (!is_valid_name($data['firstName'])) {
        $errors['firstName'] = 'Le prénom ne peut contenir que des lettres et des espaces.';
    }
    
    if (!is_valid_name($data['lastName'])) {
        $errors['lastName'] = 'Le nom ne peut contenir que des lettres et des espaces.';
    }

    foreach ($fields as $field => $option) {
        $rules = $split($option, '|');

        foreach ($rules as $rule) {
            $params = [];

            if (strpos($rule, ':')) {
                [$rule_name, $param_str] = $split($rule, ':');
                $params = $split($param_str, ',');
            } else {
                $rule_name = trim($rule);
            }

            $fn = 'is_' . $rule_name;

            if (function_exists($fn)) {
                $pass = $fn($data, $field, ...$params);

                if (!$pass) {
                    $errors[$field] = htmlspecialchars(sprintf(
                        $messages[$field][$rule_name] ?? $validation_errors[$rule_name],
                        htmlspecialchars($field, ENT_QUOTES, 'UTF-8'),
                        ...$params
                    ), ENT_QUOTES, 'UTF-8');
                }
            }
        }
    }

    return $errors;
}

/**
 * Retourne vrai si une chaîne n'est pas vide.
 * @param array $data
 * @param string $field
 * @return bool
 */
function is_required(array $data, string $field): bool
{
    return isset($data[$field]) && trim($data[$field]) !== '';
}

/**
 * Renvoie vrai si la valeur de l'email est valide.
 * @param array $data
 * @param string $field
 * @return bool
 */
function is_email(array $data, string $field): bool
{
    if (empty($data[$field])) {
        return true;
    }

    return filter_var($data[$field], FILTER_VALIDATE_EMAIL) !== false;
}

/**
 * Renvoie vrai si une chaîne a au moins la longueur minimale.
 * @param array $data
 * @param string $field
 * @param int $min
 * @return bool
 */
function is_min(array $data, string $field, int $min): bool
{
    if (!isset($data[$field]) || !is_string($data[$field])) {
        return false;
    }

    return mb_strlen($data[$field]) >= $min;
}

/**
 * Renvoie vrai si une chaîne ne dépasse pas la longueur maximale.
 * @param array $data
 * @param string $field 
 * @param int $max
 * @return bool
 */
function is_max(array $data, string $field, int $max): bool
{
    if (!isset($data[$field]) || !is_string($data[$field])) {
        return false;
    }

    return mb_strlen($data[$field]) <= $max;
}

/**
 * Renvoie vrai si une chaîne est entre la longueur minimale et maximale.
 * @param array $data
 * @param string $field
 * @param int $min
 * @param int $max
 * @return bool
 */
function is_between(array $data, string $field, int $min, int $max): bool
{
    if (!isset($data[$field]) || !is_string($data[$field])) {
        return false;
    }

    $len = mb_strlen($data[$field]);
    return $len >= $min && $len <= $max;
}

/**
 * Renvoie vrai si une chaîne est égale à une autre chaîne.
 * @param array $data
 * @param string $field
 * @param string $other
 * @return bool
 */
function is_same(array $data, string $field, string $other): bool
{
    return isset($data[$field], $data[$other]) && $data[$field] === $data[$other];
}

/**
 * Renvoie vrai si une chaîne est alphanumérique.
 * @param array $data
 * @param string $field
 * @return bool
 *//* 
function is_alphanumeric(array $data, string $field): bool
{
    if (!isset($data[$field])) {
        return false;
    }

    return ctype_alnum($data[$field]);
} */

/**
 * Renvoie vrai si le mot de passe est sécurisé.
 * @param array $data
 * @param string $field
 * @return bool
 */
function is_secure(array $data, string $field): bool
{
    if (!isset($data[$field])) {
        return false;
    }

    $pattern = "#.*^(?=.{8,64})(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*\W).*$#";
    return preg_match($pattern, $data[$field]) === 1;
}

/**
 * Renvoie vrai si la valeur est unique dans une colonne d'une table.
 * @param array $data
 * @param string $field
 * @param string $table
 * @param string $column
 * @return bool
 */
function is_unique(array $data, string $field, string $table, string $column): bool
{
    if (!isset($data[$field])) {
        return false;
    }

    $sql = "SELECT $column FROM $table WHERE $column = :value LIMIT 1";

    $stmt = getConecte()->prepare($sql);
    $stmt->bindValue(":value", $data[$field], PDO::PARAM_STR);

    $stmt->execute();

    return $stmt->fetchColumn() === false;
}


function escape($value) {
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function is_valid_name($name) {
    return preg_match('/^[a-zA-Z\s]+$/', $name);
}
