# [Ascetic Sidebar](https://github.com/trendoman/Addons)

Administrators may switch on and off the sidebar items. Upon activating, the Ascetic Sidebar addon injects an editable "checkbox" field with templates as values.

![](img/field-group-tweaks.png)

Addon works if the Extended Users addon is enabled, because the new editable field is placed into the configured users template (variable `$t['users_tpl']` in the config).

## Licence

Open source but not freeware. Code & 6 months support is ***$25***.

## Installation

View **[INSTALL](/INSTALL.md)** file for info.

Installation remains the same as with other addons[^1].

[^1]: https://github.com/trendoman/Midware/tree/main/concepts/Extended-Users#installation

```php
require_once( K_COUCH_DIR.'addons/ascetic-sidebar/ascetic-sidebar.php' );
```

Repository [**Extended KFunctions**](https://github.com/trendoman/Extended-KFunctions) already includes the reference line above.

## Support

Hello, I'm Anton, the author of this addon. Email me and I'll try to help you.

[![Mail](https://img.shields.io/badge/gmail-%23539CFF.svg?&style=for-the-badge&logo=gmail&logoColor=white)](mailto:"Anton"<tony.smirnov@gmail.com>?subject=[GitHub])
