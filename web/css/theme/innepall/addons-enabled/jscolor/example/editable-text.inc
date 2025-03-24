<cms:editable name='text' type='text'/>

<cms:config_form_view >
    <cms:script>
        <cms:admin_load_js path="<cms:show k_admin_link />addons/jscolor/jscolor.js" />
            $( document ).ready(function() {

                field_name = 'text';

                my_options = {closable:true,closeText:'Ok'};

                // Text field (even if single)
                $("#f_"+field_name).each(function() {
                    new jscolor(this, my_options );
                });

            });
    </cms:script>
</cms:config_form_view>
