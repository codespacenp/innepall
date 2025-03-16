# is-ip-within

Function validates whether ip-address is within a given range and returns ***1*** or ***0***.

```xml
<cms:call 'is-ip-within' ip='227.0.1.2' range='227.0.0.1-229.0.0.1' />
```

Range boundaries are counted, i.e. >= && <=.

## Parameters

* ip
* range

## Usage

May use the **k__ip** variable:

```xml
<cms:if "<cms:call 'is-ip-within' ip=k__ip range='6.0.0.0-11.0.0.0' />" >
  <cms:abort '8{}' />
</cms:if>
```

## Related pages

* **[Tweakus-Dilectus Variables » k__ip](https://github.com/trendoman/Tweakus-Dilectus/tree/main/anton.cms%40ya.ru__variables-new/k__ip)**

## Installation

**Use [Autoloading](https://github.com/trendoman/Cms-Fu/tree/master/ADDON-FUNCS-ON-DEMAND.md),**

or, alternatively, manually copy the func code to the page before the calling or embed func as a snippet —

```xml
<cms:embed 'funcs/Validate/is-ip-within/is-ip-within.func' />
```

## Support

[![Mail](https://img.shields.io/badge/gmail-%23539CFF.svg?&style=for-the-badge&logo=gmail&logoColor=white)](mailto:"Anton"<tony.smirnov@gmail.com>?subject=[GitHub])

Check out my dedicated [**SUPPORT**](/SUPPORT.md) page.
