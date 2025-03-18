<?php

    /**
    *   Переменная содержит путь к папке сниппетов
    *
    *   Var offers path to snippets folder
    *
    *   @автор Антон С.
    *   @почта tony.smirnov@gmail.com
    *   @начало 30 Октября 2023
    *   @обнова 30 Октября 2023
    */
    $FUNCS->add_event_listener( 'add_render_vars', function () {
        global $CTX;
        if( defined('K_SNIPPETS_DIR') ){ // always defined relative to the site
            $base_dir = K_SITE_DIR . K_SNIPPETS_DIR . '/';
        }
        else{
            $base_dir = K_COUCH_DIR . 'snippets/';
        }
        $CTX->set('k__snippets_path', $base_dir);
    });
