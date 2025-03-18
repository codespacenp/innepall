# `<cms:hilite>`

Hilites parts of string correctly.

Tag handles well[^1] the intersected parts, UTF8 and UPPER/lower-case ( keeps the original string look ).

[^1]: https://github.com/CouchCMS/CouchCMS/issues/162#issuecomment-1289920904

```xml
<cms:hilite str='Nvidia' parts='n, i, ia' />
```

## Example

Hilited parts are wrapped in HTML —

```xml
<cms:hilite str='Nvidia' parts='n, i, ia' />
```

↓↓

```html
<b>N</b>v<b>i</b>d<b>ia</b>
```

## Algorithm

Each part (from longest to shortest) marks *protected* letters in the string —

first, "ia" reserves the found part:

```txt
Nvidia
    45
```

next, "i" reserves the only available part:

```txt
Nvidia
  2 45
```

Reserved positions are not checked for parts, therefore this helps avoid overlaps.

Finally, the replacement `ia → <b>ia</b>` is done from the end to beginning of the string. With each replacement the string is expanded, thus going backwards helps to follow original position of parts. Note that letters of original string (case-sensitive) are being replaced with hilited original letters. Parts are only used to measure length of substring for replacement.

## Installation

Everything described in the dedicated [**INSTALL**](/INSTALL.md) page applies.

## Support

See dedicated [**SUPPORT**](/SUPPORT.md) page.
