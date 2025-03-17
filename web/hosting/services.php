<?php require_once( '../css/cms.php' ); ?>
<cms:template title='Services' parent='_hosting_' icon='tags' clonable='1'>
    <cms:config_form_view>
        <cms:field 'k_page_title' label='Service Type' order='0' />
        <cms:field 'k_page_name' group='_advanced_settings_' />
    </cms:config_form_view>
    <cms:editable label='Page hits' name='page_hits' type='text' search_type='integer' group='_advanced_settings_' order='100' />
    <cms:config_list_view orderby='weight' order='desc' exclude='default-page-for-hosting-services-php' searchable='1'>
        <cms:field 'k_selector_checkbox' />
        <cms:field 'k_page_title' header='Services' />
        <cms:field 'k_up_down' />
        <cms:field 'k_actions' />
    </cms:config_list_view>
    
<!-- Editable Fields -->
 <cms:editable name='description' label='Description' type='textarea' order='10' searchable='1' search_type='text'  />
 <cms:editable name='relation_group' label='Relations' type='group' order='20' collapsed='0' >
 <cms:editable name='services_companies' label='Companies' type='relation' masterpage='hosting/companies.php' orderby='page_title' order='10' order_dir='asc' advanced_gui='1' show_manage='1' />
 <cms:editable name='services_plans' label='Plans' type='reverse_relation' field='plans_services' masterpage='hosting/plans.php' orderby='page_title' order='10' order_dir='asc' advanced_gui='1' show_manage='1' />
 </cms:editable>
</cms:template>
<cms:smart_embed 'hosting' />
<?php COUCH::invoke(); ?>