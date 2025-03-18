<?php

    if ( !defined('K_COUCH_DIR') ) die(); // cannot be loaded directly
    global $CTX;

    if ($CTX->get('_DEBUG_')=='1' ) {    
        $cfg['minify']=false;
    } else {
        $cfg['minify']=true;
    }
    $cfg['vendor_target']='all';
    $cfg['plugins']=array(
                    'aria',
                    'color',
                    'ease',
                    'forms',
                    'hocus-pocus',
                    'ie-inline-block',
                    'ie-opacity',
                    'loop',
                    'noise',
                    'px2em',
                    'rem',
                    'svg',
                    'text-align',
                    );
