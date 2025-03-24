# [Color Picker • JSColor](https://github.com/trendoman/Addons)

Library [jscolor.js](https://jscolor.com) is a JavaScript color picker with opacity channel. This addon manifests a few examples of attaching the JS library to Couch' editable fields. Used version of the library is **2.0.5**. The current version is expectedly much higher though. Refer to the jscolor website to update.

## Installation

View **[INSTALL](/INSTALL.md)** file for info.

There are no PHP files, so there is nothing to load. Simply make sure the paths used in 'cms:config_form_view' tag (see [/example](example) folder) matches the path to the JS library.

```xml
<cms:admin_load_js path="<cms:show k_admin_link />addons/jscolor/jscolor.js" />
```

## Example

See [/example](example) folder to get ready code for your editable fields.

## Related pages

* **[https://www.couchcms.com/forum/viewtopic.php?f=8&t=7124](https://www.couchcms.com/forum/viewtopic.php?f=8&t=7124)** — original forum post and discussion
* **[https://jscolor.com](https://jscolor.com)** — library website
* **[/color-picker](/color-picker)** — another color picker
