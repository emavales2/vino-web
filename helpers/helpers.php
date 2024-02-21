<?php

// In order to be able to fetch en.json file, its content and share with Inertia we need one helper function. I added it under “helpers” folder in root directory of my project.
function translations($json)
{
    if (!file_exists($json)) {
        return [];
    }

    return json_decode(file_get_contents($json), true);
}