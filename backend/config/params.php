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
        ],
        [
            'title' => Yii::t('app', 'MNU_PALEETRA'), 'controller' => ['motivations', 'trusts', 'steps', 'prices', 'contacts', 'reviews'], 'icon' => 'fa-cogs',
            'children' => [
                ['title' => Yii::t('app', 'MNU_MOTIVATIONS'), 'controller' => 'motivations', 'action' => 'index', 'icon' => 'fa-thumbs-o-up', 'rbac' => 'manageArticles'],
                ['title' => Yii::t('app', 'MNU_TRUSTS'), 'controller' => 'trusts', 'action' => 'index', 'icon' => 'fa-bullhorn', 'rbac' => 'manageArticles'],
                ['title' => Yii::t('app', 'MNU_PROCESS'), 'controller' => 'steps', 'action' => 'update', 'icon' => 'fa-line-chart', 'rbac' => 'manageArticles'],
                ['title' => Yii::t('app', 'MNU_PRICES'), 'controller' => 'prices', 'action' => 'index', 'icon' => 'fa-dollar', 'rbac' => 'manageArticles'],
                ['title' => Yii::t('app', 'MNU_CONTACTS'), 'controller' => 'contacts', 'action' => 'index', 'icon' => 'fa-headphones', 'rbac' => 'manageArticles'],
                ['title' => Yii::t('app', 'MNU_REVIEWS'), 'controller' => 'reviews', 'action' => 'index', 'icon' => 'fa-quote-right', 'rbac' => 'manageArticles'],
            ],
            'rbac' => 'watchDashboard'
        ],
        [
            'title' => Yii::t('app', 'MNU_EVENTS'), 'controller' => ['orders', 'calls', 'brifs'], 'icon' => 'fa-bell-o',
            'children' => [
                ['title' => Yii::t('app', 'MNU_ORDERS'), 'controller' => 'orders', 'action' => 'index', 'icon' => 'fa-money', 'rbac' => 'manageArticles', 'badge' => 'bg-red', 'model' => \backend\models\Order::className()],
                ['title' => Yii::t('app', 'MNU_CALLS'), 'controller' => 'calls', 'action' => 'index', 'icon' => 'fa-phone', 'rbac' => 'manageArticles', 'badge' => 'bg-red', 'model' => \backend\models\Call::className()],
                ['title' => Yii::t('app', 'MNU_BRIFS'), 'controller' => 'brifs', 'action' => 'index', 'icon' => 'fa-book', 'rbac' => 'manageArticles', 'badge' => 'bg-red', 'model' => \backend\models\Brif::className()],
            ],
            'rbac' => 'watchDashboard'
        ],
        [
            'title' => Yii::t('app', 'MNU_PORTFOLIO'), 'controller' => ['categories', 'works'], 'icon' => 'fa-briefcase',
            'children' => [
                ['title' => Yii::t('app', 'MNU_CATEGORIES'), 'controller' => 'categories', 'action' => 'index', 'icon' => 'fa-clone', 'rbac' => 'manageArticles'],
                ['title' => Yii::t('app', 'MNU_WORKS'), 'controller' => 'works', 'action' => 'index', 'icon' => 'fa-file-photo-o', 'rbac' => 'manageArticles'],
            ],
            'rbac' => 'watchDashboard'
        ],
        [
            'title' => Yii::t('app', 'MNU_MAILING'), 'controller' => ['mailing'], 'icon' => 'fa-envelope-o',
            'children' => [
                ['title' => Yii::t('app', 'MNU_ADDRESSES'), 'controller' => 'mailing', 'action' => 'index', 'icon' => 'fa-users', 'rbac' => 'manageArticles'],
            ],
            'rbac' => 'watchDashboard'
        ]
    ]
];
