# [Uid: Sequential ID](https://github.com/trendoman/Addons)

Normally for entities like orders, invoices etc. that are modeled using Couch cloned-pages, the system **page_id** (as in *k_page_id*) can serve as their unique IDs. However, there are certain use-cases where the page_id does not suffice e.g. as in follows -

1. The use-case demands that invoices IDs do not have a gap (i.e. are sequential).

    Since page_ids are distributed across all Couch templates, this cannot be guaranteed (e.g. we create a page from invoice template and then create another page from, say, blog template - the blog page will get the next page_id thus creating a gap between invoices).

2. There are already invoices in the system (e.g. imported) so we need to start generating new IDs from a particular value. Again, using the page_id does not offer this control.

This addon makes available a new type of editable region (type 'uid') that helps in the scenarios mentioned above. Example:

```xml
<cms:editable
    type='uid'
    name='my_uid'
    label='Invoice Number'
    desc='will be generated automatically'
    search_type='integer'
    begin_from='425'
    min_length='7'
    prefix='AT-'
    suffix='-[YYYY][MM][DD]'
/>
```
It offers the following features -

## Features

1. Allows creating sequential numbers.
2. Allows starting the numbering from any value (e.g. in a setup with existing invoices/orders, we can begin with any number greater than the current largest number).
3. Allows setting a minimum length for the numbers (where the number is automatically padded with zeroes to make up the length).
4. Allows setting a custom number prefix or suffix (these can include current day, month, year, hour, minute, second).
So instead of your invoice/order numbers looking like 43, 78, 137, and so on, they could now be AT-00043-US, AT-00137-US, or whatever format you wish.

## Installation

View **[INSTALL](/INSTALL.md)** file for info.

Place the folder named 'uid' within 'couch/addons' folder.

Edit to add the following line of code in `couch/addons/kfunctions.php` file (if the file is not present, rename the 'kfunctions.example.php' file found in the same folder to 'kfunctions.php') -

```php
require_once( K_COUCH_DIR.'addons/uid/uid.php' );
```

Note: repository [**Extended KFunctions**](https://github.com/trendoman/Extended-KFunctions) already has this line.

## Usage

Define a field of type 'uid' in your template, e.g., in its simplest form it could be as follows -

```xml
<cms:editable type='uid' name='my_uid' search_type='integer' />
```

Setting the 'search_type' as 'integer', as in the example above, is recommended. However, if you want to make pages searchable in the admin-panel by this field, you'll have to use 'text' as the 'search_type' instead –

```xml
<cms:editable type='uid' name='my_uid' search_type='text' />
```

Once defined (and having visited the modified template as super-admin), the code above will create a field that will automatically be assigned a sequential number (by default starting from '1') whenever a *new page is saved*.

Once a page is assigned a number, the number will remain immutable i.e cannot be edited or changed.

[
**IMP**: please note that since the number is assigned by the system when a new page is saved, any existing pages of the template will not automatically be assigned any ID. You have to open the edit screen of those pages and press 'Save' - this process will trigger the number assignment for existing pages that do not yet have an ID.
]

---

**Search:** the value to search will be the raw unformatted number (as opposed to the formatted, i.e.prefixed and suffixed, display value). This is because the display format can be changed any time but the internal value remains immutable.

The MySQL fulltext function powering Couch search does not take into consideration any word less than 4 characters long. As a workaround that limitation, if an UID being saved is less than 4 chars, the addon pads it with leading zeroes to make up the required length.

Which means that if you are searching for an invoice numbered '13', the value to search would be '0013'. You might like to add a note about this in the admin screen for your users.

---

The field supports the following parameters that can be set to use the other features mentioned before -

## Parameters

* **begin_from**

    By default the first ID assigned is '1'. This can be set to any other positive number by using this parameter.

    Please note that this setting will take effect only if there is no existing page that has an ID greater than the value being set. For example, if we have already assigned IDs up to 430, setting this parameter to 410 will have no effect - the next new page will be given a value of 431.

* **min_length**

    Use this parameter to set a minimum length for the IDs. If an ID has fewer digits than this value, it will be padded with zeroes to make up the specified length. For example, if '5' is set as the 'min_length', an ID with value 431 will be outputted as 00431.

* **prefix**

    Use this parameter to set any arbitrary characters as prefix of the IDs.

    We also use certain special values (mentioned below) in the prefix to automatically use values from the current date (i.e. date on which the page is created).

* **suffix**

    Use this parameter to set any arbitrary characters as suffix of the IDs.

    We also use certain special values (mentioned below) in the suffix to automatically use values from the current date (i.e. date on which the page is created).

**Special values for use within the 'prefix' and 'suffix' parameters** -

* **[D]** — Day of the month without leading zeros
* **[DD]** — Day of the month, 2 digits with leading zeros
* **[M]** — Numeric representation of a month, without leading zeros
* **[MM]** — Numeric representation of a month, with leading zeros
* **[YY]** — A two digit representation of a year
* **[YYYY]** — A full numeric representation of a year, 4 digits
* **[H]** — 24-hour format of an hour without leading zeros
* **[HH]** — 24-hour format of an hour with leading zeros
* **[N]** — Minutes with leading zeros
* **[S]** — Seconds, with leading zeros

Following is an example of a field using the full gamut of available parameters -

```xml
<cms:editable
    type='uid'
    name='my_uid'
    label='Invoice Number'
    desc='will be generated automatically'
    search_type='integer'
    begin_from='425'
    min_length='7'
    prefix='AT-'
    suffix='-[YYYY][MM][DD]'
/>
```

The ID generated for the field above could be -

```
AT-0000429-20180305
AT-0000428-20180304
```

## A final note

Internally this field stores the ID values as simple integers e.g. for the two example IDs shown above, internally the values being stored would be 429 and 428. That is to say that the padding of zeroes and the prefix and suffix are only for display purpose. If you wish, for example, to search for an invoice with a particular ID (e.g. using `<cms:pages>`), you'll have to use a value like '429' instead of say 'AT-0000429-2018'.

To help with this, the field makes available the value stored internally by setting a variable with '__unformatted' appended to the name of the field. For example, for our example field named 'my_uid' above, the first statement below will output 'AT-0000429-20180305' while the next will output '429'

```html
Formatted ID: <cms:show my_uid /><br><!-- AT-0000429-20180305 -->
Internal ID: <cms:show my_uid__unformatted /><br><!-- 429 -->
```

## Related pages

* [**https://www.couchcms.com/forum/viewtopic.php?f=8&t=11372**](https://www.couchcms.com/forum/viewtopic.php?f=8&t=11372) — source post and discussion
