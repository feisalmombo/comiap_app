<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'sudo' => [
            'users' => ['c', 'r', 'u', 'd'],
            'roles' => ['c', 'r', 'u', 'd'],
            'permiissions' => ['c', 'r', 'u', 'd'],
            'choices' => ['c', 'r', 'u', 'd']
        ],
        'patient' => [],
        'business' => [],
        'business-manager' => [],
        'business-site-supervisor' => [],
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];