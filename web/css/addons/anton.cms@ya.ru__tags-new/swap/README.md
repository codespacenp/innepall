# `<cms:swap>`

Swap (replace) strings in a text with support of Arrays and RegEx.

```xml
<cms:swap val='mr.' with='Mr.'><cms:show text /></cms:swap>
```

## Parameters

* **val** – a string, or array of strings, or regular expression pattern(s) that will be searched for in the text.
* **with** – a string or array of strings that will be used as replacement(s).
* **is_regex** – a flag to indicate that **val** is a regex pattern (or array of patterns) – takes either ***0*** (default) or ***1***

## Example with strings

### Swap multiple tags

The task is to swap tag "pre" with "code" in the string

```html
<pre style="color:darkblue">$a = 5;</pre>
```

Either use arrays to supply the tag with multiple values and replacements or add an inner tag, each with a single-value swapping

#### with arrays

```xml
<cms:set arr_search = '["<pre", "</pre>"]' is_json='1'/>
<cms:set arr_replace = '["<code", "</code>"]' is_json='1'/>
<cms:swap val=arr_search with=arr_replace><pre style="color:darkblue">$a = 5;</pre></cms:swap>
```

> → Result:
> ```<code style="color:darkblue">$a = 5;</code>```

#### with inner tag

```xml
<cms:swap val='<pre' with='<code'>
  <cms:swap val='</pre' with='</code'>
    <pre style="color:darkblue">$a = 5;</pre>
  </cms:swap>
</cms:swap>
```

> → Result:
> ```<code style="color:darkblue">$a = 5;</code>```

Regex allows to write a one-liner

#### with regex

```xml
<cms:swap val='~<(/)?pre~' with='<$1code' is_regex='1'><pre style="color:darkblue">$a = 5;</pre></cms:swap>
```

## Example with regex

### Keep only money without currency symbol

```xml
<cms:swap val='/[^0-9.]/' with='' is_regex='1'>$ 123.00</cms:swap>
```

> → 123.00

### Convert a text to HTML

```xml
<cms:swap val='/(\r\n)?\s*(\w*):\s*(\w*)/' with='$1<b>$2</b>: $3<br/>$1' is_regex='1'>
  key1: value1
  key2: value2
</cms:swap>
```

> → Result:
> ```html
> <b>key1</b>: value1<br/>
> <b>key2</b>: value2<br/>
> ```
> → Preview:
> <pre>
> <b>key1</b>: value1
> <b>key2</b>: value2


### Short regex reference

The following should be escaped if you are trying to match that character

```txt
\ ^ . $ | ( ) [ ]
* + ? { } ,
```

<details><summary><strong>Common Special Character Definitions</strong></summary>

<pre>
\ Quote the next metacharacter
^ Match the beginning of the line
. Match any character (except newline)
$ Match the end of the line (or before newline at the end)
| Alternation
() Grouping
[] Character class
* Match 0 or more times
+ Match 1 or more times
? Match 1 or 0 times
{n} Match exactly n times
{n,} Match at least n times
{n,m} Match at least n but not more than m times

More Special Character Stuff

\t tab (HT, TAB)
\n newline (LF, NL)
\r return (CR)
\w Match a "word" character (alphanumeric plus "_")
\W Match a non-word character
\s Match a whitespace character
\S Match a non-whitespace character
\d Match a digit character
\D Match a non-digit character
\b Match a word boundary
\B Match a non-(word boundary)
</pre>

</details>

## Installation

Everything described in the dedicated [**INSTALL**](https://github.com/trendoman/Tweakus-Dilectus/blob/main/INSTALL.md) page applies.

## Related funcs

* **[CmsFu Converters » trim-tags](https://github.com/trendoman/Cms-Fu/tree/master/Converters/trim-tags)**
* **[CmsFu Money » inr-format](https://github.com/trendoman/Cms-Fu/tree/master/Money/inr-format)**

## Related tags

- [**Tweakus-Dilectus Tags » hilite**](https://github.com/trendoman/Tweakus-Dilectus/tree/main/anton.cms%40ya.ru__tags-new/hilite)
- [**Tweakus-Dilectus Tags » transliterate**](https://github.com/trendoman/Tweakus-Dilectus/tree/main/anton.cms%40ya.ru__tags-new/transliterate)
- [**Tweakus-Dilectus Tags » arr_filter_values**](https://github.com/trendoman/Tweakus-Dilectus/tree/main/anton.cms%40ya.ru__tags-new/arr_filter_values)

## Questions

If you need help with RegEx, ask me via email.

See dedicated [**SUPPORT**](https://github.com/trendoman/Tweakus-Dilectus/blob/main/SUPPORT.md) page.
