<?php

    /**
    *   Add new sidebar sections.
    *
    *   @author Kamran Kashif aka KK <kksidd@couchcms.com>
    *   @date   11.06.2019
    */

    if( !defined('K_ADMIN') ) return;

    $FUNCS->add_event_listener( 'register_admin_menuitems', function (){
        global $FUNCS;

        // Example of a new sidebar section 'MyFolder' which can be used as a parent for templates - <cms:template ... parent='_myfolder_' ... />
        $FUNCS->register_admin_menuitem( array('name'=>'_general_', 'title'=>'General', 'is_header'=>'1', 'weight'=>'-100')  );
        $FUNCS->register_admin_menuitem( array('name'=>'_info_', 'title'=>'Information', 'is_header'=>'1', 'weight'=>'-90')  );
        //$FUNCS->register_admin_menuitem( array('name'=>'_index_', 'title'=>'Homepage', 'is_header'=>'1', 'weight'=>'-1000')  );
        $FUNCS->register_admin_menuitem( array('name'=>'_hosting_', 'title'=>'Hosting', 'is_header'=>'1', 'weight'=>'-70')  );
        $FUNCS->register_admin_menuitem( array('name'=>'_page_', 'title'=>'Page', 'is_header'=>'1', 'weight'=>'-60')  );
        //$FUNCS->register_admin_menuitem( array('name'=>'_career_', 'title'=>'Career', 'is_header'=>'1', 'weight'=>'-50')  );
        $FUNCS->register_admin_menuitem( array('name'=>'_settings_', 'title'=>'Settings', 'is_header'=>'1', 'weight'=>'-40')  );
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