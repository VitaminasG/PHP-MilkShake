<?php

return [
    'site' => [
        'name' => 'Your Site Name'
    ],
    'database' => [
        'name' => 'Brave',
        'username' => 'root',
        'password' => 'root',
        'connection' => 'mysql:host=127.0.0.1',
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
        ]
    ],
];