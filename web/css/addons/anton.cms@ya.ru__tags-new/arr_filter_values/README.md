# `<cms:arr_filter_values>`

Return all values from an array which contain a substring (case-insensitive).

```xml
<cms:arr_filter_values 'str' in=arr />
```

## Parameters

* **val**
* **in**
* **into**

Last parameter **into** takes a name of a variable that will hold the new array with matched values

## Example

Set an example array —

```xml
<cms:capture into='countries' is_json='1'>
[ "Russian Federation", "Aruba", "Belarus" ]
</cms:capture>
```

Create a new array with values that contain 'ar' —

```xml
<cms:arr_filter_values 'ar' in=countries into='arr'/>
<cms:show_json arr />
```

↓↓

```
[
   "Aruba",
   "Belarus"
]
```

Print JSON with values that contain 'ar' —

```xml
<cms:arr_filter_values 'ar' in=countries />
```

↓↓

```
["Aruba","Belarus"]
```

## Related tags

* **[Tweakus-Dilectus Tags » arr_substr_exists](https://github.com/trendoman/Tweakus-Dilectus/tree/main/anton.cms%40ya.ru__tags-new/arr_substr_exists)**

## Installation

Everything described in the dedicated [**INSTALL**](/INSTALL.md) page applies.

## Support

[![Mail](https://img.shields.io/badge/gmail-%23539CFF.svg?&style=for-the-badge&logo=gmail&logoColor=white)](mailto:"Anton"<tony.smirnov@gmail.com>?subject=[GitHub])

See dedicated [**SUPPORT**](/SUPPORT.md) page.
