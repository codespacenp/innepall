<?php
    if( !defined('K_ADMIN') ) return;

    /**
    *   Мягко автоскроллит страницу вниз после нажатия нижней кнопки "Сохранить"
    *
    *   Smooth-scrolls page to bottom 'Save' button if clicked it
    *
    *   @автор Антон С.
    *   @почта tony.smirnov@gmail.com
    *   @обновил 02.10.2023
    */
    $FUNCS->add_event_listener( 'add_admin_js', function(){
        global $FUNCS, $CTX;
        if( !$CTX->get('k_is_page' )) return;
        $js = '';
        ob_start();
?>

        //-
        // Tweak "scroll-to-bottom"
        // Smooth-scrolls page to bottom 'Save' button if clicked it
        // Мягко автоскроллит страницу вниз после нажатия нижней кнопки "Сохранить"
        // by Антон С. tony.smirnov@gmail.com
        //-
        document.addEventListener("DOMContentLoaded", function(event) {
            var scroll = localStorage.getItem('scroll-after-save');
            if (scroll == 1){ document.querySelector('#top').scrollIntoView({behavior: 'smooth'}); }
            localStorage.setItem('scroll-after-save', 0);
        });

        $("#content #btn_submit").click(function(){
            localStorage.setItem('scroll-after-save', 1);
        });

<?php
        $js = ob_get_clean();
        $FUNCS->add_js( $js );
    });
