# `<cms:arr_substr_exists>`

Detect if a substring can be found in an array. Scanning stops upon first match and is case-insensitive.

```xml
<cms:arr_substr_exists 'str' in=arr />
```

Return values are ***0*** and ***1***.

Tag resembles tag **[arr_val_exists](#related-tags)**, but finds even part of value.

## Parameters

* **val**
* **in**

## Example

```xml
<cms:capture into='countries' is_json='1'>
[ "Russian Federation", "Aruba", "Belarus" ]
</cms:capture>

<cms:arr_substr_exists 'ru' in=countries />
```

↓↓

```
1
```

## Related tags

* **[Midware Tags Reference (Arrays) » arr_val_exists](https://github.com/trendoman/Midware/tree/main/tags-reference/Arrays/arr_val_exists.md)**
* **[Tweakus-Dilectus Tags » arr_substr_exists](https://github.com/trendoman/Tweakus-Dilectus/tree/main/anton.cms%40ya.ru__tags-new/arr_filter_values)**

## Installation

Everything described in the dedicated [**INSTALL**](/INSTALL.md) page applies.

## Support

[![Mail](https://img.shields.io/badge/gmail-%23539CFF.svg?&style=for-the-badge&logo=gmail&logoColor=white)](mailto:"Anton"<tony.smirnov@gmail.com>?subject=[GitHub])

See dedicated [**SUPPORT**](/SUPPORT.md) page.
