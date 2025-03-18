# `<cms:write>` (with mods)

Writes data into files.

```xml
<cms:write file='greeting.html'>Hi Anton!</cms:write>
```

## Parameters

* **file** (optional) — absolute or relative link or path within site's root;

    keywords - **@snippets**, **@uploads** - those expand to registered paths in CouchCMS

* **truncate** — ***1*** or ***0*** (default), will begin afresh
* **add_newline** — ***1*** or ***0*** (default), applies newline to content

## Example

```xml
<cms:write file='example.html'
  truncate='1'
  add_newline='0'
  ><h1>Title</h1>Example text
</cms:write>
```

```xml
<cms:write file='@snippets/test.inc' />
```

– creates an empty file ***test.inc*** inside CMS's snippets directory.

## Usage

All content enclosed within this tag will be written into the file specified as its first parameter. File is always written **relative to the site's root**.

```xml
<cms:write 'my.txt' >Hello world!</cms:write>
```

The code above will write "Hello world!" into a file named 'my.txt' present in the **site's root** (i.e. the parent folder of 'couch'). If the file is not present, the tag will create it.

The created file should now contain the following -

```
Hello world!
```

If you skip the parameter **file**, tag will use ***my_log.txt*** as filename.

```xml
<cms:write><cms:date /></cms:write>
```

Two special keywords can be used to help with paths to `uploads` or `snippets` directories, namely **@snippets** and **@uploads**. Prepend a keyword before the file and path will be automatically fixed —

```xml
<cms:write "@uploads/file/download.zip">..</cms:write>
```

If you had defined `K_UPLOAD_DIR` in CMS config then tag writes a file to it e.g. `mysite/myuploads/file/download.zip` otherwise it's a default dir e.g. `mysite/couch/uploads/file/download.zip` (*couch* will be different if you have it renamed). Same behavior applies to snippets folder.

If newlines are required you can either -

a. Add the newline as part of the data –

```xml
<cms:write 'my.txt' >
Hello world!
</cms:write>
```

or b. set **add_newline** parameter to *1* –

```xml
<cms:write 'my.txt' add_newline='1'>Hello world!</cms:write>
```

If the specified file already exists, this tag by default appends data to that file's existing contents. If you wish the tag to discard any existing file and create a new file, set its **truncate** parameter to *1* –

```xml
<cms:repeat '3'>
   <cms:write 'my.txt' add_newline='1' truncate='1'><cms:zebra 'a' 'b' 'c' /></cms:write>
</cms:repeat>
```

## Credits

Thanks to @KK for original code
Thanks to @trendoman for mods (relative/absolute paths, keywords)

## Help

Anton S.\
tony.smirnov@gmail.com
