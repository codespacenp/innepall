<?php

    /**
    *   Берем значение стоковой переменной **k_template_name** и заменяем все не-буквы на дефисы, плюс отрезаем окончание -php
    *
    *   @автор Антон С.
    *   @почта tony.smirnov@gmail.com
    *   @написал 11.06.2022
    *   @обновил 31.10.2023
    */

    $FUNCS->add_event_listener( 'add_render_vars', function () {
        global $CTX, $FUNCS;

        $tpl_name_dashes = $FUNCS->get_clean_url( defined('K_ADMIN') ? $_GET['o'] : $CTX->get('k_template_name') );
        $tpl_name_dashes_nophp = rtrim($tpl_name_dashes, "ph");
        $tpl_name_dashes_nophp = rtrim($tpl_name_dashes_nophp, "-");

        $CTX->set('k__template_name_dashes_nophp', $tpl_name_dashes_nophp, 'global');
    });
