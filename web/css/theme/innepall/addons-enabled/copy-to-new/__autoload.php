<?php
    if ( !defined('K_COUCH_DIR') ) die(); // cannot be loaded directly

    // base addon
    require_once( __DIR__ . '/copy-to-new.php' );

    // addition by KK to copy reverse relation fields
    require_once( __DIR__ . '/copy-reverse-relation.php' );

    // alert to save on a new clone
    require_once( __DIR__ . '/copy-to-new-alert.php' );

    // variable with a link to clone from the frontend
    require_once( __DIR__ . '/k__clonepage_link.php' );
