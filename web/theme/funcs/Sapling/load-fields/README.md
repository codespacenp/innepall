# load-fields

Embed parts of code in template block.

```xml
<cms:call 'load-fields' />
```

## Parameters

* debug – can take ***1*** and by default is ***0***.

   ```xml
   <cms:call 'load-fields' debug='1'/>
   ```

   Query string parameter ***?debug=1*** will be checked if the value is not set or parameter not present.

   ```xml
   <cms:call 'load-fields' />
   ```

## Usage

Func loads snippets according to the schema from the *snippets* folder. Example template `shop/index.php` will try to include following snippets:

```
views/shop-index/config-form-view.inc
views/shop-index/config-list-view.inc
views/shop-index/shop-index.fields
views/shop-index/shop-index.globals
```

If some snippet is not present in the path above, it is ignored.

## Example

With both funcs **load-fields** and **load-view** the template code of `shop/index.php` may look as:

```xml
<?php require_once( '../couch/cms.php' ); ?>
<cms:template title="Test" clonable='1'>
  <cms:call 'load-fields' />
</cms:template>
<cms:call 'load-view' />
<?php COUCH::invoke(); ?>
```

Above setup helps bootstrap a template, create necessary snippet files in respective folder and write code separately in each snippet. It is very convenient for huge templates, such as ones in a shop, with a ton of fields, global settings, configs for list/form views.

Example files in default or configured (in this example it is *mysnippets*) folder with snippets -


####  clonable template "shop/index.php":

```
mysnippets/views/shop-index/config-form-view.inc
mysnippets/views/shop-index/config-list-view.inc
mysnippets/views/shop-index/shop-index.fields
mysnippets/views/shop-index/shop-index.globals

mysnippets/views/shop-index/list/default.html
mysnippets/views/shop-index/page/default.html
```

## Requirements

Two required codes must be available: func **embed** and also the variable **k__template_name_safe**.

* **[Sapling &raquo; embed](https://github.com/trendoman/Cms-Fu/tree/master/Sapling/embed)**
* **[Tweakus-Dilectus Variables » k__template_name_safe](https://github.com/trendoman/Tweakus-Dilectus/tree/main/anton.cms%40ya.ru__variables-new/k__template_name_safe)**

## Related funcs

* **[Sapling &raquo; load-view](https://github.com/trendoman/Cms-Fu/tree/master/Sapling/load-view)** - router for views

## Support

Check out my dedicated [**SUPPORT**](/SUPPORT.md) page.
