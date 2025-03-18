<?php

   if ( !defined('K_COUCH_DIR') ) die(); // cannot be loaded directly

   // 101.
   // Enjoy page load stats echoed in bottom of the source code: time and queries count
   // Could be added to config.php but now is served as a separate tweak in theme
   if( !defined('K_IS_MY_TEST_MACHINE') ){ define( 'K_IS_MY_TEST_MACHINE', 1 ); }
