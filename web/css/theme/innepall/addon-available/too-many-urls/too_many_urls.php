<?php
    
    if ( !defined('K_ENGINE_DIR') ) die(); // cannot be loaded directly
    
    class TooManyUrls{
        
        static function too_many_urls( $params, $node ){
            global $FUNCS, $CTX;
            if( count($node->children) ) {die("ERROR: Tag \"".$node->name."\" is a self closing tag");}
            
            extract( $FUNCS->get_named_vars(
                array(
                       'in'=>'', /* field to test */
                       'max' =>'1', /* URLs allowed. Default is 1 */
                       'allowed' =>null, /* Backwards compatibility */
                      ),
                $params)
            );
           
            // sanitize params    
            $max = trim( $max );
            $max = ($allowed != null) ? trim( $allowed ) : $max; //Backwards compatibility
            $in = trim( $in );
            
            $target = $CTX->get( $in );             
            $url_patterns = '/((\bhttps{0,1}:\/\/|<\s*a\s+href=["'."'".']{0,1})[-a-z0-9.]+\b)|(^|[^-a-z_.0-9]+)(?<!@)([-a-z0-9]+\.)+(com|net|org|edu|gov|mil|aero|asia|biz|cat|coop|info|int|jobs|mobi|museum|name|post|pro|tel|travel|xxx|ac|ad|ae|af|ag|ai|al|am|an|ao|aq|ar|as|at|au|aw|ax|az|ba|bb|bd|be|bf|bg|bh|bi|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|cr|cs|cu|cv|cx|cy|cz|dd|de|dj|dk|dm|do|dz|ec|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gg|gh|gi|gl|gm|gn|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|im|in|io|iq|ir|is|it|ja|je|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|me|mg|mh|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|mv|mw|mx|my|mz|na|nc|ne|nf|ng|ni|nl|no|np|nr|nu|nz|om|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|ps|pt|pw|py|qa|re|ro|rs|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|ss|st|su|sv|sx|sy|sz|tc|td|tf|tg|th|tj|tk|tl|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)\b/msi';

            $url_count = preg_match_all($url_patterns, $target, $each_url);
            if( $url_count > $max ){return true;} else{return false;}
        }
    }
    
    $FUNCS->register_tag( 'too_many_urls', array('TooManyUrls', 'too_many_urls') );