# `<cms:chase_links>`

Performs network requests (XHR) as long as the requested page responds with another link.

Handy to call paginated URLs.

```xml
<cms:chase_links k_template_link>..</cms:chase_links>
```

This tag can be used to perform any kind of tasks in a paginated staggered manner. Its main advantage is that it works on server side without need of Javascript.

## Parameters

* **base_link**
* **debug**
* **querystring**
* **allow_recursion**

## Example

Place tag on a page with **base_link** as a current template link to see the dumped variables —

```xml
<cms:chase_links base_link=k_template_link>
  <cms:dump />
</cms:chase_links>
```

Resulting dump helps track tag's work:

* chase_links
  - **chase_link**: http://example.local/index.php
  - **chase_count**: 1
  - **chase_time**: 0.332
  - **chase_total_time**: 0.332
  - **chase_http_code**: 200
  - **chase_memory_mb**: 2.2
  - **chase_response**:
  - **chase_error**: ERROR: Tag "chase_links": Page must return valid JSON.
  - **chase_done**: 1

To make the tag follow a new link, the new link must be supplied by the requested page via a predefined JSON scheme, for instance page responds with:

```js
{
  "success":"1",
  "continue":"1",
  "chase_link":"http:\/\/example.local\/index.php?pg=2&limit=5",
  "error":""
}
```

Combo of all three parameters above — **success** + **continue** + **chase_link** — is a requirement to chase a new link. Tag sends an XHR (Ajax) header. This header helps to separate necessary part of code that responds to requests (with **cms:is_ajax** tag). Let us see how it can be done with the complete code example —

## Complete code example

Create a new template and visit it as super-admin to view the results.

Full listing:

```xml
<?php require_once( 'couch/cms.php' ); ?>
<cms:template title="Testing Tag `chase_links`"
    clonable="0"
    >
</cms:template><cms:ignore>
/*
*   Test new tag "chase_links"
*/
</cms:ignore>
<cms:if "<cms:is_ajax />">

  <cms:set pg = "<cms:gpc 'pg' default='1' />" />
  <cms:incr pg />

  <cms:set response = '[]' is_json='1' />
  <cms:set response.success = '1' />
  <cms:set response.continue = '1' />
  <cms:set response.error = '' />
  <cms:set response.chase_link = "<cms:add_querystring k_template_link "pg=<cms:show pg />" />" />

  <cms:if pg gt '25'>
     <cms:set response.continue = '0' />
  </cms:if>

  <cms:abort><cms:content_type 'application/json' /><cms:show response as_json='1' /></cms:abort>

<cms:else />

  <cms:chase_links base_link=k_template_link debug='1'>
    <cms:show chase_count />: <cms:show chase_link /><br>
    <cms:if chase_done >DONE!</cms:if>
  </cms:chase_links>

</cms:if>
<?php COUCH::invoke(); ?>
```

After running the code you will see something like this —

```html
1: http://example.local/test.php
2: http://example.local/test.php?pg=2
3: http://example.local/test.php?pg=3
DONE!
```

Tag made the first request to the link in the **base_link** param (happens to be the link to the same template), and page responded with the next **chase_link**, every time incrementing the *pg* parameter (as you recognize it is used in pagination). There are only 3 (three) results, because of the parameter **debug** that, when set to ***1*** allows only 3 subsequent requests, helping avoid infinite loops. Make sure your code has a working provision to amend returning JSON and at some point send back `continue : 0` or even `success : 0`. Code in the full listing does this after 25 iterations. Let us rewrite the tag-pair's inner block to see how much time all 25 requests took and disable **debug**:

```
  <cms:chase_links base_link=k_template_link>
    <cms:if chase_done >DONE <cms:show chase_count /> pages in <cms:show chase_total_time /> seconds!</cms:if>
  </cms:chase_links>
```

↓↓

```
DONE 25 pages in 4.762 seconds!
```

In cases where the **base_link** must have URL-parameters you would normally use a regular CouchCMS tag **cms:add_querystring**:

```xml
<cms:chase_links base_link="<cms:add_querystring k_template_link 'limit=100' />">..</cms:chase_links>
```

Tag **chase_links** offers a separate parameter **querystring** as displayed below. What method is more comfortable in your code is up to you.

```xml
<cms:chase_links base_link=k_template_link querystring='limit=100'>..</cms:chase_links>
```

## Notes

1. If the page with code is refreshed multiple times, tag will NOT start requesting in parallel. A special locking mechanic prevents running another chase with the exactly same tag. Another tag placed on another line of code will run independently though.

2. The main thread uses a PHP instruction to keep the page working as long as the tag is requesting new links. Having such a single micro thread without time limit is memory-safe, because each requested page frees its occupied memory when response is sent back.

3. Tag sends another header to the requested page: *CouchCMS-Self-Call-Once: true*, which allows to avoid situations of recursion. Tag being present on chased page will not run, because it would be requested with this header. Parameter **allow_recursion** set to ***1*** disables the check and allows recursion.

4. Cookies are sent along, so the login information in the cookie makes CouchCMS think the page is requested by the current user (logged-in or anonymous).

## Installation

Everything described in the dedicated [**INSTALL**](/INSTALL.md) page applies.

## Support

[![Mail](https://img.shields.io/badge/gmail-%23539CFF.svg?&style=for-the-badge&logo=gmail&logoColor=white)](mailto:"Anton"<tony.smirnov@gmail.com>?subject=[GitHub])

See dedicated [**SUPPORT**](/SUPPORT.md) page.
