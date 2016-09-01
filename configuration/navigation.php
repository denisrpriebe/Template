<?php

/**
 * Navigation Configuration
 *
 * Navigation can be configured here. Each link/tab needs to have a text, icon
 * and route-name.
 */
return [

    'nav' => [

        'dashboard' => [
            'text' => 'Dashboard',
            'icon' => '<span class="glyphicon glyphicon-dashboard"></span>',
            'route-name' => 'dashboard-page'
        ],

        'apps' => [
            'text' => 'Apps',
            'icon' => '<span class="glyphicon glyphicon-th-large"></span>',
            'route-name' => '#',
            'children' => [

                'word' => [
                    'text' => 'Word',
                    'icon' => '<span class="glyphicon glyphicon-search"></span>',
                    'route-name' => 'dashboard-page'
                ],

                'excel' => [
                    'text' => 'Excel',
                    'icon' => '<span class="glyphicon glyphicon-print"></span>',
                    'route-name' => 'dashboard-page'
                ]

            ]
        ],

        'inventory' => [
            'text' => 'Inventory',
            'icon' => '<span class="glyphicon glyphicon-inbox"></span>',
            'route-name' => 'inventory-page'
        ],
        
        'users' => [
            'text' => 'Users',
            'icon' => '<span class="glyphicon glyphicon-user"></span>',
            'route-name' => 'users-page',
            'allowed' => ['Administrator']
        ],

    ]
];
