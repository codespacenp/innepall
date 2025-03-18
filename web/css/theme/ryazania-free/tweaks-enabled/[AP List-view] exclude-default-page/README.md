# Default page is **auto-excluded**

Hides default pages from list-view automatically in all templates.

Default page must have a system-assigned default name, i.e. not renamed to normal name.

If it is renamed to 'Default page' then it will be also hidden.

Tweak does not interfere with values in your 'exclude' parameter of 'config_list_view' tag (if you have any). Tweak does not require 'config_list_view' to be present, it works without any config code. However, a masterpage must have tag `<cms:template>` (it is normally present always anyway).

## Credits

Anton S.\
tony.smirnov@gmail.com
