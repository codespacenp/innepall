# `<cms:no_robots>`

Tag is used to send the "X-Robots-Tag" header for SEO.

```xml
<cms:no_robots />
```

## Directives

* noindex
* nofollow
* noarchive
* nosnippet
* notranslate
* noimageindex

Default directive is **none** (means a combo of ***noindex, nofollow***) [^1] —

```http
X-Robots-Tag: none
```

Set desired directive explicitly —

```xml
<cms:no_robots 'nofollow, noarchive' />
```

↓↓

```http
X-Robots-Tag: nofollow, noarchive
```

[^1]: https://developers.google.com/search/docs/advanced/robots/robots_meta_tag#xrobotstag

## Installation

Everything described in the dedicated [**INSTALL**](/INSTALL.md) page applies.

## Support

[![Mail](https://img.shields.io/badge/gmail-%23539CFF.svg?&style=for-the-badge&logo=gmail&logoColor=white)](mailto:"Anton"<tony.smirnov@gmail.com>?subject=[GitHub])

See dedicated [**SUPPORT**](/SUPPORT.md) page.
