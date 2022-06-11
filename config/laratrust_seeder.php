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
        'Admin' => [
            'users' => 'c,r,u,d',
            'payments' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
        'Ketua' => [
            'users' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
        // 'waka' => [
        //     'profile' => 'r,u',
        // ],
        'Staf-Distribusi' => [
            'users' => 'c,r,u,d',
            'profile' => 'r,u',
        ],
        'Staf-Resepsionis' => [
            'users' => 'c,r,u,d',
            'profile' => 'r,u',
        ],
        // 'staf-upz' => [
        //     'profile' => 'r,u',
        // ],
        'Calon-Mustahik' => [
            'users' => 'c,r,u,d',
            'profile' => 'r,u',
        ],
        
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
        // ],
        // 'role_name' => [
        //     'module_1_name' => 'c,r,u,d',
        // ]