<?php

/**
 * desinfection et validation des données
 * @param array $data
 * @param array $fields
 * @param array $message
 * @return array
 * 
 */

 function filter(array $data, array $fields, array $messages = []): array
 {
    $sanitization = [];
    $validation = [];

    //extraction des régles de validation et de désinfection

    foreach ($fields as $field => $rules) {
        
        if (strpos($rules, '|')) {
            
            [$sanitization[$field], $validation[$field]] = explode('|', $rules, 2);

        }else {
            
            $sanitization[$field] = $rules;
        }
    }


    $inputs = sanitize($data, $sanitization);
    $errors = validate($inputs, $validation, $messages);


    return [$inputs, $errors];

 }



