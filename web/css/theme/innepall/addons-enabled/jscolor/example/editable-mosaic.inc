<cms:mosaic name='my_fields' label='Fields'>
    <cms:tile name='editable_text' label='Text' >

        <cms:editable type='row' name='row0' order=''>
            <cms:editable name='name' label='Name' type='text' required='0' class='col-md-4' />
        </cms:editable>

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

    </cms:tile>
</cms:mosaic>
