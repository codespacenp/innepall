# log-dump

Save the output of tag `<cms:dump_all/>` to a HTML file.

Example -

```xml
<cms:call 'log-dump' />
```

## Parameters

* file

   Default value is ***my_log.html*** in website's root.

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

* **log-php**
* **broc-dump** — browser console prints dump

## Related tags

* **[Official documentation » cms:log](https://docs.couchcms.com/tags-reference/log.html)**
* **[Midware Tags Reference » cms:trim](https://github.com/trendoman/Midware/tree/main/tags-reference/trim.md)**
* **Tags » cms:delete_file**

## Credits

Your feedback is always solicited. Drop me a mail and I'll try to get back.

Anton S.\
tony.smirnov@gmail.com
