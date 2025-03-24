# [FileSize](https://github.com/trendoman/Addons)

Addon allows to save the filesize of a file taken from some editable field into another editable field upon admin-panel page saving. Thus it does not show size immediately, on file upload and before save, but calculates size of associated field upon save and puts the value into the own field, which makes it a limited use (but reliable) addon.

```xml
<cms:editable
    name='my_filesize'
    type='text'
    validator='FileSize::get'
    assoc_field='file_download'
>0</cms:editable>
```

Also addon presents a formatting tag – "cms:size_readable", that is a clone of the stock tag "size_format".

```xml
<cms:size_readable bytes='10000' /> = <cms:size_format bytes='10000' />
```

## Usage

Assuming that the 'file' type region in your template is named ***myimage***, add a new editable region of type 'text'. Attach the validator on that text-type editable field and provide the **assoc_field** parameter with the file-bearing field name:

```
validator='FileSize::get'
assoc_field='myimage'
```

Please note that the 'validator' parameter of this new region is set to ***FileSize::get*** and the **assoc_field** is set to the name of your original 'file' type editable region.

Visit the template as super-admin for the changes to take effect. Now if you select a new file in the original region and save, the text region should automatically show the file's size.

To make things easier on the display side, use the custom tag named 'size_readable'.

```xml
Size: <cms:size_readable my_filesize />
```

– where ***my_filesize*** is, of course, the name of the text editable region we added.

## Installation

View **[INSTALL](/INSTALL.md)** file for info.

## Related pages

* **[CmsFu » show-size](https://github.com/trendoman/Cms-Fu/tree/master/Generators/show-size)** – a smart function that takes a filepath and displays a human-readable size of that file.
