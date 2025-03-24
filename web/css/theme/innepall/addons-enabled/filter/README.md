# [Filter by field](https://github.com/trendoman/Addons)

Addon adds a dropdown to filter page listing in admin-panel by a custom field.

## Installation

View **[INSTALL](/INSTALL.md)** file for info.

Place the 'filter' folder into 'couch/addons'. Activate this addon the usual way i.e. make an entry in `couch/addons/kfunctions.php` like this -

```php
require_once( K_COUCH_DIR.'addons/filter/filter.php' );
```

Note: repository [**Extended KFunctions**](https://github.com/trendoman/Extended-KFunctions) already has this line.

## Usage

This addon should support type **radio**, **checkbox**, **dropdown** and **relation** regions. Should be most useful for 'relation' I think. You can have multiple on the same template (separate the names with a pipe '|') although the real estate on the admin screen will make this less practical.

First, to attach this addon to your template with the editable region, do the following (let us suppose the template is 'blog.php' and the name of a radiobutton editable region is 'status') -

1. In this addon's folder (i.e. in 'couch/addons/filter'), you'll find a file named 'config.example.php'. Please rename it to 'config.php'.
2. Edit this config file and add the following line to it -

```php
$t['blog.php'] = 'status';
```

Of course, you need to put the actual name of your template and editable region.

With that done, coming back to the admin screen of the template you should see a dropdown with the values of your radiobuttons.

## Related pages

* [**https://www.couchcms.com/forum/viewtopic.php?f=8&t=10594&p=26489#p27057**](https://www.couchcms.com/forum/viewtopic.php?f=8&t=10594&p=26489#p27057) — source post and discussion
