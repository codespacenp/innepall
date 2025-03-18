# k__template_name_dashes_nophp

We take the value of stock variable **k_template_name** and replace all non-word symbols with dashes, e.g. ***shop/index.php*** → *shop-index-php*, then cut off the last piece *-php* → ***shop-index***

## Example

Usable in file/folder autonaming —

```xml
/mysnippets/<cms:show k__template_name_dashes />/<cms:show k__template_name_dashes_nophp />.fields
```

> Result:\
> /mysnippets/shop-index-php/shop-index.fields

## Credits

Anton S.\
tony.smirnov@gmail.com
