<?php require_once('../css/cms.php'); ?>
<cms:template title='Companies' parent='_hosting_' icon='briefcase' clonable='1'>
    <cms:config_form_view>
        <cms:field 'k_page_title' label='Company Name' order='0' />
        <cms:field 'k_page_name' group='_advanced_settings_' />
    </cms:config_form_view>
    <cms:editable label='Page hits' name='page_hits' type='text' search_type='integer' group='_advanced_settings_'
        order='100' />
    <cms:config_list_view orderby='weight' order='desc' exclude='default-page-for-hosting-companies-php' searchable='1'>
        <cms:field 'k_selector_checkbox' />
        <cms:field 'k_page_title' header='Companies' />
        <cms:field 'k_up_down' />
        <cms:field 'k_actions' />
    </cms:config_list_view>
    <cms:editable name='top_group' label='Company Info' type='group' order='10' collapsed='0' />
    <cms:editable name='company_1_row' group='top_group' type='row' order='10'>
        <cms:editable name='nepali_name' label='कम्पनीको नाम' type='text' order='10' class='col-md-2' />
        <cms:editable name='short_info' label='Short Information' desc='Limit upto 160 characters' type='text'
            order='20' class='col-md-6' />
        <cms:editable name='companies_services' label='Services' type='reverse_relation' field='services_companies'
            masterpage='hosting/services.php' order='30' class='col-md-2' />
        <cms:editable name='companies_plans' label='Plans' type='reverse_relation' field='plans_companies'
            masterpage='hosting/plans.php' order='40' class='col-md-2' />
    </cms:editable>
    <cms:editable name='company_2_row' group='top_group' type='row' order='20'>
        <cms:editable name='tag_line' label='Tag Line' type='text' order='10' class='col-md-4' />
        <cms:editable name='address' label='Address' type='text' order='20' class='col-md-4' />
        <cms:editable name='featured' label='Featured' desc='Is it featured product?' opt_values='Yes | No' order='30'
            opt_selected='No' type='radio' class='col-md-2' />
        <cms:editable name='promo_code' label='Promo Code' type='text' order='40' class='col-md-2' />
    </cms:editable>
    <cms:editable name='about' label='About Company' type='richtext' order='30' />
    <cms:editable name='image_group' label='Company Images' type='group' order='40' collapsed='0' />
    <cms:editable name='company_3_row' group='image_group' type='row' order='40'>
        <cms:editable name='logo' label='Logo' type='image' width='512' enforce_max='1' desc='Use square image'
            show_preview='1' preview_height='32' allowed_ext='jpg, jpeg, png, webp' order='10' class='col-md-6' />
        <cms:editable name='screenshot' label='Screenshot' desc='Screenshot of the company website' type='image' width='1660' enforce_max='1' show_preview='1' preview_height='32' allowed_ext='jpg, jpeg, png, webp'
            order='20' class='col-md-6' />
    </cms:editable>
    <cms:repeatable name='links' label='Links' stacked_layout='0' order='50'>
        <cms:editable name='type' label='Type'
            opt_values='Please Select=- | Homepage| Features | Demo | Download | Purchase | Register' order='10'
            type='dropdown' />
        <cms:editable name='url' label='URL' type='text' required='1' validator='url' order='20' />
    </cms:repeatable>
    <cms:repeatable name='post_faq' label='Frequently Asked Questions' stacked_layout='1' order='60'>
        <cms:editable name='question' label='Questions' type='text' />
        <cms:editable name='answer' label='Answer' type='richtext' toolbar='custom'
            custom_toolbar='bold, italic, underline, strike, -, subscript, superscript | justifyleft, justifycenter, justifyright, justifyblock | numberedlist, bulletedlist, -, outdent, indent, blockquote | cut, pastetext, pastefromword | undo, redo, -, removeformat, -, link, unlink' />
    </cms:repeatable>
    <cms:globals>
    </cms:globals>
</cms:template>
<cms:smart_embed 'hosting' />
<?php COUCH::invoke(); ?>