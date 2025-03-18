<?php

   /**
   *   Transliterate Bulgarian into Latin
   *
   *   @example <cms:transliterate_bg str='Не чакайте - всички са онлайн!' />
   *   @author @trendoman <tony.smirnov@gmail.com>
   *   @date   29.10.2022
   */

   if ( !defined('K_COUCH_DIR') ) die(); // cannot be loaded directly

   $FUNCS->register_tag( 'transliterate_bg', function($params, $node)
   {
      global $FUNCS;
      extract( $FUNCS->get_named_vars(
                array(
                      'str'=>'',
                    ),
                $params)
           );

      $str = trim( (string) $str );
      $charlist = array(
          "А"=>"A", "Б"=>"B", "В"=>"V", "Г"=>"G", "Д"=>"D", "Е"=>"E",
          "Ж"=>"ZH","З"=>"Z", "И"=>"I", "Й"=>"Y", "К"=>"K", "Л"=>"L",
          "М"=>"M", "Н"=>"N", "О"=>"O", "П"=>"P", "Р"=>"R", "С"=>"S",
          "Т"=>"T", "У"=>"U", "Ф"=>"F", "Х"=>"H", "Ц"=>"TS","Ч"=>"CH",
          "Ш"=>"SH","Щ"=>"SHT","Ъ"=>"A", "Ы"=>"", "Ь"=>"Y",  "Э"=>"", "Ю"=>"YU", "Я"=>"YA",

          "а"=>"a", "б"=>"b", "в"=>"v", "г"=>"g", "д"=>"d", "е"=>"e",
          "ж"=>"zh","з"=>"z", "и"=>"i", "й"=>"y", "к"=>"k", "л"=>"l",
          "м"=>"m", "н"=>"n", "о"=>"o", "п"=>"p", "р"=>"r", "с"=>"s",
          "т"=>"t", "у"=>"u", "ф"=>"f", "х"=>"h", "ц"=>"ts","ч"=>"ch",
          "ш"=>"sh","щ"=>"sht","ъ"=>"a", "ы"=>"", "ь"=>"y",  "э"=>"", "ю"=>"yu", "я"=>"ya"
      );
      return strtr( $str, $charlist );
   });

   /*
   // ~~~~~~~~~~~~~
   // Credits
   // ~~~~~~~~~~~~~
   // You should have downloaded this code from https://github.com/trendoman/Tweakus-Dilectus
   // Code is based on this → SO answer: https://stackoverflow.com/a/2934602/7524904
   // ~~~~~~~~~~~~~
   // Support
   // ~~~~~~~~~~~~~
   // Write me at <anton.cms@ya.ru>, <tony.smirnov@gmail.com> "Anton S aka Trendoman"
   // Telegram: https://t.me/couchcms
   */

