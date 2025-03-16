<?php

    /**
    *   Sum unlimited number of values (instead of just 2) in one go - <cms:add '312' '226' '389' '432' />.
    *
    *   @category Modded Tags
    *   @example <cms:add '1' '2' '3' '4' />
    *   @link   http://www.couchcms.com/forum/viewtopic.php?f=8&t=10608
    *   @author @trendoman <tony.smirnov@gmail.com>
    *   @date   12.06.2019
    *   @last   05.08.2022
    */

    $FUNCS->add_event_listener( 'alter_tag_add_execute', 'my_tag_mod_add');
    function my_tag_mod_add( $tag_name, $params, $node, &$res ){
        if( count($params)<2 ) die( "ERROR: Tag \"".$node->name."\": requires two or more parameters" );

        for( $i = 0, $size = count($params); $i < $size; $i++ ){
            $res += $params[$i]['rhs'];
        }

        return $skip = true;
    }
