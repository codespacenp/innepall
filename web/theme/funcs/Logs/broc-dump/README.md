# broc-dump

Specifically designed to print the output of ***&lt;cms:dump_all/&gt;*** tag to the browser's console.

```xml
<cms:call 'broc-dump' />
```

## Usage

Paste as is to any page, but it's recommended to use only during development.

Drop the call to some snippet on the website which is loaded for each page, for instance after Footer, and you instantly have all variables of the page before your eyes in console.

Display:

![](img/broc-dump-begin.png)

![](img/broc-dump-end.png)

## Related funcs

* **[CmsFu » broc](https://github.com/trendoman/Cms-Fu/tree/master/Logs/broc)**

## Installation

**Use [Autoloading](https://github.com/trendoman/Cms-Fu/tree/master/ADDON-FUNCS-ON-DEMAND.md),**

or, alternatively, manually copy the func code to the page before the calling or embed func as a snippet —

```xml
<cms:embed 'funcs/Logs/broc-dump/broc-dump.func' />
```

## Support

[![Mail](https://img.shields.io/badge/gmail-%23539CFF.svg?&style=for-the-badge&logo=gmail&logoColor=white)](mailto:"Anton"<tony.smirnov@gmail.com>?subject=[GitHub])

Check out my dedicated [**SUPPORT**](/SUPPORT.md) page.
