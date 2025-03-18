# `<cms:arr_join>`

Join array values into a string with values, optionally wrapped in quotes, with configurable separator.

```xml
<cms:arr_join arrvalues />
```

## Parameters

* **val**
* **sep**
* **quotes**

## Example

Will use this basic array:

```xml
<cms:set page_ids = '{"blog":["4","1"],"shop":["5"]}' is_json='1' />
```

Array can be taken as a variable, or string with (dynamic) array's name, or valid JSON string.

```xml
<cms:arr_join page_ids />

<cms:arr_join page_ids.blog />

<cms:arr_join "page_ids.<cms:show 'shop' />" />

<cms:arr_join '["4","1"]' />

<cms:arr_join page_ids.blog sep='|' quotes='0'/>

<cms:arr_join '["4","1"]' sep=' &rarr; ' quotes='0'/>
```

Default separator **sep** is a comma with space `, `. Default **quotes** is ***1***, resulting value will be JSON-encoded string – value in double quotes and inner double quotes escaped. Wrapping in single quotes is not supported.

Resulting strings:

```
"Array", "Array"

"4", "1"

"5"

"4", "1"

4|1

4 → 1
```

**TIP:** Comma-separated values can form a base for new arrays, if wrapped in brackets. Multiple strings can form a new continuous array without much effort —

```xml
<cms:set all_ids = "[ <cms:arr_join page_ids.blog />, <cms:arr_join page_ids.shop /> ]" is_json='1' />
<cms:show all_ids as_json='1'/>
```

Resulting JSON:

```
["4","1","5"]
```

## Related pages

* **[Midware Concepts » Arrays](https://github.com/trendoman/Midware/tree/main/concepts/Arrays#multi-level-variables-or-arrays)**
* **[Midware Tags Reference (Arrays)](https://github.com/trendoman/Midware/tree/main/tags-reference/Arrays/)**

## Installation

Everything described in the dedicated [**INSTALL**](/INSTALL.md) page applies.

## Support

[![Mail](https://img.shields.io/badge/gmail-%23539CFF.svg?&style=for-the-badge&logo=gmail&logoColor=white)](mailto:"Anton"<tony.smirnov@gmail.com>?subject=[GitHub])

See dedicated [**SUPPORT**](/SUPPORT.md) page.
