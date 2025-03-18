<cms:if "<cms:is_ajax />">

  <cms:set pg = "<cms:gpc 'pg' default='1' />" />
  <cms:incr pg />

  <cms:set response = '[]' is_json='1' />
  <cms:set response.success = '1' />
  <cms:set response.continue = '1' />
  <cms:set response.error = '' />
  <cms:set response.chase_link = "<cms:add_querystring k_template_link "pg=<cms:show pg />" />" />

  <cms:if pg gt '10'>
     <cms:set response.continue = '0' />
  </cms:if>

  <cms:abort><cms:content_type 'application/json' /><cms:show response as_json='1' /></cms:abort>

<cms:else />

  <cms:chase_links base_link=k_template_link>
    <cms:show_early>
      <cms:show chase_count />: <cms:show chase_link /><br>
      <cms:if chase_done >DONE!</cms:if>
    </cms:show_early>
  </cms:chase_links>

</cms:if>
