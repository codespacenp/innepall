# load-view

Router for views.

```xml
<cms:call 'load-view' debug='' />
```

## Parameters

* debug – can take ***1*** and by default is ***0***.

   ```xml
   <cms:call 'load-view' debug='1'/>
   ```

   Query string parameter ***?debug=1*** will be checked if the value is not set or parameter not present.

   ```xml
   <cms:call 'load-view' />
   ```

## Usage

Router loads views from *snippets* folder according to the current view i.e. folder-view, list-view, etc..

Tag **[&lt;cms:smart_embed/&gt;](#related-tags)** is employed to select file candidates indiferrently to extensions for **routable, clonable, non-clonable** templates

### Routable template

Router will look for embeddable content in a single directory named after the matched route e.g.

* `templates/name-of-routable-template/name-of-matched-route/`

Expected file names: ***default***, *template-name*___-default___.

### Non-clonable template

Router will look for embeddable content in a single directory named ***home***

* `templates/name-of-nonclonable-template/home/`.

### Clonable template

Router will look for embeddable content in a directory which name will depend on current active view (based on visited URL)

* `templates/name-of-nonclonable-template/page/`
* `templates/name-of-nonclonable-template/list/`
* `templates/name-of-nonclonable-template/folder/`
* `templates/name-of-nonclonable-template/archive/`

## Requirements

* **[Tweakus-Dilectus Variables » k__template_name_safe](https://github.com/trendoman/Tweakus-Dilectus/tree/main/anton.cms%40ya.ru__variables-new/k__template_name_safe)**

## Related tags

* **[Documentation » smart_embed](https://docs.couchcms.com/miscellaneous/smart_embed.html)**
