<?php

   /**
   *   Транслит русского в латинские буквы, используя обновленные правила
   *
   *   Transliterate Russian into Latin
   *
   *   @автор Антон С.
   *   @почта tony.smirnov@gmail.com
   *   @написал   29.10.2022
   *   @обновил   01.11.2023
   */

   if ( !defined('K_COUCH_DIR') ) die(); // cannot be loaded directly

    $FUNCS->register_tag( 'transliterate_ru', function($params, $node){
        global $FUNCS;

        extract( $FUNCS->get_named_vars(
                array(
                      'str'=>'',
                    ),
                $params)
           );

        $str = trim( (string)$str );
        $charlist = array(
            "А"=>"A", "Б"=>"B", "В"=>"V", "Г"=>"G", "Д"=>"D", "Е"=>"E",  "Ё"=>"E",
            "Ж"=>"ZH","З"=>"Z", "И"=>"I", "Й"=>"I", "К"=>"K", "Л"=>"L",
            "М"=>"M", "Н"=>"N", "О"=>"O", "П"=>"P", "Р"=>"R", "С"=>"S",
            "Т"=>"T", "У"=>"U", "Ф"=>"F", "Х"=>"KH","Ц"=>"TS","Ч"=>"CH",
            "Ш"=>"SH","Щ"=>"SHCH","Ъ"=>"","Ы"=>"Y", "Ь"=>"",  "Ъ"=>"IE", "Э"=>"E", "Ю"=>"IU", "Я"=>"IA",

            "а"=>"a", "б"=>"b", "в"=>"v", "г"=>"g", "д"=>"d", "е"=>"e",  "ё"=>"e",
            "ж"=>"zh","з"=>"z", "и"=>"i", "й"=>"i", "к"=>"k", "л"=>"l",
            "м"=>"m", "н"=>"n", "о"=>"o", "п"=>"p", "р"=>"r", "с"=>"s",
            "т"=>"t", "у"=>"u", "ф"=>"f", "х"=>"kh","ц"=>"ts","ч"=>"ch",
            "ш"=>"sh","щ"=>"shch","ъ"=>"","ы"=>"y", "ь"=>"",  "ъ"=>"ie", "э"=>"e", "ю"=>"iu", "я"=>"ia"
        );
        return strtr( $str, $charlist );
    });
