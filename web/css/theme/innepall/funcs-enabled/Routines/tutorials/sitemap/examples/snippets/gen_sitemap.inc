<cms:ignore>
<!-- Sitemap 1 - общи, категории, автори на статии, категории в блог и категории в магазин, категории и страници от секция "Други" -->
</cms:ignore>

<cms:if task.pg = '' || task.pg = '1'>
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
    <cms:set task.notes. = "Job started. Written initial tags to [ sitemap-common.xml ] file" scope='parent' />
</cms:if>

<cms:capture into='xmlcontent' >

    <cms:ignore><!-- Категории в Блог --></cms:ignore>
    <cms:folders masterpage='index.php' root='blog' include_custom_fields='1'
        paginate='1'
        hierarchical='1'
        limit=task.pg_limit>
        <cms:if task.pg gt k_total_pages >
            <cms:ignore><!--do nothing -- see https://github.com/CouchCMS/CouchCMS/issues/140 --></cms:ignore>
        <cms:else />
            <cms:if "<cms:not redirect_on/>" && "<cms:not canonical_on/>" && "<cms:not noindex_on/>"><url><loc><cms:show k_site_link/><cms:show k_folder_name/>/</loc></url></cms:if>
            <cms:if k_paginated_bottom && k_paginate_link_next>
                <cms:set task.sequent_task = k_paginate_link_next scope='parent' />
            </cms:if>
        </cms:if>
    </cms:folders>

    <cms:ignore><!-- Категории в Магазин --></cms:ignore>
    <cms:folders masterpage='index.php' root='shop' include_custom_fields='1'
        paginate='1'
        hierarchical='1'
        limit=task.pg_limit>
        <cms:if task.pg gt k_total_pages >
            <cms:ignore><!--do nothing -- see https://github.com/CouchCMS/CouchCMS/issues/140 --></cms:ignore>
        <cms:else />
            <cms:if "<cms:not redirect_on/>" && "<cms:not canonical_on/>" && "<cms:not noindex_on/>"><url><loc><cms:show k_site_link/><cms:show k_folder_name/>/</loc></url></cms:if>
            <cms:if k_paginated_bottom && k_paginate_link_next>
                <cms:set task.sequent_task = k_paginate_link_next scope='parent' />
            </cms:if>
        </cms:if>
    </cms:folders>

    <cms:ignore><!-- Категории в "Други" --></cms:ignore>
    <cms:folders masterpage='index.php' childof="<cms:php>echo K_SECTION_4_NAME;</cms:php>" include_custom_fields='1'
        paginate='1'
        hierarchical='1'
        limit=task.pg_limit>
        <cms:if task.pg gt k_total_pages >
            <cms:ignore><!--do nothing -- see https://github.com/CouchCMS/CouchCMS/issues/140 --></cms:ignore>
        <cms:else />
            <cms:if "<cms:not redirect_on/>" && "<cms:not canonical_on/>" && "<cms:not noindex_on/>" && k_folder_name !='other'>
                <url><loc><cms:show k_site_link/><cms:show k_folder_name/>/</loc></url>
            </cms:if>
            <cms:if k_paginated_bottom && k_paginate_link_next>
                <cms:set task.sequent_task = k_paginate_link_next scope='parent' />
            </cms:if>
        </cms:if>
    </cms:folders>

    <cms:ignore><!-- Страници в "Други" --></cms:ignore>
    <cms:pages masterpage='index.php' folder="<cms:php>echo K_SECTION_4_NAME;</cms:php>"
        page_name='NOT default-page-for-index-php-please-change-this-title'
        custom_field='redirect_on!=1 | canonical_on!=1 | noindex_on!=1'
        order='asc'
        limit=task.pg_limit
        paginate='1'><url><loc><cms:show k_site_link/><cms:show k_page_name/>.html</loc></url>
        <cms:if k_paginated_bottom && k_paginate_link_next>
            <cms:set task.sequent_task = k_paginate_link_next scope='parent' />
        </cms:if>
    </cms:pages>

</cms:capture>

<cms:write 'sitemap-common.xml' truncate='0'><cms:trim><cms:show xmlcontent /></cms:trim></cms:write>

<cms:if task.sequent_task = '' ><!-- Quick Test (2pages): task.sequent_task = '' || task.pg gt '2' --></cms:ignore>

    <cms:write 'sitemap-common.xml' truncate='0'><cms:show '</urlset>' /></cms:write>

    <cms:set task.success = "1" scope='parent'/>
    <cms:set task.continue= "0" scope='parent'/>
<cms:else />
    <cms:set task.success = "1" scope='parent'/>
    <cms:set task.continue= "1" scope='parent'/>
</cms:if>
