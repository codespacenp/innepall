# k__gpc

Adds a new variable `k__gpc` to the global context. It contains values from **GET**, **POST**, **COOKIE** and **`php://input`**.

It is quite comfortable to use this variable instead of default tag **[&lt;cms:gpc/&gt;](#related-pages)** to review all passed values.

There is **absolutely no security sanitization** of values. Consider using default tag in production for the user input and variable for simple comparisons.

## Example

Display everything in request —

```xml
<cms:show_json k__gpc />
```

You would see something similar to the following JSON:

`http://couch.local/?get=1&post=1&test=now&pg=2`

```json
{
   "GET":{
      "get":"1",
      "post":"1",
      "test":"now",
      "pg":"2"
   },
   "POST":[],
   "COOKIE":{
      "KCFINDER_showname":"on",
      "KCFINDER_showsize":"off",
      "KCFINDER_showtime":"off",
      "KCFINDER_order":"name",
      "KCFINDER_orderDesc":"off",
      "KCFINDER_view":"thumbs",
      "KCFINDER_displaySettings":"off",
      "couchcms_testcookie":"CouchCMS test cookie",
      "mycookie":"test",
      "PHPSESSID":"nm90sgvj1dvaarpt6tksnhrgq36t8sph",
      "couchcms_0990333521d5c55819147eb7bac23c58":"admin:1666079082:db9101df733dd37c78afe9d438343327"
   },
   "PHPINPUT":"",
   "get":"1",
   "post":"1",
   "test":"now",
   "pg":"2",
   "KCFINDER_showname":"on",
   "KCFINDER_showsize":"off",
   "KCFINDER_showtime":"off",
   "KCFINDER_order":"name",
   "KCFINDER_orderDesc":"off",
   "KCFINDER_view":"thumbs",
   "KCFINDER_displaySettings":"off",
   "couchcms_testcookie":"CouchCMS test cookie",
   "mycookie":"test",
   "PHPSESSID":"nm90sgvj1dvaarpt6tksnhrgq36t8sph",
   "couchcms_0990333521d5c55819147eb7bac23c58":"admin:1666079082:db9101df733dd37c78afe9d438343327"
}
```

Or print separate sections —

```xml
<cms:show_json k__gpc.POST />
```

Parse incoming JSON from payment processing companies —

```xml
<cms:set payload = k__gpc.PHPINPUT is_json='1' />
```

Direct access to values with **k__gpc** is identical to regular usage of `<cms:gpc>` tag –

```xml
<cms:show k__gpc.pg /> equals to <cms:gpc 'pg' /><br>
```

Or same but with access through a section —

```xml
<cms:show k__gpc.GET.pg /> equals to <cms:gpc 'pg' method='GET'/><br>
```

However in practice, variable allows quicker access for comparison. The common —

```xml
<cms:set test = "<cms:gpc 'test' />" />
<cms:if test eq 'now'>Test is running!</cms:if>
```

vs the new —

```xml
<cms:if k__gpc.test eq 'now'>Test is running!</cms:if><br>
```

— the latter saves an extra line of code.

---

Several sections and then all values together – designed to mimic original tag's parameter **method**. If you want to show in code that a value is expected to be passed via **post** method, use the extra hint e.g. `k__gpc.POST.myvalue`, otherwise demonstrate an indifference to the source and access directly via `k__gpc.myvalue`. Case is important.

---

**Production server should not rely on values passed without security measures.** Use variable only during development to quickly peek into arrays. Then switch to 'gpc' tag where necessary.

## Related pages

* **[Documentation » gpc](https://docs.couchcms.com/tags-reference/gpc.html)**

## Related tags

* **[Tweakus-Dilectus Modded Tags » gpc](https://github.com/trendoman/Tweakus-Dilectus/tree/main/anton.cms%40ya.ru__tags-modded/gpc)**

## Installation

Everything described in the dedicated [**INSTALL**](/INSTALL.md) page applies.

## Support

See dedicated [**SUPPORT**](/SUPPORT.md) page.
