# broc

Name is abbreviation of "Browser Console". Prints any data or variable to the console.

## Example

```xml
<cms:call 'broc' k_user_acces_level />
```

\- displays

![](img/broc-simple.png)


```xml
<cms:set rec = '["Airbus", Boing", "SSJ"]' is_json='1' />
<cms:call 'broc' rec />
```

\- displays

![](img/broc-array.png)

```xml
<cms:call 'broc' 'Update the core installation!' />
```

\- displays

![](img/broc-text.png)

## Related funcs

* **[CmsFu » broc-dump](https://github.com/trendoman/Cms-Fu/tree/master/Logs/broc-dump)**

## Installation

**Use [Autoloading](https://github.com/trendoman/Cms-Fu/tree/master/ADDON-FUNCS-ON-DEMAND.md),**

or, alternatively, manually copy the func code to the page before the calling or embed func as a snippet —

```xml
<cms:embed 'funcs/Logs/broc/broc.func' />
```

## Support

[![Mail](https://img.shields.io/badge/gmail-%23539CFF.svg?&style=for-the-badge&logo=gmail&logoColor=white)](mailto:"Anton"<tony.smirnov@gmail.com>?subject=[GitHub])

Check out my dedicated [**SUPPORT**](/SUPPORT.md) page.
