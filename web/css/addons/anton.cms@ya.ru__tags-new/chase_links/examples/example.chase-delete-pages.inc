<cms:ignore><!-- Simple example. Complexity: 4/10.
Chaser requests pages as long as the maximum number of removals is not reached.
-->
</cms:ignore>
<cms:if "<cms:is_ajax />">

  <cms:capture into='report' is_json='1' scope='global'>
  {
    "success": <cms:escape_json>1</cms:escape_json>,
    "continue": <cms:escape_json>0</cms:escape_json>,
    "chase_link": <cms:escape_json></cms:escape_json>,
    "limit":  <cms:escape_json><cms:gpc 'limit' default='10'/></cms:escape_json>,
    "max_pages":  <cms:escape_json><cms:gpc 'max_pages' default='10'/></cms:escape_json>,
    "records":  <cms:escape_json><cms:gpc 'records' default='0'/></cms:escape_json>,
    "message": []
  }
  </cms:capture>

  <cms:pages masterpage=k_template_name skip_custom_fields='1' show_future_entries='1' show_unpublished='0' order='asc' limit=report.limit paginate='1'>
    <cms:db_delete masterpage=k_template_name page_id=k_page_id invalidate_cache='1' />
    <cms:incr report.records />

    <cms:if k_paginated_bottom && k_paginate_link_next>
        <cms:set report.chase_link = "<cms:add_querystring k_paginate_link_cur "records=<cms:show report.records />" />" scope='global' />
        <cms:set report.message. = "Removed <cms:concat report.records ' pages. ' '[' k_current_record ' / ' k_total_records '] pages.' />" scope='global' />
        <cms:test ignore='1'><cms:abort><cms:show_json report /></cms:abort></cms:test>
    </cms:if>
    <cms:test ignore='1'><cms:abort><cms:dump_all /></cms:abort></cms:test>

    <cms:no_results>
        <cms:set report.message. = "No more pages in \"<cms:show k_template_name />\"." scope='global' />
    </cms:no_results>
  </cms:pages>

  <cms:if report.chase_link>
     <cms:set report.continue = '1' scope='global'/>
  </cms:if>

  <cms:if report.records ge report.max_pages>
     <cms:set report.continue = '0' scope='global'/>
     <cms:set report.message. = "Desired maximum of <cms:show report.max_pages /> pages is removed (exactly <cms:show report.records />)." scope='global' />
  </cms:if>

  <cms:test ignore='1'><cms:abort><cms:show_json report /></cms:abort></cms:test>
  <cms:abort><cms:content_type 'application/json' /><cms:show report as_json='1' /></cms:abort>
</cms:if>

<cms:if "<cms:not "<cms:is_ajax />" />" >
  <cms:chase_links base_link=k_template_link querystring='limit=1&max_pages=6' >
    <cms:set msg = chase_message is_json='1' />
    <cms:show_early><cms:each msg><cms:show item/><br/></cms:each></cms:show_early>
    <cms:dump />
  </cms:chase_links>
</cms:if>
