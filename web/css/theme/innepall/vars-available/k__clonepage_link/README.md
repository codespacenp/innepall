# k__clonepage_link

New variable to access cloning action of Addon 'copy-to-new' from the frontend.

```xml
<cms:if k_user_access_level ge '7'>
    <a href="<cms:show k__clonepage_link />">Clone this page</a>
</cms:if>
```

Sample **k__clonepage_link**:

`http://site.local/couch/?o=index.php&q=copy/a2ae370ac7d8af72b590e3dcc4a524f9/92`

## Related pages

* **[All addons » copy-to-new](https://github.com/trendoman/Addons/tree/main/copy-to-new)**
* **[https://www.couchcms.com/forum/viewtopic.php?f=8&t=11545](https://www.couchcms.com/forum/viewtopic.php?f=8&t=11545)** — source post and discussion

## Installation

Everything described in the dedicated [**INSTALL**](/INSTALL.md) page applies.

## Support

See dedicated [**SUPPORT**](/SUPPORT.md) page.
