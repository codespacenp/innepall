# `<cms:back2html>`, `<cms:htmldecode>`, `<cms:html_decode>`

Decode html entities.

```xml
<cms:back2html '&quot;firstname&quot;' /> // "firstname"
<cms:back2html '&euro;' /> // €
```

– same, as a tag-pair –

```xml
<cms:back2html>&quot;firstname&quot;</cms:back2html>
```

Arrays are accepted and returned as JSON.

```xml
<cms:set test='["&Yuml;&quot;"]' is_json='1' />

<cms:show test as_json='1'/>
<cms:back2html test />
<cms:back2html test.0 />
<cms:back2utf "<cms:back2html test />" />
```

↓↓

```txt
["&Yuml;&quot;"]
["\u0178\""]
Ÿ"
["Ÿ\""]
```

## Installation

Everything described in the dedicated [**INSTALL**](/INSTALL.md) page applies.

## Support

[![Mail](https://img.shields.io/badge/gmail-%23539CFF.svg?&style=for-the-badge&logo=gmail&logoColor=white)](mailto:"Anton"<tony.smirnov@gmail.com>?subject=[GitHub])

See dedicated [**SUPPORT**](/SUPPORT.md) page.
