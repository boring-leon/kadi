<?php

return [
    'admin_emails' => [
        'margerita.c@wp.pl', 'poriusz@wp.pl'
    ],
    'ingredient_types' => [
        'owoce', 'warzywa', 'nabiał', 'produkty zbożowe', 'mięso', 'tłuszcze', 'słodycze i desery', 'inne',
        'ryby', 'pieczywo', 'zupy', 'moje składniki'
    ],
    'activities' => [
        [ 'name' => 'pływanie', 'kcal' => 6.5],
        [ 'name' => 'marsz', 'kcal' => 3.5 ],
        [ 'name' => 'rower', 'kcal' => 5 ]

    ],
    'is_under_construction' => false,
    'mailing' => [
        'is_active' => false,
        'config' => \App\Services\Mail\Config\SendToAll::class
    ],
];