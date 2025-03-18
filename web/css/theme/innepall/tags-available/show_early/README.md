# `<cms:show_early>`

Echoes enclosed content as fast as possible, regardless of CMS buffering.

```xml
<cms:show_early></cms:show_early>
```

## Example

```xml
<cms:show_early><html><body><h2></cms:show_early>

<cms:each 'Hello, world!' sep='//' is_regex='1' as='letter'>
  <cms:show_early><cms:show letter /></cms:show_early><cms:call 'sleep' '0.1' />
</cms:each>

</h2></body></html>
```

↓↓ (Click `►` to play gif )

<img width="300" src="hello-world.gif"/>

<small>&deg; White-space preserving thanks to the *UTF8 punctuation space* (courtesy of https://qwerty.dev/whitespace/)</small>

An advanced example of printing the output of a tag `cms:chase_links` is in the file [./example.chase_links.inc](example.chase_links.inc)

## Related pages

* [**CmsFu » sleep**](https://github.com/trendoman/Cms-Fu/tree/master/Server/sleep)
* [**Tweakus-Dilectus » chase_links**](https://github.com/trendoman/Tweakus-Dilectus/tree/main/anton.cms%40ya.ru__tags-new/chase_links/)

## Installation

Everything described in the dedicated [**INSTALL**](/INSTALL.md) page applies.

## Support

See dedicated [**SUPPORT**](/SUPPORT.md) page.
