# urlencode

Encode URLs according to RFC 3986 (the specification for URI syntax), i.e. keeps [reserved characters](#related-pages): `:/?#[]@!$&'()*+,;=`

```xml
<cms:call 'urlencode' url=myurl />
```

## Parameters

* url

## Example

```xml
<cms:call 'urlencode' url='filter[]=Да!&filter[]=+'
```

↓

```txt
filter[]=%D0%94%D0%B0!&filter[]=+
```

## Related pages

* **[RFC 3986 » Reserved Characters](https://www.rfc-editor.org/rfc/rfc3986.html#section-2.2)**
* **[Uniform Resource Identifier (Wikipedia)](https://en.wikipedia.org/wiki/Uniform_Resource_Identifier)**

## Installation

**Use [Autoloading](https://github.com/trendoman/Cms-Fu/tree/master/ADDON-FUNCS-ON-DEMAND.md),**

or, alternatively, manually copy the func code to the page before the calling or embed func as a snippet —

```xml
<cms:embed 'funcs/Converters/urlencode/urlencode.func' />
```

## Support

[![Mail](https://img.shields.io/badge/gmail-%23539CFF.svg?&style=for-the-badge&logo=gmail&logoColor=white)](mailto:"Anton"<tony.smirnov@gmail.com>?subject=[GitHub])

Check out my dedicated [**SUPPORT**](/SUPPORT.md) page.
