<?php

/**
 * Navigation Configuration
 *
 * Navigation can be configured here. Each link/tab needs to have a text, icon
 * and href.
 */
return array(

    'nav' => array(

        'dashboard' => array(
            'text' => 'Dashboard',
            'icon' => '<span class="glyphicon glyphicon-dashboard"></span>',
            'href' => '../auth/dashboard.php'
        ),

        'apps' => array(
            'text' => 'Apps',
            'icon' => '<span class="glyphicon glyphicon-th-large"></span>',
            'href' => '#',
            'children' => array(

                'word' => array(
                    'text' => 'Word',
                    'icon' => '<span class="glyphicon glyphicon-search"></span>',
                    'href' => '../auth/link1.php'
                ),

                'excel' => array(
                    'text' => 'Excel',
                    'icon' => '<span class="glyphicon glyphicon-print"></span>',
                    'href' => '../auth/link2.php'
                )

            )
        ),

        'inventory' => array(
            'text' => 'Inventory',
            'icon' => '<span class="glyphicon glyphicon-inbox"></span>',
            'href' => '../auth/page2.php'
        ),

    )
);
