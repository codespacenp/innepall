# What's new in Cms-Fu

*Latest on top*

* ## [Database » delete-field-link](Database/delete-field-link)
   Generates a table with links that when clicked remove an editable field from a template.
* ## [Validate » is-ip-within](Validate/is-ip-within)
   Is ip-address within a given range?
* ## [Generators » show-file-date](Generators/show-file-date)
   Display file modification date
* ## [Validate » is-newer](Validate/is-newer)
   Compares two dates
* ## [Validate » is-older](Validate/is-older)
   Compares two dates
* ## [Secure » please-login](Secure/please-login)
   Redirect logged out users to login page with return path to current page.
* ## [DateTime » day-names](DateTime/day-names)
   Show locale-aware sequential list of day names, e.g. 'Monday | Tuesday | .. | Sunday'
* ## [DateTime » day-name](DateTime/day-name)
   Show locale-aware current day name e.g. "Monday".
* ## [Generators » show-size](Generators/show-size)
   Show file size in human-friendly form or pure bytes, with tweakable precision
* ## [Converters » urlencode](Converters/urlencode)
   Encode URLs according to RFC 3986 (i.e. with reserved characters)
* ## [Secure » protect-folder](Secure/protect-with-htaccess)
   Password-protect a folder with .htaccess + .htpasswd combo.
* ## [Secure » protect-file](Secure/protect-with-htaccess)
   Password-protect a file with .htaccess + .htpasswd combo.
* ## [Generators » show-icons](Generators/show-icons)
   Shows all open-iconic icons and code to copy-paste, choose icons without need to open their website.
* ## [Logs » log-dump](Logs/log-dump)
   Save the output of ***&lt;cms:dump_all/&gt;*** to a HTML file.
* ## [Sapling » load-view](Sapling/load-view)
   Router for views.
* ## [Server » geoip](Server/geoip)
   Get visitor's ip address, location, coordinates and more..
* ## [Logs » broc-dump](Logs/broc-dump)
   Show all variables in browser console (alternative for ***&lt;cms:dump_all/&gt;***)
* ## [Logs » broc](Logs/broc)
   Show any variable in browser console
* ## [Logs » log-event](Logs/log-event)
   Dump dispatched CouchCMS Event values to a file.
* ## [Generators » show-php](Generators/show-php)
   Print PHP's error log or PHP info page.
* ## [Generators » show-file](Generators/show-file)
   Show file content as text i.e. without Couch parsing.
* ## [Server » login](Server/login)
   Login a user programmatically without a form.
* ## [Converters &raquo; copy-hash](Converters/copy-hash)
   Get part of the string after ***#*** (anchor-hash)
* ## [**Sapling &raquo; embed-once**](Sapling/embed-once)
   Embed **once** and use path relative to other snippet.
* ## [Validate &raquo; is-bot](Validate/is-bot)
   Detects over 1400 bots. Based on code from **[CrawlerDetect.io →](https://crawlerdetect.io/)**.
* ## [Validate &raquo; is-image](Validate/is-image)
   Validate ***gif, png, bmp, jpeg, webp*** images by content or (less strict) mime.
* ## [Converters &raquo; trim-tags](Converters/trim-tags)
   Smart trimming of HTML tags from around the text.
* ## [Validate &raquo; is-file](Validate/is-file)
   Checks if local file exists if given an URL or disk path.
* ## [Generators &raquo; random-char-digit-sign-name](Generators/random-char-digit-sign-name)
   A few functions to get UTF-8 compliant random strings
* ## [Logs &raquo; log-php](Logs/log-php)
   Pumped-up logging to PHP's error_log
* ## [Routines &raquo; add-job](Routines/add-job)
* ## [Routines &raquo; execute-jobs](Routines/execute-jobs)
* ## [Routines &raquo; task-file-runner](Routines/task-file-runner)
* ## [Validate &raquo; is-lockable](Validate/is-lockable)
   Tries to obtain a lock and returns either ***1*** upon success or ***0*** if the lock is in use or can not be set.
* ## [Server &raquo; single-thread](Server/single-thread)
   Allows the script to finish before a new one can be started.
* ## [**Tweakus Dilectus &raquo; Addon "Func-on-demand"**](https://github.com/trendoman/Tweakus-Dilectus/tree/main/anton.cms@ya.ru__func-on-demand)
   Autoloading of 'func' snippets.
* ## [**Sapling &raquo; embed**](Sapling/embed)
   Embed snippets with parameters and a callback.
* ## [**DateTime &raquo; date-to-english-words**](DateTime/date-to-english-words)
   Convert a date to words in English.
* ## [**Money &raquo; inr-format**](Money/inr-format)
   Applies the **Indian Rupee** format to numbers.
* ## [**Database &raquo; database-names**](Database/database-names)
   Print all available on server databases, flagged as Couch-related or not.
* ## [**Database &raquo; database-name**](Database/database-name)
   Print name of the database.
* ## [**Math &raquo; ceil**](Math/ceil)
   Round up the value.
* ## [**Database &raquo; optimize-pages**](Database/optimize-pages)
   Single call to load optimized parameters for 'cms:pages' tag.
* ## [**Database &raquo; unpublish-by-name**](Database/unpublish-by-name)
   Unpublish a page if supplied with a name and masterpage.
* ## [Cache &raquo; uncache-by-pagelink](Cache/uncache-by-pagelink)
   Removes cache file from disk given page's URL.
* ## [Cache &raquo; invalidate-cache](Cache/invalidate-cache)
   Invalidates Couch cache.
* ## [Database &raquo; unpublish-by-id](Database/unpublish-by-id)
   Unpublish a page if supplied with id of page in 1 query.
* ## [Routines &raquo; create-pages](Routines/tutorials/create-pages) ○ Tutorial
   Create cloned pages in batches
* ## [DateTime &raquo; clock](DateTime/clock)
   Records time with a memo.
* ## [Routines](Routines) ○ Tutorial
   Perform activities following 'paginated' approach
* ## [Database &raquo; get-users](Database/get-users)
   Fetch users with a certain access level.
* ## [Validate &raquo; is-callable](Validate/is-callable)
   Is a named or anonymous function available to be called?
* ## [DateTime &raquo; show-ms](DateTime/show-ms)
   Show milliseconds of current time.
* ## [Server &raquo; sleep](Server/sleep)
   Make server wait.
* ## [Server &raquo; fetch-url](Server/fetch-url)
   Requests content of any URL.
* ## [Server &raquo; php-time-limit](Server/php-time-limit)
   Override maximum time for executing a PHP script.
* ## [Server &raquo; limit-decline](Server/limit-decline)
   Restricts visitors above the limit.
* ## [JSON &raquo; create-object](JSON/create-object)
   Returns valid JSON.
* ## [JSON &raquo; add-value-to-array](JSON/add-value-to-array)
   Adds a value to array.
* ## [Logs &raquo; log-html](Logs/log-html)
   Writes a message to a HTML file.
