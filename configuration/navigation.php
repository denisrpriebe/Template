<?php

/**
 * Navigation Configuration
 *
 * Navigation can be configured here. Each link/tab needs to have a text, icon
 * and route-name.
 */
return array(

    'nav' => array(

        'dashboard' => array(
            'text' => 'Dashboard',
            'icon' => '<span class="glyphicon glyphicon-dashboard"></span>',
            'route-name' => 'auth-dashboard'
        ),

        'apps' => array(
            'text' => 'Apps',
            'icon' => '<span class="glyphicon glyphicon-th-large"></span>',
            'route-name' => 'logout',
            'children' => array(

                'word' => array(
                    'text' => 'Word',
                    'icon' => '<span class="glyphicon glyphicon-search"></span>',
                    'route-name' => '../auth/link1.php'
                ),

                'excel' => array(
                    'text' => 'Excel',
                    'icon' => '<span class="glyphicon glyphicon-print"></span>',
                    'route-name' => '../auth/link2.php'
                )

            )
        ),

        'inventory' => array(
            'text' => 'Inventory',
            'icon' => '<span class="glyphicon glyphicon-inbox"></span>',
            'route-name' => '../auth/page2.php'
        ),

    )
);
