<?php

// In order to be able to fetch en.json file, its content and share with Inertia we need one helper function. 
function translations($json)
{
    // If file does not exist, return empty array
    if (!file_exists($json)) {
        return [];
    }
    // decore json file and return it
    return json_decode(file_get_contents($json), true);
}