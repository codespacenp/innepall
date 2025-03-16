<?php require_once 'couch/cms.php'; ?>
<cms:template title='Robots & Sitemaps generator' parent='_menu_group_system_' icon='loop' order='1'>

   <cms:config_form_view>

   </cms:config_form_view>

</cms:template>


<cms:func 'is-lockable' uid=''><cms:ignore>
   ---
   Tries to obtain lock and return 1 if successful => parallel / simultaneous script exec is prevented.
   Example -

     <cms:call 'is-lockable' />

   ---
   You should have downloaded this function from https://github.com/trendoman/Cms-Fu
   Donate and help keep functions updated!
   Support requests: tony.smirnov@gmail.com "Antony"
   </cms:ignore>
   <cms:php>
      global $DB, $CTX;
      $uid = $DB->sanitize( $CTX->get('uid') );
      if( !$uid ) $uid = date('YmdHis', ceil(time()/(15*60))*15*60);
      $handle = 'lock_is_lockable_'.$uid;

      if( !$DB->is_free_lock($handle) ){ return 0;}
      if( !$DB->get_lock($handle) ){ return 0;}

      register_shutdown_function(function() use ($DB, $handle) {
         $DB->release_lock( $handle );
      });

      return 1;
   </cms:php>
</cms:func>
<cms:func 'php-time-limit' timeout='120'><cms:ignore>
   ---
   Override PHP maximum time for executing a script
   Example -

     <cms:call 'php-time-limit' '0' />

   ---
   You should have downloaded this function from https://github.com/trendoman/Cms-Fu
   Donate and help keep functions updated!
   Support requests: tony.smirnov@gmail.com "Antony"
   </cms:ignore>
   <cms:php>
      if( ! function_exists('set_time_limit') ){
         die('Error: PHP function "set_time_limit" is disabled on this server.');
      }
      global $CTX;
      $t = intval($CTX->get('timeout'));
      if( $t < 0 ) $t = 120;
      set_time_limit($t);
   </cms:php>
</cms:func>

<cms:call 'php-time-limit' '0' />

<cms:if "<cms:call 'is-lockable' 'test' />">

      <cms:ignore><!--/////////////////////////////////////////////////////////////BEGIN--></cms:ignore>
      <cms:ignore>
      <!-- Sitemap 1 - общи, категории, автори на статии, категории в блог и категории в магазин, категории и страници от секция "Други" -->
      </cms:ignore>

       <cms:ignore><!-- first call. writing the beginning of the xml file --></cms:ignore>
       <cms:capture into='xmlcontent' >
           <cms:concat
               '<'
               '?xml version="1.0" encoding="' k_site_charset '"?'
               '>'
               '<urlset xmlns="https://www.sitemaps.org/schemas/sitemap/0.9">'
           />
           <cms:ignore><!-- Общи --></cms:ignore>
           <url><loc><cms:show k_site_link/></loc></url>
       </cms:capture>

       <cms:write 'sitemap-common.xml' truncate='1'><cms:trim><cms:show xmlcontent /></cms:trim></cms:write>

      <cms:capture into='xmlcontent' >

          <cms:ignore><!-- Категории в Блог --></cms:ignore>
          <cms:folders masterpage='index.php' root='blog' include_custom_fields='1'
              paginate='0'
              hierarchical='1'
              limit='10000000000'>
               <cms:if "<cms:not redirect_on/>" && "<cms:not canonical_on/>" && "<cms:not noindex_on/>"><url><loc><cms:show k_site_link/><cms:show k_folder_name/>/</loc></url></cms:if>
          </cms:folders>

          <cms:ignore><!-- Категории в Магазин --></cms:ignore>
          <cms:folders masterpage='index.php' root='shop' include_custom_fields='1'
              paginate='0'
              hierarchical='1'
              limit='10000000000'>
               <cms:if "<cms:not redirect_on/>" && "<cms:not canonical_on/>" && "<cms:not noindex_on/>"><url><loc><cms:show k_site_link/><cms:show k_folder_name/>/</loc></url></cms:if>
          </cms:folders>

          <cms:ignore><!-- Категории в "Други" --></cms:ignore>
          <cms:folders masterpage='index.php' childof="<cms:php>echo K_SECTION_4_NAME;</cms:php>" include_custom_fields='1'
              paginate='0'
              hierarchical='1'
              limit='10000000000'>
               <cms:if "<cms:not redirect_on/>" && "<cms:not canonical_on/>" && "<cms:not noindex_on/>" && k_folder_name !='other'>
                   <url><loc><cms:show k_site_link/><cms:show k_folder_name/>/</loc></url>
               </cms:if>
          </cms:folders>

          <cms:ignore><!-- Страници в "Други" --></cms:ignore>
          <cms:pages masterpage='index.php' folder="<cms:php>echo K_SECTION_4_NAME;</cms:php>"
              page_name='NOT default-page-for-index-php-please-change-this-title'
              custom_field='redirect_on!=1 | canonical_on!=1 | noindex_on!=1'
              order='asc'
              limit='10000000000'
              paginate='0'><url><loc><cms:show k_site_link/><cms:show k_page_name/>.html</loc></url>
          </cms:pages>

      </cms:capture>
      <cms:write 'sitemap-common.xml' truncate='0'><cms:trim><cms:show xmlcontent /></cms:trim></cms:write>

      <cms:write 'sitemap-common.xml' truncate='0'><cms:show '</urlset>' /></cms:write>
      <cms:ignore><!-- /////////////////////////////////////////////////////////////END --></cms:ignore>

      <cms:abort>DONE!</cms:abort>

</cms:if>
<?php COUCH::invoke(); ?>
