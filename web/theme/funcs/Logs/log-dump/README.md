# log-html

Save the output of ***&lt;cms:dump_all/&gt;*** to a HTML file.

```xml
<cms:call 'log-dump' />
```

## Parameters

* file

   Default file is ***my_log.html*** in website's root.

## Usage

Common application is to dump vars in redirect condition, where it is impossible to view the output of the tag.

```xml
<cms:if k_logged_out>
   <cms:call 'log-dump' />
   <cms:call 'log-html' "<cms:login_link />" />
   <cms:redirect "<cms:login_link />" />
</cms:if>
```

## Related funcs

* **[Cms-Fu &raquo; log-html](https://github.com/trendoman/Cms-Fu/tree/master/Logs/log-html)**
* **[Cms-Fu &raquo; log-php](https://github.com/trendoman/Cms-Fu/tree/master/Logs/log-php)**

## Related tags

* **[Documentation &raquo; log](https://docs.couchcms.com/tags-reference/log.html)**
* **[Midware Tags Reference &raquo; trim](https://github.com/trendoman/Midware/tree/main/tags-reference/trim.md)**
* **[Tweakus-Dilectus Tags » delete_file](https://github.com/trendoman/Tweakus-Dilectus/tree/main/anton.cms%40ya.ru__tags-new/delete_file)**

## Installation

```xml
<cms:embed 'funcs/Logs/log-dump/log-dump.func' />
```

## Support

Check out my dedicated [**SUPPORT**](/SUPPORT.md) page.
