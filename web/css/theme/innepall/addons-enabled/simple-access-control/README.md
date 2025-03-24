# [Simple access control](https://github.com/trendoman/Addons)

Addon helps restrict access to specific portions of the admin-panel to certain admins.

## Installation

View **[INSTALL](/INSTALL.md)** file for info.

Place the 'simple-access-control' folder into 'couch/addons'. Activate this addon the usual way i.e. make an entry in `couch/addons/kfunctions.php` like this -

```php
require_once( K_COUCH_DIR.'addons/simple-access-control/simple-access-control.php' );
```

Note: repository [**Extended KFunctions**](https://github.com/trendoman/Extended-KFunctions) already has this line.

## Usage

With the addon installed, let us configure the access restrictions for the admin-panel. For doing that, you'll find a file named 'example.config.php' within this addon's folder (i.e. within 'addons/simple-access-control').\
Please rename it to 'config.php'.

Within this config file you can add entries for all 'restricted access' templates.

For example, suppose you have three admins - 'admin', 'jane' and 'joe'. Further suppose that you wish a template named 'settings.php' to be accessible to only 'admin'. For that place the following entry in the config file -

```php
$t['settings.php'] = 'admin';
```

And now only the user 'admin' would be able to access the 'settings' template. All other users having access to the admin-panel ('jane' and 'joe' in our example) will simply not see this template listed in the sidebar. Further more, if they try to access the template by typing in its URL directly, they'll get an 'Access denied' message.

Taking the example scenario further, suppose there is a template named 'news.php' and you wish to keep out 'jane' from it. To do so, add the following line to the config -

```php
$t['news.php'] = 'admin | joe';
```

As you can see, we are specifying a list of users who are *allowed* access to the template (using a 'pipe' character to separate multiple names). Since the name 'jane' does not figure in the list, she will not be able to access this template in the admin-panel.

As the last example, consider the following entry in config -

```php
$t['blog.php'] = '';
```

Here the list of users allowed access to 'blog.php' is left blank. This will translate to no access to anybody (not even the super-admin). Conversely, if there is a template which should be accessible to everybody, simply leave it out from the config file.

Point being, that **if a template has its entry in the config file, this addon will enforce access restriction on it** allowing only the explicitly specified users access to it.

## Related pages

* [**https://www.couchcms.com/forum/viewtopic.php?f=8&t=10715#p27178**](https://www.couchcms.com/forum/viewtopic.php?f=8&t=10715#p27178) — source post and discussion
* **[All addons » access-control](https://github.com/trendoman/Addons/tree/main/copy-to-new)** – advanced access control
