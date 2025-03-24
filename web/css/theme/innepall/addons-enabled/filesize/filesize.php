<?php
    /* @link https://www.couchcms.com/forum/viewtopic.php?f=2&t=10193#p24433 */
    if ( !defined('K_COUCH_DIR') ) die(); // cannot be loaded directly
	
    class FileSize{
        function get( $field ){
            global $Config;
            
            // loop through sibling fields to find the associated file/image field
            $size = 0;
            for( $x=0; $x<count($field->siblings); $x++ ){
                $f = &$field->siblings[$x];
                if( $f->name==$field->assoc_field && $f->modified ){ // found and contains new value
                    $folder = ( $f->k_type=='file' ) ? 'file' : 'image';
                    $domain_prefix = $Config['k_append_url'] . $Config['UserFilesPath'] . $folder . '/';
                    $path = $f->get_data();
                    if( strpos($path, $domain_prefix)===0 ){ // get size only if local file
                        $path = substr( $path, strlen($domain_prefix) );
                        if( $path ){
                            $local_path = $Config['UserFilesAbsolutePath'] . $folder . '/' . $path;
                            if( file_exists($local_path) ){
                                $size = @filesize( $local_path );
                            }
                        }
                    }
                    unset( $f );
                    break;
                }
                unset( $f );
            }
            
            // Set field's value to the size of the file contained in the associated field
            $field->store_posted_changes( $size );
            
            return true;
        }
        
        // 'cms:size_readable' tag handler
        // Outputs file size in human readable form
        function size_readable_handler( $params, $node ){
            global $FUNCS;
            if( count($node->children) ) {die("ERROR: Tag \"".$node->name."\" is a self closing tag");}
            
            extract( $FUNCS->get_named_vars(
                        array(
                              'bytes'=>''
                              ),
                        $params)
                   );
            $bytes = abs( intval($bytes) );
            
            if( $bytes <= 1024 ){
                $html = $bytes.' Bytes';
            }
            elseif( $bytes <= (1024*1024) ){
                $html = sprintf( '%d KB',(int)($bytes/1024) );
            }
            elseif( $bytes <= (1024*1024*1024) ){
                $html = sprintf( '%.2f MB',($bytes/(1024*1024)) );
            }
            else{
                $html = sprintf( '%.2f Gb',($bytes/(1024*1024*1024)) );
            }
            
            return $html;
        }
    }
    
    // Register custom tag for formatting filesize into human-readable form
    $FUNCS->register_tag( 'size_readable', array('FileSize', 'size_readable_handler') ); 