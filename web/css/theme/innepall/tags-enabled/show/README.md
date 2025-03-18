# Mod `<cms:show>`

This modification adds new parameters to [**cms:show**](#related-tags) tag &mdash;
- **case** &mdash; with values: *`upper` OR `u`, `lower` OR `l` , `title` OR `t`*.
- **encoding** — with possible values: *UTF-8* (by default), *Windows-1251*...

Parameters are optional. Tag **show** will naturally work as expected, handling JSON and variables, so if the parameters are not provided nothing changes.

## Example

Trying different cases –

```xml
<cms:set example = 'CouchCMS is great' />
<cms:show example case = 'upper' /> == "COUCHCMS IS GREAT"
<cms:show example case = 'lower' /> == "couchcms is great"
<cms:show 'Hello world' case='upper' /> == "HELLO WORLD"
<cms:show 'Hello WORLD' case='lower' /> == "hello world"
```

Trying encoding over cyrillic string –

```xml
<cms:show 'ПРИВЕТ, АНТОН' case='title' encoding='UTF-8' /> == "Привет, Антон"
```

## Related tags

* **show**

## Credits

Thanks to @dmore54

## Help

Anton S.\
tony.smirnov@gmail.com
