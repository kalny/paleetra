<?php
return [
    'adminEmail' => 'admin@example.com',
    'mainMenuData' => [
        [
            'title' => Yii::t('app', 'MNU_DASHBOARD'), 'controller' => 'site', 'icon' => 'fa-dashboard',
            'children' => [
                ['title' => Yii::t('app', 'MNU_HOME'), 'controller' => 'site', 'action' => 'index', 'icon' => 'fa-home', 'rbac' => 'watchDashboard'],
                ['title' => Yii::t('app', 'MNU_SIGN_OUT'), 'controller' => 'site', 'action' => 'logout', 'icon' => 'fa-sign-out', 'rbac' => 'watchDashboard']
            ],
            'rbac' => 'watchDashboard'
        ],
        [
            'title' => Yii::t('app', 'MNU_USERS'), 'controller' => 'users', 'icon' => 'fa-users',
            'children' => [
                ['title' => Yii::t('app', 'MNU_LIST'), 'controller' => 'users', 'action' => 'index', 'icon' => 'fa-list', 'rbac' => 'manageUsers'],
                ['title' => Yii::t('app', 'MNU_CREATE'), 'controller' => 'users', 'action' => 'create', 'icon' => 'fa-file-o', 'rbac' => 'manageUsers']
            ],
            'rbac' => 'watchDashboard'
        ],
        [
            'title' => Yii::t('app', 'MNU_RBAC'), 'controller' => ['permissions', 'rules', 'roles', 'assignment'], 'icon' => 'fa-lock',
            'children' => [
                ['title' => Yii::t('app', 'MNU_PERMISSIONS'), 'controller' => 'permissions', 'action' => 'index', 'icon' => 'fa-hand-o-up', 'rbac' => 'managePermissions'],
                ['title' => Yii::t('app', 'MNU_RULES'), 'controller' => 'rules', 'action' => 'index', 'icon' => 'fa-info', 'rbac' => 'managePermissions'],
                ['title' => Yii::t('app', 'MNU_ROLES'), 'controller' => 'roles', 'action' => 'index', 'icon' => 'fa-mortar-board', 'rbac' => 'managePermissions'],
                ['title' => Yii::t('app', 'MNU_ASSIGNMENTS'), 'controller' => 'assignment', 'action' => 'index', 'icon' => 'fa-user', 'rbac' => 'managePermissions'],
            ],
            'rbac' => 'watchDashboard'
        ],
        [
            'title' => Yii::t('app', 'MNU_ARTICLES'), 'controller' => 'articles', 'icon' => 'fa-newspaper-o',
            'children' => [
                ['title' => Yii::t('app', 'MNU_LIST'), 'controller' => 'articles', 'action' => 'index', 'icon' => 'fa-list', 'rbac' => 'manageArticles'],
                ['title' => Yii::t('app', 'MNU_CREATE'), 'controller' => 'articles', 'action' => 'create', 'icon' => 'fa-file-o', 'rbac' => 'manageArticles']
            ],
            'rbac' => 'watchDashboard'
        ]
    ]
];
