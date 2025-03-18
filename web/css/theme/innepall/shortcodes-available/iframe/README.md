# iframe

IFrame shortcode outputs following –

```html
<iframe src="{src}" title="" width="{width}" height="{height}" scrolling="{scrolling}" frameborder="{frameborder}" marginheight="{marginheight}" allow="{allow}">
   <a href="{src}" target="_blank">{src}</a>
</iframe>
```

## Parameters

* src
* width
* height
* scrolling
* frameborder
* marginheight
* allow

If values for the **width** or **height** are not provided, frame is set to *300х150 px* by default.

## Usage

### admin-panel

```html
[iframe src="http://www.somesite.com/" width="100%" height="100" scrolling="yes" frameborder="1" marginheight="2" allow="picture-in-picture"]
```

### frontend

```xml
<cms:do_shortcodes><cms:show my_content /></cms:do_shortcodes>
```

– here *my_content* is your (richtext) editable field.

## Related pages

* [**Documentation » Shortcodes**](https://docs.couchcms.com/miscellaneous/shortcodes.html)
