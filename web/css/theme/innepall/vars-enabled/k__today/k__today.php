<?php

    /**
    *   Various date-time shortcuts
    *
    *   @author @trendoman <tony.smirnov@gmail.com>
    *   @date   28.08.2022
    *   @last
    */

    $FUNCS->add_event_listener( 'add_render_vars', function() {
        global $CTX;
        $CTX->set('k__now', date('Y-m-d H:i:s', strtotime('now') ) );
        $CTX->set('k__today', date('Y-m-d', strtotime('today') ) );
        $CTX->set('k__tomorrow', date('Y-m-d', strtotime('tomorrow') ) );
        $CTX->set('k__yesterday', date('Y-m-d', strtotime('-1 day') ) );
        $CTX->set('k__page_date', date( 'Y-m-d', strtotime($CTX->get('k_page_date')) ) );
        $CTX->set('k__page_creation_date', date( 'Y-m-d', strtotime($CTX->get('k_page_creation_date')) ) );
        $CTX->set('k__page_modification_date', date( 'Y-m-d', strtotime($CTX->get('k_page_modification_date')) ) );
    });

    /*
    // ~~~~~~~~~~~~~
    // Credits
    // ~~~~~~~~~~~~~
    // You should have downloaded this code from https://github.com/trendoman/Tweakus-Dilectus
    // ~~~~~~~~~~~~~
    // Support
    // ~~~~~~~~~~~~~
    // Write me at <anton.cms@ya.ru>, <tony.smirnov@gmail.com> "Anton S aka Trendoman"
    // Telegram: https://t.me/couchcms
    */
