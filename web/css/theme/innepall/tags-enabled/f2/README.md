# `<cms:f2>`

Renames a file or directory.

```xml
<cms:f2 'log.txt' />
```

## Parameters

* ***unnamed*** – path to existing file: relevant or absolute or URL.
* ***unnamed*** (optional) – new filename or ***''***

## Example

If the second parameter is not defined, adds an extension ***.f2ed*** to the file —

```xml
<cms:f2 'log.txt' />
```

> → renames "log.txt" to "log.txt.f2ed"

If the second parameter is an existing file, skips renaming —

```xml
<cms:f2 'log.txt' 'index.php' />
```

> → does not rename "log.txt" into "index.php"

If the second parameter is defined but empty, deletes the file / directory —

```xml
<cms:f2 'log.txt' '' />
```

> → removes "log.txt"

A folder will be removed only if it is already empty! —

```xml
<cms:f2 "myuploads\tmp" ""/>
```

> → removes empty dir "//website.local/myuploads/tmp"

## Installation

Everything described in the dedicated [**INSTALL**](https://github.com/trendoman/Tweakus-Dilectus/blob/main/INSTALL.md) page applies.

## Related tags

- [**delete_file**](https://github.com/trendoman/Tweakus-Dilectus/tree/main/anton.cms%40ya.ru__tags-new/delete_file)
- [**write**](https://github.com/trendoman/Tweakus-Dilectus/tree/main/anton.cms%40ya.ru__tags-new/write)

## Questions

See dedicated [**SUPPORT**](https://github.com/trendoman/Tweakus-Dilectus/blob/main/SUPPORT.md) page.
