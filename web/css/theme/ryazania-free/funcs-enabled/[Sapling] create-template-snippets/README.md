# create-template-snippets

Creates empty files in snippets dir for current masterpage. Place the call anywhere on page, it will work only for Super-admin.

```xml
<cms:call 'create-template-snippets' />
```

Example: **shop/index.php** masterpage will have following files added (if not exist) (snippets dir is set to be /mysnippets/ only for this example):

```txt
/mysnippets/shop-index-php/shop-index_form_config.inc
/mysnippets/shop-index-php/shop-index_list_config.inc
/mysnippets/shop-index-php/shop-index.fields
/mysnippets/shop-index-php/shop-index.globals
```

Place the call anywhere on page, it will work only for Super-admin. In following code I dropped it as usual to **cms:template** block.

```xml
<?php require_once( '../couch/cms.php' ); ?>
<cms:template title="Shop Index" clonable='1'>
    <cms:call 'create-template-snippets' />
</cms:template>
<?php COUCH::invoke(); ?>
```

Additionally, a few more snippets will be created, for various Views (page, folder, list, archive, home):

####  clonable masterpage "shop/index.php":

```txt
mysnippets/shop-index-php/list/shop-index-list.html
mysnippets/shop-index-php/page/shop-index-page.html
mysnippets/shop-index-php/archive/default.html
mysnippets/shop-index-php/folder/default.html
```

####  non-clonable template "settings.php":

```txt
mysnippets/settings-php/home/settings-default.html
```

####  masterpage "api.php" with custom routes:

> Note: matched route is in var `k_matched_route`

```txt
mysnippets/api-php/{k_matched_route}/route_{k_matched_route}.html
```

## Dependencies

Code uses tag `<cms:write>` and a few new variables: `k__snippets_path`, `k__template_name_dashes`, `k__template_name_dashes_nophp`.

* **Ryazania Theme variables » k__snippets_path**
* **Ryazania Theme variables » k__template_name_dashes**
* **Ryazania Theme variables » k__template_name_dashes_nophp**
* **Ryazania Tags » write**

Vars are already connected via `/ryazania/vars-enabled/` and tag in `ryazania/tags-enabled/`.

## Related funcs

* **Sapling » load-view** - router for views
* **Sapling » load-template-view** - alternative router for views

## Credits

Your feedback is always solicited. Drop me a mail and I'll try to get back.

Anton S.\
tony.smirnov@gmail.com
