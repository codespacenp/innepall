# show-size

Show file size in human-friendly form or pure bytes.

```xml
<cms:call 'show-size' "<cms:show k_admin_path />tags.php" />
```

## Parameters

* **file** — URL or absolute path or relative path to website directory
* **decimal_precision** — how many digits after dot
* **bytes_only** — raw byte number

## Example

```xml
<cms:call 'show-size' "<cms:show k_admin_path />tags.php" bytes_only='1'/><br>
<cms:call 'show-size' "<cms:show k_admin_path />tags.php" /><br>
<cms:call 'show-size' "<cms:show k_admin_path />tags.php" decimal_precision='2'/><br>
<cms:call 'show-size' "<cms:show k_admin_path />tags.php" decimal_precision='-1'/><br>
<cms:call 'show-size' "<cms:show k_admin_path />tags.php" decimal_precision='-2'/><br>
```

↓

```
349732
342 Kb
341.54 Kb
340 Kb
300 Kb
```

## Installation

**Use [Autoloading](https://github.com/trendoman/Cms-Fu/tree/master/ADDON-FUNCS-ON-DEMAND.md),**

or, alternatively, manually copy the func code to the page before the calling or embed func as a snippet —

```xml
<cms:embed 'funcs/Generators/show-size/show-size.func' />
```

## Support

[![Mail](https://img.shields.io/badge/gmail-%23539CFF.svg?&style=for-the-badge&logo=gmail&logoColor=white)](mailto:"Anton"<tony.smirnov@gmail.com>?subject=[GitHub])

Check out my dedicated [**SUPPORT**](/SUPPORT.md) page.
