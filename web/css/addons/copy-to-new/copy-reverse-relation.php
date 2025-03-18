<?php
    if ( !defined('K_COUCH_DIR') ) die(); // cannot be loaded directly


    // handle type 'reverse_relation' upon copying page to a new page ..
    $FUNCS->add_event_listener( 'copy_to_new_complete', 'my_handle_reverse_related' );
    function my_handle_reverse_related( &$pg, $orig_page_id ){
        global $FUNCS, $DB;

        for( $x=0; $x<count($pg->fields); $x++ ){
            $f = &$pg->fields[$x];
            if( (!$f->system) && $f->k_type=='reverse_relation'){
                $fid = $f->id;
                break;
            }
            unset( $f );
        }

        if( $f ){
            // get template_id of reverse related masterpage
            $rs = $DB->select( K_TBL_TEMPLATES, array('id', 'name'), "name='" . $DB->sanitize( $f->masterpage ). "'" );
            if( count($rs) ){
                $template_id = $rs[0]['id'];
                $template_name = $rs[0]['name'];
            }
            else{
                return;
            }

            // get relation_field_id using template_id
            if( $f->field ){
                $rs = $DB->select( K_TBL_FIELDS, array('*'), "template_id='" . $DB->sanitize( $template_id ). "' AND k_type='relation' AND name='" . $DB->sanitize( $f->field ) . "'" );
            }
            else{ // if field not specified, get the first 'relation' field defined
                $rs = $DB->select( K_TBL_FIELDS, array('*'), "template_id='" . $DB->sanitize( $template_id ). "' AND k_type='relation' LIMIT 1" );
            }
            if( count($rs) ){
                $field_id = $rs[0]['id'];
            }
            else{
                return;
            }

            // find all related pages
            $cid = $orig_page_id; // original page
            if( $cid != -1 ){ // not a new page
                $rel_tables = K_TBL_PAGES . ' p inner join ' . K_TBL_RELATIONS . ' rel on rel.pid = p.id' . "\r\n";
                $rel_sql = "p.parent_id=0 AND rel.cid='" . $DB->sanitize( $cid ). "' AND rel.fid='" . $DB->sanitize( $field_id ). "'";
                $rs = $DB->select( $rel_tables, array('p.id'), $rel_sql );

                // relate those pages to the newly created page
                if( count($rs) ){
                    foreach( $rs as $row ){
                        $weight = 0; //TODO
                        $rs2 = $DB->insert( K_TBL_RELATIONS, array(
                            'pid'=>$row['id'],
                            'fid'=>$field_id,
                            'cid'=>$pg->id,
                            'weight'=>$weight
                            )
                        );
                        if( $rs2!=1 ) die( "ERROR: Failed to insert record in K_TBL_RELATIONS" );
                    }
                }
            }
        }
    }
