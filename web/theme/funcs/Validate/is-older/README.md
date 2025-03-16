# is-newer

Compares 2 dates.

```xml
<cms:call 'is-older' date=date1 than=date2 />
```

Returns ***0*** or ***1*** if the date is older than the other date

## Parameters

* **date**
* **than**
* **date1** — a substitute (synonym) parameter for *date*
* **date2** — a substitute (synonym) parameter for *than*

## Usage

Get result of comparison —

```xml
<cms:if "<cms:call 'is-older' k_page_date than="<cms:date '-1 week' />" />">
<p>Page was published more than week ago</p>
</cms:if>
```

TIP: use predefined variables: **k__today, k__yesterday, k__tomorrow, k__now** from repository **[Tweakus » variables](https://github.com/trendoman/Tweakus-Dilectus/tree/main/anton.cms%40ya.ru__variables-new/k__today)**.

## Installation

Use [**Autoloading**](ADDON-FUNCS-ON-DEMAND.md) or copy the func code to the page before the call or embed the snippet —

```xml
<cms:embed 'funcs/Validate/is-older/is-older.func' />
```

## Related funcs

* [**is-newer**](https://github.com/trendoman/Cms-Fu/tree/master/Validate/is-newer/)
* [**show-file-date**](https://github.com/trendoman/Cms-Fu/tree/master/Generators/show-file-date/)

## Support

Check out my dedicated [**SUPPORT**](/SUPPORT.md) page.
