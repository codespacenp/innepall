<?php

    /**
    *   Echo regardless
    *
    *   @example <cms:show_early>
    *   @author @trendoman <tony.smirnov@gmail.com>
    *   @date   11.11.2022
    */

    $FUNCS->register_tag( 'show_early', function($params, $node) {
      foreach( $node->children as $child ){ echo $child->get_HTML(); flush(); }
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
