# day-names

Show locale-aware sequential list of day names - 'Monday|..|Sunday'.

```xml
<cms:call 'day-names' />
```

## Parameters

* **first**
* **sep**
* **as_json**
* **locale**
* **charset**

## Usage

Start any day with parameter **first** (default is ***1***):

```xml
<cms:call 'day-names' first='3'/>
```

Specify separator with parameter **sep** (default is ***|***):

```xml
<cms:call 'day-names' first='3' sep=', ' />
```

– prints –

```text
Wednesday, Thursday, Friday, Saturday, Sunday, Monday, Tuesday
```

Custom locale and charset —

```xml
<cms:call 'day-names' first='5' locale='russian' charset='Windows-1251' />
```

– prints –

```text
пятница|суббота|воскресенье|понедельник|вторник|среда|четверг
```

JSON-formatted string —

```xml
<cms:call 'day-names' as_json='1' />
```

– prints –

```js
["Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday"]
```

## Related tags

* **[DateTime » day-name](https://github.com/trendoman/Cms-Fu/tree/master/DateTime/day-name)**
* **[Midware Tags Reference » date](https://github.com/trendoman/Midware/tree/main/tags-reference/date.md)**

## Installation

```xml
<cms:embed 'funcs/DateTime/day-names/day-names.func' />
```

## Support

Check out my dedicated [**SUPPORT**](/SUPPORT.md) page.
