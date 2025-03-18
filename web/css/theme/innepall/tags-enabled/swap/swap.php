<?php

    /**
    *   Мощный тег для замены в тексте
    *
    *   Powerful tag to replace strings in a text
    *
    *   @автор Антон С.
    *   @почта tony.smirnov@gmail.com
    *   @начало  7 Декабря 2022
    *   @обнова 30 Октября 2023
    */

    $FUNCS->register_tag( 'swap', function($params, $node)
    {
        global $FUNCS, $CTX;

        extract( $FUNCS->get_named_vars(
                  array( 'val'=>'',
                         'with'=>'',
                         'is_regex'=>'0',
                         'trim'=>'0',
                         'text'=>'',
                         'into'=>'',
                         'scope'=>'',
                        ),
                  $params)
             );

        $into = trim( $into );
        $scope = strtolower( trim($scope) );
        if( $scope=='' ){ $scope='global'; }
        elseif( $scope=='local' ){ $scope='parent'; } //local scope makes no sense
        if( $scope!='parent' && $scope!='global' ){
            die("ERROR: Tag \"".$node->name."\" has unknown scope " . $scope);
        }

        if( is_string($val) ){ $val = array(trim($val)); }
        $is_regex = ($is_regex == 1) ? 1 : 0;
        $trim = ($trim == 1) ? 1 : 0;
        $html = '';
        foreach( $node->children as $child ) { $html.= $child->get_HTML(); }
        if( $trim ){
            $text = trim($text);
            $html = trim($html);
        }
        if( $text == '' ){ $text = $html; }
        if( $is_regex ){
            foreach($val as $i=>$pattern)
            {
                $replacement = ( is_array($with) && isset($with[$i]) ) ? $with[$i] : $with;
                if( false === preg_match($pattern, '') ){
                    die(
                          "ERROR: Tag \"$node->name\" detected invalid regex: ".
                          "Value: <strong>`<font color='red'>$pattern</font>`</strong> ".
                          "was to be replaced with <strong>`<font color='green'>$replacement</font>`</strong>."
                      );
                }
                $text = preg_replace( $pattern, $replacement, $text );
            }
        } else {
            $text = str_replace($val, $with, $text);
        }

        if( $into!='' ){
            $CTX->set( $into, $text, $scope );
        }
        else{
            return $text;
        }
    });
