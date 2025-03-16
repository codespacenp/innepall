# please-login

Redirect logged out users to login page with return path to current page.

```xml
<cms:call 'please-login' />
```

If Extended Users addon is enabled, the login page is the value of **k_user_login_template** variable, otherwise is default Couch `login.php` page.

Any code after the call above is guaranteed to execute for logged in user.

## Parameters

Function does not take any parameter.

## Related pages

* **[Midware Core Concepts » Extended Users](https://github.com/trendoman/Midware/tree/main/concepts/Extended-Users)**

## Installation

**Use [Autoloading](https://github.com/trendoman/Cms-Fu/tree/master/ADDON-FUNCS-ON-DEMAND.md),**

or, alternatively, manually copy the func code to the page before the calling or embed func as a snippet —

```xml
<cms:embed 'funcs/Secure/please-login/please-login.func' />
```

Also, the code of the func is pretty small, so may just copy code itself.

## Support

[![Mail](https://img.shields.io/badge/gmail-%23539CFF.svg?&style=for-the-badge&logo=gmail&logoColor=white)](mailto:"Anton"<tony.smirnov@gmail.com>?subject=[GitHub])

Check out my dedicated [**SUPPORT**](/SUPPORT.md) page.
