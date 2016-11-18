<?php
return [
    'adminEmail' => 'admin@example.com',
    'mainMenuData' => [
        [
            'title' => 'Dashboard', 'controller' => 'site', 'icon' => 'fa-dashboard',
            'children' => [
                ['title' => 'Home', 'controller' => 'site', 'action' => 'index', 'icon' => 'fa-home', 'rbac' => 'watchDashboard', 'badge' => 'bg-green', 'model' => 'common\models\User'],
                ['title' => 'Sign Out', 'controller' => 'site', 'action' => 'logout', 'icon' => 'fa-sign-out', 'rbac' => 'watchDashboard']
            ],
            'rbac' => 'watchDashboard'
        ],

        [
            'title' => 'Users', 'controller' => 'users', 'icon' => 'fa-users',
            'children' => [
                ['title' => 'List', 'controller' => 'users', 'action' => 'index', 'icon' => 'fa-list', 'rbac' => 'createUser'],
                ['title' => 'Create', 'controller' => 'users', 'action' => 'create', 'icon' => 'fa-file-o', 'rbac' => 'createUser']
            ],
            'rbac' => 'watchDashboard'
        ],
        [
            'title' => 'RBAC', 'controller' => ['permissions', 'rules', 'roles', 'assignment'], 'icon' => 'fa-lock',
            'children' => [
                ['title' => 'Permissions', 'controller' => 'permissions', 'action' => 'index', 'icon' => 'fa-hand-o-up', 'rbac' => 'managePermissions'],
                ['title' => 'Rules', 'controller' => 'rules', 'action' => 'index', 'icon' => 'fa-info', 'rbac' => 'managePermissions'],
                ['title' => 'Roles', 'controller' => 'roles', 'action' => 'index', 'icon' => 'fa-mortar-board', 'rbac' => 'managePermissions'],
                ['title' => 'Assignments', 'controller' => 'assignment', 'action' => 'index', 'icon' => 'fa-user', 'rbac' => 'managePermissions'],
            ],
            'rbac' => 'watchDashboard'
        ],
        
    ]
];
