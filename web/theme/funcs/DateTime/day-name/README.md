# day-name

Show locale-aware current day name e.g. "Monday".

```xml
<cms:call 'day-name' />
```

## Parameters

* **day**
* **locale**
* **charset**

## Usage

No day specified, show current day –

```xml
<cms:call 'day-name' />
```

Specific day number —

```xml
<cms:call 'day-name' day='2' />
```

– prints "Tuesday"


Italian and Russian days —

```xml
<cms:call 'day-name' locale='italian' charset='Windows-1252' /> = <cms:call 'day-name' locale='russian' charset='Windows-1251' />
```

– prints "domenica = воскресенье"

## Related tags

* [**Midware Tags Reference &raquo; date**](https://github.com/trendoman/Midware/tree/main/tags-reference/date.md)

## Installation

```xml
<cms:embed 'funcs/DateTime/day-name/day-name.func' />
```

## Support

Check out my dedicated [**SUPPORT**](/SUPPORT.md) page.
