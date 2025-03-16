<?php require_once( 'css/cms.php' ); ?>
<cms:template title='Global Information' parent='_general_' icon='globe' order='10'>
    <cms:editable type='group' name='info' label='Information' desc='Website Information' order='10' />
    <cms:editable name='info_row' type='row' group='info' order='10'>
        <cms:editable type='text' name='sitetitle' label='Site Title' desc="Title of the site" order='10' class='col-md-4' />
        <cms:editable type="text" name="sitekey" label="Site Keyword" order='20' class='col-md-4' />
        <cms:editable type="text" name="sitename" label="Site Name" desc="Single Word Name" order='30' class='col-md-2' />
        <cms:editable type="text" name="sitelang" label="Site Language" desc="'en' for English" order='35' class='col-md-2' />
        <cms:editable type='textarea' name='sitedesc' height='100' label='Site Description' desc="Description of the service" order='40' class='col-md-12' />
        <cms:editable type='image' name='logo' label='Logo' show_preview='1' allowed_ext='jpg, jpeg, png, webp, avif, svg' preview_width='80' order='50' class='col-md-6' />
        <cms:editable type='image' name='logo_white' label='Logo White' show_preview='1' allowed_ext='jpg, jpeg, png, webp, avif, svg' preview_width='80' order='60' class='col-md-6' />
        <cms:editable type='image' name='favicon' label='Favicon' show_preview='1' allowed_ext='jpg, jpeg, png, webp, avif, svg' preview_width='80' order='61' class='col-md-12' />
        <cms:editable type="text" name="siteshortname" label="Short Name" desc='Abbreviation of Organization' order='90' class='col-md-2' />
        <cms:editable name="email" label="Email" type="text" order='100' class='col-md-3' />
        <cms:editable name="altemail" label="Alternate Email" type="text" order='105' class='col-md-3' />
        <cms:editable name="phone" label="Phone" type="text" order='110' class='col-md-2' />
        <cms:editable name="altphone" label="Alternate Phone" type="text" order='120' class='col-md-2' />
        <cms:editable name="street" label="Street" type="text" order='130' class='col-md-3' />
        <cms:editable name="place" label="Place" type="text" order='140' class='col-md-3' />
        <cms:editable name="location" label="Location" type="text" order='141' class='col-md-3' />
        <cms:editable name="company" label="Company" type="text" order='150' class='col-md-3' />
        <cms:editable name='compdesc' label='Company Description' type='textarea' order='160' class='col-md-12' />
        <cms:editable name="gmap" label="Google Map" type="textarea" desc="Google Map Embed Code" no_xss_check='1' order='190' class='col-md-12' />
    </cms:editable>
    <!-- General Information Ends -->
    <cms:editable name='social' label='Social Account' type='group' order='20' collapsed='0' />
    <cms:editable name='facebook' label='Facebook URL' type='text' order='10' group='social' />
    <cms:editable name='insta' label='Instagram URL' type='text' order='20' group='social' />
    <cms:editable name='linkedin' label='LinkedIn URL' type='text' order='30' group='social' />
    <cms:editable name='youtube' label='YouTube URL' type='text' order='40' group='social' />
    <cms:editable name='twitter' label='Twitter URL' type='text' order='50' group='social' />
    <!-- Social Link Ends -->
</cms:template>
<cms:smart_embed 'home' />
<?php COUCH::invoke(); ?>