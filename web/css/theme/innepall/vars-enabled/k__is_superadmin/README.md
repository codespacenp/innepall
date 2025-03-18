# k__is_*

Adds new variables to the global context about the current user.

* k__is_superadmin
* k__is_admin
* k__is_user
* k__is_anon

Values of these variables can be either *1* or *0*. It depends on who's logged in or, in case of **k__is_anon**, not logged in.

## Example

Helps make a quick check &mdash;

```xml
<cms:if k__is_superadmin>Welcome!</cms:if>
```

or

```xml
<cms:if k__is_anon>Please log in.</cms:if>
```

## Credits

Anton S.\
tony.smirnov@gmail.com
