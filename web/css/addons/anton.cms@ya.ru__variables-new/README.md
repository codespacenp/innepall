# [Additional Variables](https://github.com/trendoman/Tweakus-Dilectus/tree/main/anton.cms%40ya.ru__variables-new)

#### This is a collection of additional variables set for CouchCMS' context


## Contents

* ### [k__clonepage_link](k__clonepage_link/)

   A link to the cloning action of Addon 'copy-to-new'.

* ### [k__defined](k__defined/)

   Shows quite a few helpful constants defined in CouchCMS.

* ### [k__gpc](k__gpc/)

   Contains values from **GET**, **POST**, **COOKIE**.

* ### [k__ip](k__ip/)

   Contains ip-address of the visitor.

* ### [k__is_](k__is_/)

   Follows current visitor's access_level with values either *0* or *1* —

   * k__is_superadmin
   * k__is_admin
   * k__is_user
   * k__is_anon

* ### [k__million](k__million/)

   Variable contains a number *1.000.000*.

* ### [k__routes](k__routes/)

   Contains all defined routes via Custom Routes addon. See [**&raquo; Tutorial – Custom Routes**](https://github.com/trendoman/Midware/tree/main/tutorials/Custom-Routes).

* ### [k__server](k__server/)

   View `S_SERVER` superglobal. Contains a few helpful variables such as `HTTP_USER_AGENT`.

* ### [k__session](k__session/)

   View values from the `$_SESSION` superlobal array. Dumps flash messages too.

* ### [k__template_name_safe](k__template_name_safe/)

   Quickly get a safe name of a current template without string manipulation, e.g. *index-php*.

* ### [k__today](k__today/)

   A few datetime shortcuts: *k__now, k__today, k__tomorrow, k__page_date, k__page_modification_date, k__page_creation_date*.

---

Variables that start with `k__` ('k' plus double underscore) are deliberatly named to distinguish custom variables from system `k_` variables. Names that start with `k_` can not be overridden accidentally with tags 'cms:set', 'cms:put'.

## Installation

Everything described in the dedicated [**INSTALL**](/INSTALL.md) page applies.

## Support

Check out my dedicated [**SUPPORT**](/SUPPORT.md) page.
