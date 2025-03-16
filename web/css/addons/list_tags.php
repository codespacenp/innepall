<?php

/**
*   <cms:list_tags /> literally builds a list of all registered tags
*
*   @category New Tags
*   @example <cms:list_tags/>
*   @link
*   @author Anton aka Trendoman <tony.smirnov@gmail.com>
*   @date   04.02.2020
*   @last   26.02.2020
*/

$FUNCS->register_tag( 'list_tags', 'my_new_tag_list_tags' );
function my_new_tag_list_tags( $params, $node ){
    global $FUNCS, $TAGS;

    if( count($node->children) ) {die("ERROR: Tag \"".$node->name."\" is a self closing tag");}
    extract( $FUNCS->get_named_vars(
                array(
                      'sort'=>'1',
                    ),
                $params)
           );
    $sort = ($sort == 1) ? 1 : 0;

    $tags = $core_tags = $plug_tags = array();
    $core_tags = array_values( get_class_methods($TAGS) );
    $plug_tags = array_keys( $FUNCS->tags );
    $tags = array_merge( $core_tags, $plug_tags );

    $tags = array_filter($tags, function($k) {
        return ($k[0] !== '_') ? $k : 0;
    });

    array_walk($tags, function(&$t) {
        if( 0 === strpos($t, 'k_') ){
            $t = substr($t, 2);
        }
        return $t;
    });

    if( $sort ) sort( $tags );

    $list = '';
    foreach($tags as $tag){
        $list .= "<li>{$tag}</li>";
    }
    $html .= "<h2>CouchCMS tags:</h2>";
    $html .= "<p>(list of base tags, active addons tags and custom tags currently registered in the system.)</p>";
    $html .= "<div style='column-count: auto; column-width: 30ex; max-width:100%;'><ol>{$list}</ol></div>";


    return $html;
}
