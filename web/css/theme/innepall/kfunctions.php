<?php
    if ( !defined('K_COUCH_DIR') ) die(); // cannot be loaded directly

    // Регистрируем скрипты PHP
    // Register enabled *.php scripts
    require( K_THEME_DIR . 'autoload.php' );

    // Default CouchCMS theme overriding example for masterpages by KK:
    function k_override_renderables(){
        global $FUNCS;

        // add more candidate template names for renderables implemented as templates
        $FUNCS->add_event_listener( K_THEME_NAME.'_alter_render_vars_content_list_inner', 'MyTheme::_alter_render_vars' );
        $FUNCS->add_event_listener( K_THEME_NAME.'_alter_render_vars_content_form', 'MyTheme::_alter_render_vars' );
        $FUNCS->add_event_listener( K_THEME_NAME.'_alter_render_vars_field_textarea', 'MyTheme::_alter_render_vars_textarea' );
        $FUNCS->add_event_listener( K_THEME_NAME.'_alter_render_vars_field_text', 'MyTheme::_alter_render_vars_textarea' );
    }


    // class containing the theme functions
    class MyTheme{

        static function _alter_render_vars( &$candidate_templates, $name, &$args ){
            global $FUNCS, $CTX;

            // for every candidate template for the renderable, add a template that has the current masterpage suffixed
            $cur_route = $FUNCS->current_route;
            $cur_masterpage = $FUNCS->get_clean_url( $cur_route->masterpage ); // e.g., this will turn 'en/blog.php' into 'en-blog-php'.

            $tmp_array = array();
            foreach( $candidate_templates as $tpl ){
                $tmp_array[] = $tpl;

                if( $cur_route->module=='folders' ){
                    $tmp_array[] = $tpl . '__folder';
                    $tmp_array[] = $tpl . '__folder_' . $cur_masterpage;
                }
                else{
                    $tmp_array[] = $tpl . '__' . $cur_masterpage;
                    $tmp_array[] = '../../../mysnippets/' . $cur_masterpage . '/_theme/' . $tpl . '__' . $cur_masterpage;
                }
            }

            $candidate_templates = $tmp_array;
        }

        static function _alter_render_vars_textarea( &$candidate_templates, $name, $args ){
            global $FUNCS, $CTX;

            // set new variables in context for use by the templates
            // see https://www.couchcms.com/forum/viewtopic.php?f=4&t=11212#p31046
            // requires echoing <cms:show my_field_custom_styles /> in field theme snippets
            // e.g. field_text.html, field_textarea.html (both are downloadable at link above)
            $vars = array();
            $vars['my_field_custom_styles'] = $args[0]->custom_styles;
            $CTX->set_all( $vars );
        }

    }// end class

