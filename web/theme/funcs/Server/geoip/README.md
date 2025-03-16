# geoip

Detect user ip and query location via http://www.geoplugin.net API.

```xml
<cms:call 'geoip' />
```

Func caches queried data to files in a configurable directory, which is by default ***/geoip/*** inside the snippets dir. If this folder does not exist, create it.

## Parameters

* **ip**

   Provide a static ip address if you want to query its info. If this parameter is omitted, current visitor's ip address will be used.

* **cached_only**

   Do not request the server, but only try to read data from previously cached response.

## Usage

Try with some static ip first, for instance –

```xml
<cms:call 'geoip' '172.58.204.210'/>
```

\- the output will be a json object -

```json
{
  "request":"172.58.204.210",
  "status":200,
  "delay":"2ms",
  "credit":"Some of the returned data includes GeoLite data created by MaxMind, available from <a href='http:\/\/www.maxmind.com'>http:\/\/www.maxmind.com<\/a>.",
  "city":"Philadelphia",
  "region":"Pennsylvania",
  "regionCode":"PA",
  "regionName":"Pennsylvania",
  "areaCode":"",
  "dmaCode":"504",
  "countryCode":"US",
  "countryName":"United States",
  "inEU":0,
  "euVATrate":false,
  "continentCode":"NA",
  "continentName":"North America",
  "latitude":"40.0356",
  "longitude":"-75.1763",
  "locationAccuracyRadius":"20",
  "timezone":"America\/New_York",
  "currencyCode":"USD",
  "currencySymbol":"$",
  "currencySymbol_UTF8":"$",
  "currencyConverter":1.0003
}
```

If you created a folder 'geoip' e.g. `mysnippets/geoip/`, then there will appear 2 files in it:

- `geoip/8d685d439c20cab8c51be8debb26f4d2.json`

   this file is the cached request (name is md5-hash of ip address); subsequent requests of the same IP will not bother outside API service, but will be read from disk

- `geoip/geoip_cache_purge.dat`

   this file helps to countdown the purge time, which is ***30 days*** by default.

It is very recommended to have the cache, to stay within free quota of 3rd party API service. But if you don't want to cache files, simply do not create the folder.

## Config

In the body of the func (file `geoip.func`) there are tweakable settings:

* GEOIP_USE_CACHE
* GEOIP_CACHE_PATH
* GEOIP_CACHE_PURGE_INTERVAL

## Example

Put the generated response to json and manipulate it as needed (show, save to db etc) –

```xml
<cms:set visitor = "<cms:call 'geoip' />" is_json='1' />

<h2>Your location:</h2>

<cms:if visitor.request = '127.0.0.1'>

   <p>Mommy's room.</p>

<cms:else_if visitor.status = '200' />

   <p><cms:show visitor.city /><!-- e.g. Philadelphia --></p>

</cms:if>
```

## Installation

**Use [Autoloading](https://github.com/trendoman/Cms-Fu/tree/master/ADDON-FUNCS-ON-DEMAND.md),**

or, alternatively, manually copy the func code to the page before the calling or embed func as a snippet —

```xml
<cms:embed 'funcs/Server/geoip/geoip.func' />
```

## Support

[![Mail](https://img.shields.io/badge/gmail-%23539CFF.svg?&style=for-the-badge&logo=gmail&logoColor=white)](mailto:"Anton"<tony.smirnov@gmail.com>?subject=[GitHub])

Check out my dedicated [**SUPPORT**](/SUPPORT.md) page.
