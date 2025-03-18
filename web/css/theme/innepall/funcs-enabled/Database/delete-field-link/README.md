# delete-field-link

Generates a table with link(s) which when clicked remove(s) an editable field from a template.

```xml
<cms:call 'delete-field-link' masterpage='index.php'/>
```

Result is a table that will be printed with detailed info about a field (type, name, label, removal-link, desc).

## Parameters

* masterpage
* names
* types

## Usage

Generate links for all fields in current template:

```xml
<cms:call 'delete-field-link' />
```

Specify certain types:

```xml
<cms:call 'delete-field-link' types='image, richtext'/>
```

Specify certain names:

```xml
<cms:call 'delete-field-link' names='brand_desc'/>
```

## Related tags

* db_fields

## Installation

**Use [Autoloading](https://github.com/trendoman/Cms-Fu/tree/master/ADDON-FUNCS-ON-DEMAND.md),**

or, alternatively, manually copy the func code to the page before the calling, or embed func as a snippet —

```xml
<cms:embed 'funcs/Database/delete-field-link/delete-field-link.func' />
```

## Support

[![Mail](https://img.shields.io/badge/gmail-%23539CFF.svg?&style=for-the-badge&logo=gmail&logoColor=white)](mailto:"Anton"<tony.smirnov@gmail.com>?subject=[GitHub])

Check out my dedicated [**SUPPORT**](/SUPPORT.md) page.
