# k__ip

Adds a new variable `k__ip` to the global context. It contains detected ip address of the visitor. Code supports detecting ip behind CloudFlare network.

## Example

```xml
<cms:show k__ip />
```

## Usage

May be used in various scenarios, like storing ip address in backend or filter requests from certain ip-ranges.

```xml
<cms:if "<cms:call 'is-ip-within' ip=k__ip range='6.0.0.0-11.0.0.0' />" >
  <cms:abort '8{}' />
</cms:if>
```

## Related funcs

* **[Cms-Fu Validate Funcs » is-ip-within](https://github.com/trendoman/Cms-Fu/tree/master/Validate/is-ip-within)**

## Installation

Everything described in the dedicated [**INSTALL**](/INSTALL.md) page applies.

## Support

See dedicated [**SUPPORT**](/SUPPORT.md) page.
