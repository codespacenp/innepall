<?php

    /**
    *   Пренаписване заглавия на категории и страници от кирилица към латиница по БДС
    *   /Bulgarian Cyrillic letters transliteration/
    *   Usually is a requirement and very useful to convert cyrillic-only titles of cloned pages into a translit version to be used in page names/urls.
    *
    *   @date   28.10.2022
    */

    $FUNCS->add_event_listener( 'transliterate_clean_url', function(&$title){
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
        $title = strtr( $title, $charlist );
    });

    /*
    // ~~~~~~~~~~~~~
    // Credits
    // ~~~~~~~~~~~~~
    // You should have downloaded this code from https://github.com/trendoman/Tweakus-Dilectus
    // ~~~~~~~~~~~~~
    // Support
    // ~~~~~~~~~~~~~
    // Write me at <anton.cms@ya.ru>, <tony.smirnov@gmail.com> "Anton S aka Trendoman"
    // Telegram: https://t.me/couchcms
    */

