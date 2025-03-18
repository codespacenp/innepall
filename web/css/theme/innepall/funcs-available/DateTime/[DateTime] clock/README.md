# clock

Records time and a memo. Calculates difference between calls. Sends SQL SELECT to track queries sent between.

```xml
<cms:call 'clock' memo='Timer init'/>
..
<cms:call 'clock' memo='Timer done' show='1'/>
```

Unlimited number of memos are kept in the global variable **clock**.

Format of time is **H:i:s** with milliseconds.

## Example

```xml
<cms:call 'clock' 'init' />
<cms:pages limit='3'>
  <cms:call 'clock' "page<cms:show k_count />-fetched" />
</cms:pages>
<cms:call 'clock' 'complete' show='1'/>
```

↓

```
0001 11:04:53 003 :: init
            + 5
0002 11:04:53 008 :: page1-fetched
            + 2
0003 11:04:53 010 :: page2-fetched
            + 2
0004 11:04:53 012 :: page3-fetched
0005 11:04:53 012 :: complete
```

– printing difference in milliseconds. If you opt to skip it, set **diff** to ***0*** —

```
..
<cms:call 'clock' 'complete' show='1' diff='0'/>
```

↓

```
0001 11:02:27 335 :: init
0002 11:02:27 341 :: page1-fetched
0003 11:02:27 345 :: page2-fetched
0004 11:02:27 347 :: page3-fetched
0005 11:02:27 347 :: complete
```

## Parameters

* __memo__ — a message that will be stored alongside current time.
* __show__ — if ***1***, prints **clock** as text (in &lt;pre&gt;)
* __diff__ — if ***0***, skips printing difference between events.

## Usage

Designed to track tag's time, this function will keep memos and times in a list.

### default

```xml
<cms:call 'clock' memo='Tag :pages start'/>

.. some probably long-executing code ..
<cms:pages masterpage=k_template_name limit='10000' />

<cms:call 'clock' memo='Tag :pages end' show='1'/>
```

### custom print

Print **clock** variable using a printing scheme you wish. Default structure of array **clock** —

```xml
[
   {
      "step":"0001",
      "memo":"init",
      "ts":1676880555190,
      "ms":"190",
      "date":"11:09:15",
      "diff":""
   }
]
```

– list it as json –

```xml
<cms:if "<cms:tag_exists 'show_json' />">
  <cms:show_json clock />
<cms:else />
  <cms:show clock as_json='1' />
</cms:if>
```

### SQL query log

Every time the **clock** is ticking it sends a SELECT to database. This amazing feature allows to review database queries fired between the various parts of code. It costs only a fraction (~0.1-0.5ms) of a millisecond which is nothing. Here is a cut from my query log (using the initial example) –

```sql
..
..
04:35:40.562114Z	 SELECT * FROM couch_templates WHERE id='40'
04:35:40.563005Z	 SELECT config_form FROM couch_templates WHERE id='40'
04:35:40.563570Z	 SELECT config_list FROM couch_templates WHERE id='40'
04:35:40.570419Z	 SELECT "------------ CLOCK :: init --------"
04:35:40.570967Z	 SELECT * FROM couch_templates WHERE name='run.php'
04:35:40.571635Z	 SELECT count(p.id) as cnt FROM couch_pages p WHERE p.template_id='40' AND p.publish_date < '2023-02-21 07:35:40' AND NOT p.publish_date = '0000-00-00 00:00:00' AND p.parent_id=0
04:35:40.572555Z	 SELECT p.id, p.template_id FROM couch_pages p WHERE p.template_id='40' AND p.publish_date < '2023-02-21 07:35:40' AND NOT p.publish_date = '0000-00-00 00:00:00' AND p.parent_id=0 ORDER BY p.publish_date desc LIMIT 0, 3
04:35:40.573584Z	 SELECT * FROM couch_pages WHERE id='447' AND template_id='40'
04:35:40.574170Z	 SELECT field_id, value FROM couch_data_text WHERE page_id='447'
04:35:40.574734Z	 SELECT field_id, value FROM couch_data_numeric WHERE page_id='447'
04:35:40.575244Z	 SELECT cid FROM couch_relations WHERE pid = '447' AND fid = '11387'
04:35:40.576420Z	 SELECT "------------ CLOCK :: page1-fetched --------"
04:35:40.576985Z	 SELECT * FROM couch_pages WHERE id='424' AND template_id='40'
04:35:40.577582Z	 SELECT field_id, value FROM couch_data_text WHERE page_id='424'
04:35:40.578053Z	 SELECT field_id, value FROM couch_data_numeric WHERE page_id='424'
04:35:40.578904Z	 SELECT "------------ CLOCK :: page2-fetched --------"
04:35:40.579461Z	 SELECT * FROM couch_pages WHERE id='423' AND template_id='40'
04:35:40.580051Z	 SELECT field_id, value FROM couch_data_text WHERE page_id='423'
04:35:40.580542Z	 SELECT field_id, value FROM couch_data_numeric WHERE page_id='423'
04:35:40.581653Z	 SELECT "------------ CLOCK :: page3-fetched --------"
04:35:40.582331Z	 SELECT "------------ CLOCK :: complete --------"
04:35:40.591529Z	 COMMIT
..
```

## Variables

* **clock**

    Set in global scope, this variable keeps all timers and memos.

## Related tags

* **show_json**

## Credits

Your feedback is always solicited. Drop me a mail and I'll try to get back.

Anton S.\
tony.smirnov@gmail.com
