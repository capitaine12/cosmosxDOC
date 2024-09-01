<?php

const FILTER = [
    'string' => FILTER_SANITIZE_SPECIAL_CHARS,
    'string[]' => [
        'filter' => FILTER_SANITIZE_SPECIAL_CHARS,
        'flags' => FILTER_REQUIRE_ARRAY
    ],
    'email' => FILTER_VALIDATE_EMAIL,
    'int' => [
        'filter' => FILTER_SANITIZE_NUMBER_INT,
        'flags' => FILTER_REQUIRE_SCALAR
    ],
    'int[]' => [
        'filter' => FILTER_SANITIZE_NUMBER_INT,
        'flags' => FILTER_REQUIRE_ARRAY
    ],
    'float' => [
        'filter' => FILTER_SANITIZE_NUMBER_FLOAT,
        'flags' => FILTER_FLAG_ALLOW_FRACTION
    ],
    'float[]' => [
        'filter' => FILTER_SANITIZE_NUMBER_FLOAT,
        'flags' => FILTER_REQUIRE_ARRAY
    ],
    'url' => FILTER_VALIDATE_URL,
];

/**
 * Trim strings recursively in an array.
 * @param array $items
 * @return array
 */
function array_trim(array $items): array
{
    return array_map(function ($item) {
        if (is_string($item)) {
            return trim($item);
        } elseif (is_array($item)) {
            return array_trim($item);
        } else {
            return $item;
        }
    }, $items);
}

/**
 * Sanitize inputs according to rules and optionally trim strings.
 * @param array $inputs
 * @param array $fields
 * @param int $default_filter FILTER_SANITIZE_SPECIAL_CHARS
 * @param array $filters FILTER
 * @param bool $trim
 * @return array
 */
function sanitize(array $inputs, array $fields = [], int $default_filter = FILTER_SANITIZE_SPECIAL_CHARS, array $filters = FILTER, bool $trim = true): array
{
    // Filter and sanitize input data
    if ($fields) {
        $options = array_map(function($field) use ($filters) {
            return $filters[$field] ?? FILTER_SANITIZE_SPECIAL_CHARS;
        }, $fields);

        $data = filter_var_array($inputs, $options);
    } else {
        $data = filter_var_array($inputs, $default_filter);
    }

    // Optionally trim the data
    return $trim ? array_trim($data) : $data;
}
