<?php

return [
    'role_structure' => [
        'superadministrator' => [
            'users' => 'c,r,u,d',
            'acl' => 'c,r,u,d',
            'profile' => 'r,u',
            'orders' => 'c,r,u,d',
            'groups' => 'c,r,u,d',
            'stores' => 'c,r,u,d',
        ],
        'administrator' => [
            'acl' => 'c,r,u,d',
            'profile' => 'r,u',
            'orders' => 'c,r,u,d',
            'groups' => 'c,r,u,d',
            'stores' => 'c,r,u,d',
        ],
        'supporter' => [
            'profile' => 'r,u',
            'groups' => 'r',
            'stores' => 'r,u',
            'orders' => 'c,r,u,d',
        ]
    ],
    'permission_structure' => [],
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
