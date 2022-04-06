<?php

/*
    After any changes here, please run `php artisan permissions:assign` and remember
    that if you delete role, users who had it will lose their access
*/
return [
    'roles' => [
        'admin',
        'lead',
        'user'
    ],

    'permissions' => [
        'user.create',
        'user.index',
        'user.delete',
        'user.update',

        'project.create',
        'project.index',
        'project.edit',
        'project.update',
        'project.delete',

        'task.index',
        'task.add',
        'task.update',
        'task.show',
    ],

    'assigns' => [
        'admin' => [
        'user.create',
        'user.index',
        'user.delete',
        'user.update',

        'project.create',
        'project.index',
        'project.edit',
        'project.update',
        'project.delete',

        'task.index',
        'task.add',
        'task.update',
        'task.show',
        ],

        'lead' => [
        'user.update',

        'project.create',
        'project.index',
        'project.edit',
        'project.update',
        'project.delete',

        'task.index',
        'task.add',
        'task.update',
        'task.show',
        ],

        'user' => [
        'user.update',

        'task.index',
        'task.add',
        'task.update',
        'task.show',
        ],       
    ]
];
