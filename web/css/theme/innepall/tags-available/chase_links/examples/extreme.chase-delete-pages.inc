<cms:ignore><!-- Advanced example. Complexity: 10/10.
Example is based on `Addon Sling`. Chaser restarts itself after certain requests. This helps run operations within 30 sec time limit for indefinite time.

QS: limit=2&requests_before_restart=3&max_restarts=3
— it means "remove pages, 2 pages per request, make 3 requests, then restart and do max 3 restarts total.
This would make 2 X 3 = 6 pages removed before restart + 3 restarts X 6 pages each = 24 pages removed.
-->
</cms:ignore>


<cms:if "<cms:is_ajax />">

  <cms:capture into='report' is_json='1' scope='global'>
  {
    "success": <cms:escape_json>1</cms:escape_json>,
    "continue": <cms:escape_json>0</cms:escape_json>,
    "chase_link": <cms:escape_json></cms:escape_json>,
    "limit":  <cms:escape_json><cms:gpc 'limit' default='10'/></cms:escape_json>,
    "requests_before_restart": <cms:escape_json><cms:gpc 'requests_before_restart' default='5'/></cms:escape_json>,
    "requests_cnt": <cms:escape_json><cms:gpc 'cnt' default='0'/></cms:escape_json>,
    "max_restarts": <cms:escape_json><cms:gpc 'max_restarts' default='5'/></cms:escape_json>,
    "cnt_restarts": <cms:escape_json><cms:gpc 'cnt_restarts' default='0'/></cms:escape_json>,
    "message": ""
  }
  </cms:capture>

  <cms:if report.requests_cnt ge report.requests_before_restart>
    <cms:abort><cms:content_type 'application/json' /><cms:show report as_json='1' /></cms:abort>
  </cms:if>

  <cms:pages masterpage=k_template_name skip_custom_fields='1' show_future_entries='1' show_unpublished='0' order='asc' limit=report.limit paginate='1'>
    <cms:db_delete masterpage=k_template_name page_id=k_page_id invalidate_cache='1' />

    <cms:if k_paginated_bottom && k_paginate_link_next>
        <cms:incr report.requests_cnt />
        <cms:set report.chase_link = "<cms:add_querystring k_paginate_link_cur "cnt=<cms:show report.requests_cnt />" />" scope='global' />
        <cms:set report.message = "Removed <cms:concat '[' k_current_record ' / ' k_total_records '] pages.' />" scope='global' />
        <cms:test ignore='1'><cms:abort><cms:show_json report /></cms:abort></cms:test>
    </cms:if>
    <cms:test ignore='1'><cms:abort><cms:dump_all /></cms:abort></cms:test>

    <cms:no_results>
        <cms:set report.message = "No more pages in \"<cms:show k_template_name />\"." scope='global' />
    </cms:no_results>
  </cms:pages>

  <cms:if report.chase_link>
     <cms:set report.continue = '1' scope='global'/>
  </cms:if>

  <cms:if report.requests_cnt eq report.requests_before_restart>
    <cms:set report.continue = '0' scope='global'/>
    <cms:if report.cnt_restarts lt report.max_restarts>
        <cms:set report.message = "<cms:concat report.message ' Restarting..' />" scope='global'/>
        <cms:incr report.cnt_restarts />
        <cms:then>
          <cms:chase_links base_link=report.chase_link querystring="cnt=0&cnt_restarts=<cms:show report.cnt_restarts />" allow_recursion='1'>
            <cms:log "<cms:show_json chase_response /><cms:dump />" file='chaser.html' />
          </cms:chase_links>
        </cms:then>
    </cms:if>
  </cms:if>

  <cms:test ignore='1'><cms:abort><cms:show_json report /></cms:abort></cms:test>
  <cms:content_type 'application/json' /><cms:show report as_json='1' />
</cms:if>

<cms:if "<cms:not "<cms:is_ajax />" />" >
  <cms:chase_links base_link=k_template_link querystring='cnt=0&limit=2&requests_before_restart=3&max_restarts=3' >
    <cms:show_json chase_response /><cms:dump />
    <cms:log "<cms:show_json chase_response /><cms:dump />" file='chaser.html' />
  </cms:chase_links>
</cms:if>
