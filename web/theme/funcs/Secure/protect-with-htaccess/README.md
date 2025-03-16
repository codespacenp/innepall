# protect-file, protect-folder

Secure website file or folder with a password in htaccess.

```xml
<cms:call 'protect-folder' 'root' 'r000t' folder='secure'/>
```

```xml
<cms:call 'protect-file' 'root' 'r000t' file='secure/securelog.txt'/>
```

Both functions depend on provided extra function **htpasswd** that must be also registered *beforehand*. It generates passwords in required format.

## Parameters

* user
* password
* file / folder

## Usage

```xml
<cms:call 'protect-file' user='admin' password="<cms:date format='ymd' />" file='secure/protected.php'/>
```

The sample call above *overwrites* 2 files in directory `secure` relative to website's root:

* .htpasswd
* .htaccess

---

If the file is in website's root, then `.htaccess` that you use for website will be **\*OVERWRITTEN**\*. Make a backup of original .htaccess, then copy resulting text from the new .htaccess to the original, then remove the call in the code and then put the original in place. For the files and folders below the root functions create files only in those folders, thus it is recommended to create some `secure` folder.

If you protect your admin-panel i.e. `couch` folder, then website will work fine, because htpasswd protection does not involve PHP ops.

---

```xml
<cms:call 'protect-folder' user='admin' password="<cms:date format='ymd' />" folder='couch'/>
```

Above snippet will set a new password every day (if called every day, of course).

```xml
<cms:if "<cms:call 'is-file' file='couch/.htaccess' />">
   <cms:if "<cms:call 'is-older' file='couch/.htaccess' date="<cms:date format='ymd' />">
      <cms:call 'protect-folder' user='admin' password="<cms:date format='ymd' />" folder='couch'/>
   </cms:if>
<cms:else />
   <cms:call 'protect-folder' user='admin' password="<cms:date format='ymd' />" folder='couch'/>
</cms:if>
```

Above snippet will check if the file is already there and will overwrite it only once per day; otherwise will create it. With a small modification it is possible to create *random passwords every day* and put a comment with the password in the .htacces file to actually be able to know what the today's random password is. The func 'is-older' (checks modification date) has not been created yet, but will do so if you ask.

Happy fencing ☺

## Installation

**Use [Autoloading](https://github.com/trendoman/Cms-Fu/tree/master/ADDON-FUNCS-ON-DEMAND.md),**

or, alternatively, manually copy the func code to the page before the calling or embed func as a snippet —

```xml
<cms:embed 'funcs/Secure/protect-with-htaccess/htpasswd.func' />
<cms:embed 'funcs/Secure/protect-with-htaccess/protect-file.func' />
<cms:embed 'funcs/Secure/protect-with-htaccess/protect-folder.func' />
```

## Support

[![Mail](https://img.shields.io/badge/gmail-%23539CFF.svg?&style=for-the-badge&logo=gmail&logoColor=white)](mailto:"Anton"<tony.smirnov@gmail.com>?subject=[GitHub])

Check out my dedicated [**SUPPORT**](/SUPPORT.md) page.
