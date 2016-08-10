<?php

/**
 * Navigation Configuration
 *
 * Navigation can be configured here. Each link/tab needs to have a text, icon
 * and href.
 */
return array(

    'nav' => array(

        'home' => array(
            'text' => 'Home',
            'icon' => '<span class="glyphicon glyphicon-home"></span>',
            'href' => '../auth/home.php'
        ),

        'page1' => array(
            'text' => 'Page1',
            'icon' => '<span class="glyphicon glyphicon-envelope"></span>',
            'href' => '#',
            'children' => array(

                'link1' => array(
                    'text' => 'Link1',
                    'icon' => '<span class="glyphicon glyphicon-search"></span>',
                    'href' => '../auth/link1.php'
                ),

                'link2' => array(
                    'text' => 'Link2',
                    'icon' => '<span class="glyphicon glyphicon-print"></span>',
                    'href' => '../auth/link2.php'
                )

            )
        ),

        'page2' => array(
            'text' => 'Page2',
            'icon' => '<span class="glyphicon glyphicon-asterisk"></span>',
            'href' => '../auth/page2.php'
        ),

    )
);
