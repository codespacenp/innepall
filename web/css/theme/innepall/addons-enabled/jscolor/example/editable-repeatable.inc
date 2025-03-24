<cms:repeatable name='my_multiple' >
    <cms:editable type='text' name='my_repeatable_text' label='text' />
</cms:repeatable>

<cms:config_form_view >
    <cms:script>
        <cms:admin_load_js path="<cms:show k_admin_link />addons/jscolor/jscolor.js" />
            $( document ).ready(function() {

                repeatable_name = 'my_multiple';
                field_name = 'my_repeatable_text';

                my_options = {closable:true,closeText:'Ok'};

                // Repeatable Region (on Page Load)
                $("[id^=f_"+repeatable_name+"][id$="+field_name+"]").each(function() {
                    new jscolor(this, my_options );
                });

                // Repeatable Region (on Add Row)
                $(document).on("click", ".addRow", function() {
                    $("[id^=f_"+repeatable_name+"][id$="+field_name+"]").each(function() {
                        $( this ).addClass( 'jscolor' );
                        new jscolor(this, my_options );
                    });
                });
            });
    </cms:script>
</cms:config_form_view>
