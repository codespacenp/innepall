<?php
    if( !defined('K_ADMIN') ) return;
    if( $AUTH->user->access_level != K_ACCESS_LEVEL_SUPER_ADMIN ) return;

    /**
    *   Супер-админ наслаждается автоматическим обновлением полей (через ajax-запрос на страницу)
    *
    *   Super-admin reloads Admin-panel page again to see the refreshed fields without visiting page
    *
    *   @автор Антон С.
    *   @почта tony.smirnov@gmail.com
    *   @написал 31.10.2023
    *   @обновил 31.10.2023
    */
    $FUNCS->add_event_listener( 'add_admin_js', function(){
        global $FUNCS, $CTX;

        $js = '';
        ob_start();
?>
        //-
        // Tweak "background-refresh"
        // Request page in background for Super-admin to auto-refresh
        // by Антон С. tony.smirnov@gmail.com
        //-
        $(function(){ $.ajax('<?php echo $CTX->get('k_page_link'); ?>').always(function (rs) {
                if( rs.startsWith("ERROR:") ){
                    toastr.error(rs, "ERROR", { // TODO: localize
                        "positionClass": "toast-bottom-right",
                        "showDuration": "250",
                        "hideDuration": "250",
                        "timeOut": "10000",
                        "extendedTimeOut": "500",
                        "icon": '<svg class="i"><use xlink:href="<?php echo K_SYSTEM_THEME_URL;?>assets/open-iconic.svg#script"></use></svg>'
                    });
                }
            });
        });

<?php
        $js = ob_get_clean();
        $FUNCS->add_js( $js );
    });
