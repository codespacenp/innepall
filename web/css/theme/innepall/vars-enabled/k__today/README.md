# A few date-related shortcuts:

| <!----> | <!----> |
| --------| ------- |
| **k__now** | Date+Time in **Y-m-d H:i:s** format |
| **k__today** | Today's date in **Y-m-d** format |
| **k__tomorrow** | Tomorrow's date in **Y-m-d** format |
| **k__yesterday** | Yesterday's date in **Y-m-d** format |
| **k__page_date** | Page's date in **Y-m-d** format (the usual *k_page_date* is in **Y-m-d H:i:s**) |
| **k__page_creation_date** | Page creation date in **Y-m-d** format |
| **k__page_modification_date** | Page modification date in **Y-m-d** format |

## Example

```xml
<cms:if k__page_modification_date eq k__today >This page was edited today</cms:if>
```
## Installation

Everything described in the dedicated [**INSTALL**](/INSTALL.md) page applies.

## Support

See dedicated [**SUPPORT**](/SUPPORT.md) page.
