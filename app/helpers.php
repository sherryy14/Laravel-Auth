<?php

if (!function_exists('custom_slug')) {
    function custom_slug($string)
    {
        // Replace spaces and pipe symbols with hyphens
        $string = str_replace([' ', '|'], '-', $string);

        // Convert to lowercase
        $string = strtolower($string);

        // Replace multiple hyphens with a single hyphen
        $string = preg_replace('/-+/', '-', $string);

        // Trim hyphens from the start and end of the string
        $string = trim($string, '-');

        // URL encode the string
        return urlencode($string);
    }
}
