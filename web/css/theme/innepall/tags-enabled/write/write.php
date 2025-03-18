<?php

    /**
    *   Tag <cms:write /> writes the enclosed contents into file.
    *   Without specified files, there will be one named "my_log.txt"
    *
    *   @example <cms:write file='' truncate='' add_newline='' >...</cms:write>
    *   @link   https://www.couchcms.com/forum/viewtopic.php?f=8&t=11377
    *   @author Kamran Kashif aka KK <kksidd@couchcms.com>
    *   @date   22.01.2020
    */

    $FUNCS->register_tag( 'write', 'my_new_tag_write' );
    function my_new_tag_write( $params, $node ){
        global $FUNCS, $Config;

        extract( $FUNCS->get_named_vars(
                    array(
                          'file'=>'',           /* file name if provided needs to be relative to the site directory */
                          'truncate'=>'0',      /* will begin afresh */
                          'add_newline'=>'0',   /* appends newline character to the content */
                        ),
                    $params)
               );

        /* sanitize params */
        $file = str_replace( array('\\', K_SITE_URL, K_SITE_DIR), array('/', '', ''), trim($file) );
        $file = trim($file, '/');
        $file = str_ireplace('@snippets/', '', $file, $has_snippets_path);
        $file = str_ireplace('@uploads/', '', $file, $has_uploads_path);

        if( $has_snippets_path ){
            if( defined('K_SNIPPETS_DIR') ){ // always defined relative to the site
                $base_dir = K_SITE_DIR . K_SNIPPETS_DIR . '/';
            }
            else{
                $base_dir = K_COUCH_DIR . 'snippets/';
            }
        }
        elseif( $has_uploads_path ){
            $base_dir = $Config['UserFilesAbsolutePath'];
        }
        else{
            $base_dir = K_SITE_DIR;
        }

        if( !$file ){
            $file = 'my_log.txt';
        }
        $file = $base_dir . $file;

        $truncate = ( $truncate==1 ) ? 1 : 0;
        $add_newline = ( $add_newline==1 ) ? 1 : 0;

        $content='';
        foreach( $node->children as $child ){
            $content .= $child->get_HTML();
        }
        if( $add_newline ){
            $content .= "\r\n";
        }

        $dirname = dirname($file);
        if (!is_dir($dirname)){
            mkdir($dirname, 0755, true);
        }

        $fp = @fopen( $file,'a' );
        if( $fp ){
            @flock( $fp, LOCK_EX );
            if( $truncate ){
                ftruncate( $fp, 0 );
                rewind( $fp );
            }
            @fwrite( $fp, $content );
            @flock( $fp, LOCK_UN );
            @fclose( $fp );
        }

        return;
    }
