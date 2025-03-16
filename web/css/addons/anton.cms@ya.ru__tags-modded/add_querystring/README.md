# [Modded `<cms:add_querystring>`](https://github.com/trendoman/Tweakus-Dilectus/tree/main/anton.cms%40ya.ru__tags-modded/add_querystring)

There are 2 modifications:

* Existing values of parameters are replaced with new ones, instead of just adding the new ones after the olds.

* Keys are ordered from shortest to longest.

## Example

```xml
<cms:add_querystring "<cms:add_querystring k_template_link 'test=2&key=3' />" 'test=3&key=4&ya=1' />
```

↓↓

```html
http://example.local/index.php?ya=1&key=4&test=3
```

## Installation

Everything described in the dedicated [**INSTALL**](/INSTALL.md) page applies.

## Support

See dedicated [**SUPPORT**](/SUPPORT.md) page.
