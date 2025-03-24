# [Watermark](https://github.com/trendoman/Addons)

This is a little addon that can be used to watermark uploaded images.

## Installation

View **[INSTALL](/INSTALL.md)** file for info.

Place the 'filter' folder into 'couch/addons'. Activate this addon the usual way i.e. make an entry in `couch/addons/kfunctions.php` like this -

```php
require_once( K_COUCH_DIR.'addons/watermark/watermark.php' );
```

Note: repository [**Extended KFunctions**](https://github.com/trendoman/Extended-KFunctions) already has this line.

## Usage

The installed addon exposes a single tag named 'cms:watermark'.

Given the full path of an image, as in the following snippet

```xml
<cms:watermark src='http://www.mysite.com/couch/uploads/image/test.jpg' />
```

— this tag will create a watermarked version of the specified image (by creating a copy of the image in the same folder and superimposing the watermark over it) and output this watermarked image's path.

The proper way to use this tag's output in a template would be in tandem with the HTML 'img' tag - something like this

```html
<img src="<cms:watermark src='http://www.mysite.com/couch/uploads/image/test.jpg' />" />
```

Instead of hardcoding the source image's path, as we did above, we are more likely to provide the output of an editable region of type image as this tag's source.

If, for example, the name of an image type region is 'my_image', this is how we would output the image on the front-end

```html
<img src="<cms:show my_image />" />
```

and this is how we create and output the above image's watermarked version

```html
<img src="<cms:watermark my_image />" />
```

A watermark over thumbnail

```xml
<cms:watermark "<cms:thumbnail my_image width='880' />" />
```

## Parameters:

* image
* with
* at
* suffix
* check_exists

### image

URL of the image to watermark. This image has to be within Couch's designated 'uploads' folder.

```xml
<cms:watermark image=my_image />
```

or

```xml
<cms:watermark my_image />
```

### with

The name of the PNG file used as the watermark. The specified file should reside within the 'couch/addons/watermark' folder. If not specified, the default 'watermark.png' is assumed.

```xml
<cms:watermark my_image with='my_watermark.png' />
```

### at

Position where the watermarkis applied on the image. Acceptable values are

* top_left
* top_center
* top_right
* middle_left
* middle
* middle_right
* bottom_left
* bottom_center
* bottom_right

If none specified, the default ***bottom_right*** is assumed.

```xml
<cms:watermark my_image with='my_watermark.png' at='bottom_left' />
```

### check_exists

By default this parameter has a value of ***1*** which makes the tag first check if the watermarked version exists before creating it afresh. If one exists (because of a previous execution of this tag), no further processing takes place and the existing version is returned.

You can set this parameter to ***0*** during testing phase (e.g. testing the placement of the watermark) so that a new watermarked image gets created with every run.

```xml
<cms:watermark my_image with='my_watermark.png' at='bottom_left' check_exists='0' />
```

IMP: Do set the parameter back to ***1*** (or remove it altogether) once the site goes live as it incurs unnecessary processing.

## Settings

Set appropriate memory limit available on your server editing the line №74 of the 'watermark.php':

```php
ini_set('memory_limit', "128M");
```

## Related pages

* **[https://www.couchcms.com/forum/viewtopic.php?f=8&t=8012](https://www.couchcms.com/forum/viewtopic.php?f=8&t=8012)** — source post and discussion
* **[https://github.com/CouchCMS/Watermark](https://github.com/CouchCMS/Watermark)** — github source
