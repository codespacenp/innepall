<?php

    /**
    *   New variable to have visitor's ip detected
    *
    *   @author @trendoman <tony.smirnov@gmail.com>
    *   @date   04.10.2022
    */

    $FUNCS->add_event_listener( 'add_render_vars', function () {
        global $CTX;
        $getUserIP = function () {

          // Get real visitor IP behind CloudFlare network
          if (isset($_SERVER['HTTP_CF_CONNECTING_IP'])) {
             $_SERVER['REMOTE_ADDR_ORIG'] = $_SERVER['REMOTE_ADDR'];
             $_SERVER['REMOTE_ADDR'] = $_SERVER['HTTP_CF_CONNECTING_IP'];
             return $_SERVER['HTTP_CF_CONNECTING_IP'];
          }
          if (!empty($_SERVER['HTTP_X_REAL_IP']) && filter_var($_SERVER['HTTP_X_REAL_IP'], FILTER_VALIDATE_IP))
             return $_SERVER['HTTP_X_REAL_IP'];
          if (!empty($_SERVER['HTTP_CLIENT_IP']) && filter_var($_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
             return $_SERVER['HTTP_CLIENT_IP'];
          if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
             $iplist = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
             foreach ($iplist as $ip) {
                if (filter_var($ip, FILTER_VALIDATE_IP))
                   return $ip;
             }
          }
          if (!empty($_SERVER['HTTP_X_FORWARDED']) && filter_var($_SERVER['HTTP_X_FORWARDED'], FILTER_VALIDATE_IP))
            return $_SERVER['HTTP_X_FORWARDED'];
          if (!empty($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']) && filter_var($_SERVER['HTTP_X_CLUSTER_CLIENT_IP'], FILTER_VALIDATE_IP))
            return $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
          if (!empty($_SERVER['HTTP_FORWARDED_FOR']) && filter_var($_SERVER['HTTP_FORWARDED_FOR'], FILTER_VALIDATE_IP))
            return $_SERVER['HTTP_FORWARDED_FOR'];
          if (!empty($_SERVER['HTTP_FORWARDED']) && filter_var($_SERVER['HTTP_FORWARDED'], FILTER_VALIDATE_IP))
            return $_SERVER['HTTP_FORWARDED'];

          return $_SERVER['REMOTE_ADDR'];

          /* Credits: https://gist.github.com/RyadPasha/c025ddbc4a389d32917f05afde9001ea */
        };
        $CTX->set('k__ip', $getUserIP(), 'global');
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
