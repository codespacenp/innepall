# load-template-view

Router for views.

```xml
<cms:call 'load-template-view' />
```

## Parameters

Params work for Super-admin only.

* debug – can take ***1*** and by default is ***0***.

   ```xml
   <cms:call 'load-template-view' debug='1'/>
   ```

* Query string parameter ***?debug=1*** will be checked if the value is not set or parameter not present.

   ```xml
   <cms:call 'load-template-view' />
   ```

## Usage

Please use this func with the func **create-template-snippets**, which will set you up with proper files.

Router loads views from the snippets folder according to the current view i.e. folder-view, list-view, etc..

Tag **[&lt;cms:smart_embed/&gt;](#related-tags)** is employed to select file candidates indiferrently to extensions for **routable, clonable, non-clonable** templates

Place the func after the fields e.g.:

```xml
<?php require_once( '../couch/cms.php' ); ?>
<cms:template title="Shop Index" clonable='1'>
    <cms:call 'create-template-snippets' />
</cms:template>
<cms:call 'load-template-view' />
<?php COUCH::invoke(); ?>
```

### Routable template

Router will look for embeddable content in a single directory named after the matched route e.g.

* `mysnippets/{masterpage-php}/{k_matched_route}/route_{k_matched_route}.html`

### Non-clonable template

Router will look for embeddable content in a single directory named ***home***

* `mysnippets/{masterpage-php}/home/`

### Clonable template

Router will look for embeddable content in a directory which name will depend on current active view (based on visited URL)

* `mysnippets/{masterpage-php}/list/`
* `mysnippets/{masterpage-php}/page/`
* `mysnippets/{masterpage-php}/archive/`
* `mysnippets/{masterpage-php}/folder/`

## Dependencies

Code uses a new variable: `k__template_name_dashes`

* **Ryazania Theme variables » k__template_name_dashes**

Var is already connected via `/ryazania/vars-enabled/` by default.

## Related tags

* **[Documentation » smart_embed](https://docs.couchcms.com/miscellaneous/smart_embed.html)**


## Related funcs

* **Sapling » create-template-snippets** - creates necessary snippets for fields and views.

## Credits

Your feedback is always solicited. Drop me a mail and I'll try to get back.

Anton S.\
tony.smirnov@gmail.com
