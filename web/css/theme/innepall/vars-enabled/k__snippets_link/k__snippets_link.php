<?php

    /**
    *   Переменная содержит URL ссылку к папке сниппетов
    *
    *   Var offers URL link to snippets folder
    *
    *   @автор Антон С.
    *   @почта tony.smirnov@gmail.com
    *   @начало  1 Ноября 2023
    *   @обнова  1 Ноября 2023
    */
    $FUNCS->add_event_listener( 'add_render_vars', function () {
        global $CTX;
        if( defined('K_SNIPPETS_DIR') ){ // always defined relative to the site
            $base_dir = K_SITE_DIR . K_SNIPPETS_DIR . '/';
        }
        else{
            $base_dir = K_COUCH_DIR . 'snippets/';
        }
        $base_url = str_replace(K_SITE_DIR, K_SITE_URL, $base_dir);
        $CTX->set('k__snippets_link', $base_url);
    });
