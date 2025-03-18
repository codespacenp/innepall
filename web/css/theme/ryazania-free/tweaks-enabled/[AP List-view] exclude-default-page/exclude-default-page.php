<?php
    /**
    *   Автоматически скроем дефолтные страницы
    *
    *   Hides default pages from list-view via modifying 'exclude' param
    *
    *   @автор Антон С.
    *   @почта tony.smirnov@gmail.com
    *   @написал 31 Октября 2022
    *   @обновил 30 Октября 2023
    */

    $FUNCS->add_event_listener( 'tag_config_list_view_executed', function($tag_name){
        global $PAGE;
        // tag <cms:config_list_view> sets a flag if this tag was present.
        $PAGE->tpl_has_config_list_view = 1;
        return;
    });


    $FUNCS->add_event_listener( 'tag_template_executed', function(){
        global $DB, $PAGE, $TAGS, $AUTH, $FUNCS, $CTX;

        if( $AUTH->user->access_level != K_ACCESS_LEVEL_SUPER_ADMIN ){ return; }

        $tpl_name_dashes = $FUNCS->get_clean_url( $PAGE->tpl_name );
        $default_pages_arr = array( 'default-page',
            'default-page-for-'.$tpl_name_dashes.'-please-change-this-title',
            'default-page-for-'.$tpl_name_dashes,
        );

        if( !$PAGE->tpl_has_config_list_view ){
            if( $PAGE->tpl_is_clonable ){
                $params = array( array('lhs'=>'exclude', 'op'=>'=', 'rhs'=> implode(",", $default_pages_arr)) );
                $TAGS->config_list_view( $params, $node = new KNode( K_NODE_TYPE_TEXT ) );
            }
        } else {
            $rs = $DB->select( K_TBL_TEMPLATES, array('config_list'), "id='" . $DB->sanitize( $PAGE->tpl_id ). "'" );
            if( !count($rs) ){ return; }
            $orig_value = $rs[0]['config_list'];

            // inject a few default pages if not there already
            $arr_config = unserialize( base64_decode($orig_value) );
            $arr = array_filter( array_map( "trim", explode(",", $arr_config['exclude']) ) );
            $arr = array_unique(array_merge($arr, $default_pages_arr));
            $arr_config['exclude'] = implode(",", $arr);

            // if array modified, serialize and save it
            $modified = array();
            $modified['config_list'] = base64_encode( serialize($arr_config) );
            if( $orig_value !== $modified['config_list'] ){
                $rs = $DB->update( K_TBL_TEMPLATES, $modified, "id='" . $DB->sanitize( $PAGE->tpl_id ). "'" );
                if( $rs==-1 ) die( "ERROR: Tag: '.$node->name.' Unable to save modified list" );
            }
        }
    });
