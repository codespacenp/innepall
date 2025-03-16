# log-event

Function dumps parameter values of a dispatched CouchCMS Event to a file.

```xml
<cms:call 'log-event' 'alter_page_tag_params' />
```

\- snippet will create the file `http://localhost/EVENT alter_page_tag_params.log` with exported values.

## Parameters

- unnamed: event name

## Event reference

<details><summary><h3>EVENTS by NAME (AZ ↓)</h3></summary>

| name                                                                   | file                                             |
|:-----------------------------------------------------------------------|:-------------------------------------------------|
| (ajaxaction)                                                           | couch/ajax.php                                   |
| (db\_persist\|db\_persist\_form)\_alter\_fields\_(token)                     | couch/addons/data-bound-form/data-bound-form.php |
| (db\_persist\|db\_persist\_form)\_postsave\_(token)                         | couch/addons/data-bound-form/data-bound-form.php |
| (db\_persist\|db\_persist\_form)\_presave\_(token)                          | couch/addons/data-bound-form/data-bound-form.php |
| (db\_persist\|db\_persist\_form)\_savefailed\_(token)                       | couch/addons/data-bound-form/data-bound-form.php |
| (db\_persist\|db\_persist\_form)\_savesuccess\_(token)                      | couch/addons/data-bound-form/data-bound-form.php |
| action\_pages\_form                                                      | couch/base.php                                   |
| action\_pages\_list                                                      | couch/base.php                                   |
| add\_pages\_form\_actions                                                 | couch/base.php                                   |
| add\_pages\_form\_fields                                                  | couch/edit-pages.php                             |
| add\_pages\_form\_fields                                                  | couch/base.php                                   |
| add\_pages\_list\_actions                                                 | couch/base.php                                   |
| add\_pages\_list\_fields                                                  | couch/edit-pages.php                             |
| add\_pages\_list\_fields                                                  | couch/base.php                                   |
| add\_render\_vars                                                        | couch/parser/parser.php                          |
| add\_render\_vars                                                        | couch/index.php                                  |
| add\_render\_vars                                                        | couch/functions.php                              |
| add\_template\_params                                                    | couch/tags.php                                   |
| add\_uk\_icons                                                           | couch/addons/uk-icons/uk-icons.php               |
| admin\_init                                                             | couch/index.php                                  |
| admin\_post\_action                                                      | couch/functions.php                              |
| admin\_pre\_action                                                       | couch/functions.php                              |
| admin\_route\_found                                                      | couch/functions.php                              |
| alter\_admin\_routes                                                     | couch/index.php                                  |
| alter\_comment\_fields\_info                                              | couch/comment.php                                |
| alter\_comment\_update                                                   | couch/comment.php                                |
| alter\_create\_insert                                                    | couch/page.php                                   |
| alter\_custom\_fields\_data                                               | couch/page.php                                   |
| alter\_custom\_fields\_info                                               | couch/page.php                                   |
| alter\_custom\_fields\_info\_db                                            | couch/page.php                                   |
| alter\_datafield\_delete\_for\_allpages                                    | couch/ajax.php                                   |
| alter\_datafield\_insert\_for\_existingpage                                | couch/tags.php                                   |
| alter\_datafield\_insert\_for\_newpage                                     | couch/page.php                                   |
| alter\_draft\_insert                                                     | couch/page.php                                   |
| alter\_editable                                                         | couch/tags.php                                   |
| alter\_editable\_modifications                                           | couch/tags.php                                   |
| alter\_editable\_start                                                   | couch/tags.php                                   |
| alter\_field\_insert                                                     | couch/tags.php                                   |
| alter\_field\_update                                                     | couch/tags.php                                   |
| alter\_fields\_data                                                      | couch/page.php                                   |
| alter\_fields\_info                                                      | couch/page.php                                   |
| alter\_final\_admin\_page\_output                                          | couch/index.php                                  |
| alter\_final\_page\_output                                                | couch/cms.php                                    |
| alter\_folder\_fields\_info                                               | couch/folder.php                                 |
| alter\_folder\_save                                                      | couch/folder.php                                 |
| alter\_folder\_set\_context                                               | couch/folder.php                                 |
| alter\_folders\_info                                                     | couch/page.php                                   |
| alter\_folders\_tag\_params                                               | couch/tags.php                                   |
| alter\_gen\_dump\_tables                                                  | couch/gen\_dump.php                               |
| alter\_mosaic\_form\_fields                                               | couch/addons/mosaic/edit-mosaic.php              |
| alter\_page\_fulltext\_insert                                             | couch/page.php                                   |
| alter\_page\_info                                                        | couch/page.php                                   |
| alter\_page\_save                                                        | couch/page.php                                   |
| alter\_page\_save\_full\_text                                              | couch/page.php                                   |
| alter\_page\_set\_context                                                 | couch/page.php                                   |
| alter\_page\_tag\_context                                                 | couch/tags.php                                   |
| alter\_page\_tag\_fields                                                  | couch/tags.php                                   |
| alter\_page\_tag\_params                                                  | couch/tags.php                                   |
| alter\_page\_tag\_query                                                   | couch/tags.php                                   |
| alter\_page\_tag\_query\_ex                                                | couch/tags.php                                   |
| alter\_page\_unclone                                                     | couch/page.php                                   |
| alter\_pages\_form\_(toolbar\|filter\|page\|extended)\_actions             | couch/base.php                                   |
| alter\_pages\_form\_actions                                               | couch/base.php                                   |
| alter\_pages\_form\_default\_fields                                        | couch/edit-pages.php                             |
| alter\_pages\_form\_default\_fields                                        | couch/base.php                                   |
| alter\_pages\_form\_default\_fields\_final                                  | couch/edit-pages.php                             |
| alter\_pages\_form\_fields                                                | couch/edit-pages.php                             |
| alter\_pages\_form\_fields                                                | couch/base.php                                   |
| alter\_pages\_list\_(toolbar\|filter\|batch\|page\|extended\|row)\_actions | couch/base.php                                   |
| alter\_pages\_list\_actions                                               | couch/base.php                                   |
| alter\_pages\_list\_default\_fields                                        | couch/edit-pages.php                             |
| alter\_pages\_list\_default\_fields\_final                                  | couch/edit-pages.php                             |
| alter\_pages\_list\_fields                                                | couch/edit-pages.php                             |
| alter\_pages\_list\_fields                                                | couch/base.php                                   |
| alter\_pages\_list\_selected\_fields                                       | couch/edit-pages.php                             |
| alter\_parsed\_dom                                                       | couch/parser/parser.php                          |
| alter\_phpmailer                                                        | couch/addons/phpmailer/phpmailer.php             |
| alter\_recreate\_parent\_insert                                           | couch/page.php                                   |
| alter\_register\_pages\_routes                                            | couch/theme/\_system/register.php                 |
| alter\_relational\_types                                                 | couch/tags.php                                   |
| alter\_render\_output\_(name)                                             | couch/functions.php                              |
| alter\_render\_vars                                                      | couch/functions.php                              |
| alter\_render\_vars\_(name)                                               | couch/functions.php                              |
| alter\_renderables                                                      | couch/functions.php                              |
| alter\_restore\_dump\_tables                                              | couch/restore\_dump.php                           |
| alter\_rewrite\_rules                                                    | couch/functions.php                              |
| alter\_rewrite\_rules\_final                                              | couch/functions.php                              |
| alter\_save\_custom\_field                                                | couch/page.php                                   |
| alter\_save\_system\_field                                                | couch/page.php                                   |
| alter\_smart\_embed\_valid\_files                                          | couch/tags.php                                   |
| alter\_str\_to\_parse                                                     | couch/parser/parser.php                          |
| alter\_system\_fields\_info                                               | couch/page.php                                   |
| alter\_tag\_(tagname)\_execute                                            | couch/parser/parser.php                          |
| alter\_template                                                         | couch/tags.php                                   |
| alter\_template\_delete                                                  | couch/ajax.php                                   |
| alter\_template\_info                                                    | couch/page.php                                   |
| alter\_template\_modified                                                | couch/tags.php                                   |
| alter\_template\_name                                                    | couch/page.php                                   |
| alter\_template\_tag\_params                                              | couch/tags.php                                   |
| alter\_tile\_clone\_insert                                                | couch/addons/page-builder/edit-page-builder.php  |
| alter\_user\_fields\_info                                                 | couch/auth/user.php                              |
| alter\_user\_save                                                        | couch/auth/user.php                              |
| alter\_valid\_orderby                                                    | couch/tags.php                                   |
| cart\_alter\_custom\_fields                                               | couch/addons/cart/cart.php                       |
| check\_admin\_(menu\|action)\_is\_current                                  | couch/folder.php                                 |
| ckeditor\_alter\_config                                                  | couch/field.php                                  |
| comment\_approved                                                       | couch/comment.php                                |
| comment\_approved                                                       | couch/comment.php                                |
| comment\_deleted                                                        | couch/comment.php                                |
| comment\_loaded                                                         | couch/comment.php                                |
| comment\_presave                                                        | couch/comment.php                                |
| comment\_prevalidate                                                    | couch/comment.php                                |
| comment\_updated                                                        | couch/comment.php                                |
| comment\_validate                                                       | couch/comment.php                                |
| copy\_to\_new\_complete                                                   | couch/addons/copy-to-new/edit-copy-to-new.php    |
| each\_alter\_ctx\_(token)                                                 | couch/tags.php                                   |
| field\_deleted                                                          | couch/ajax.php                                   |
| field\_inserted                                                         | couch/tags.php                                   |
| field\_updated                                                          | couch/tags.php                                   |
| folder\_deleted                                                         | couch/folder.php                                 |
| folder\_deleted                                                         | couch/folder.php                                 |
| folder\_loaded                                                          | couch/folder.php                                 |
| folder\_predelete                                                       | couch/folder.php                                 |
| folder\_predelete                                                       | couch/folder.php                                 |
| folder\_presave                                                         | couch/folder.php                                 |
| folder\_prevalidate                                                     | couch/folder.php                                 |
| folder\_saved                                                           | couch/folder.php                                 |
| folder\_validate                                                        | couch/folder.php                                 |
| form\_alter\_posted\_data\_(token)                                         | couch/tags.php                                   |
| form\_posted\_(token)                                                    | couch/tags.php                                   |
| form\_postvalidate\_(token)                                              | couch/tags.php                                   |
| form\_prevalidate\_(token)                                               | couch/tags.php                                   |
| funcs\_get\_link                                                         | couch/functions.php                              |
| gen\_dump\_table\_where                                                   | couch/gen\_dump.php                               |
| gen\_dump\_table\_where                                                   | couch/gen\_dump.php                               |
| init                                                                   | couch/header.php                                 |
| install\_complete                                                       | couch/install.php                                |
| invalidate\_cache                                                       | couch/functions.php                              |
| kcfinder\_alter\_access                                                  | couch/includes/kcfinder/integration/couch.php    |
| lock\_template                                                          | couch/page.php                                   |
| override\_renderables                                                   | couch/functions.php                              |
| page\_deleted                                                           | couch/page.php                                   |
| page\_inserted                                                          | couch/page.php                                   |
| page\_load\_complete                                                     | couch/page.php                                   |
| page\_loaded                                                            | couch/page.php                                   |
| page\_predelete                                                         | couch/page.php                                   |
| page\_preload                                                           | couch/page.php                                   |
| page\_presave                                                           | couch/page.php                                   |
| page\_prevalidate                                                       | couch/page.php                                   |
| page\_save\_start                                                        | couch/page.php                                   |
| page\_saved                                                             | couch/page.php                                   |
| page\_uncloned                                                          | couch/page.php                                   |
| page\_validate                                                          | couch/page.php                                   |
| pages\_form\_custom\_action                                               | couch/base.php                                   |
| pages\_form\_post\_action                                                 | couch/base.php                                   |
| pages\_list\_bulk\_action                                                 | couch/base.php                                   |
| pages\_list\_post\_action                                                 | couch/base.php                                   |
| pages\_rt\_filter\_clonable\_only                                          | couch/edit-pages.php                             |
| pages\_rt\_filter\_resolve\_page                                           | couch/edit-pages.php                             |
| pages\_rt\_filter\_set\_related\_fields                                     | couch/edit-pages.php                             |
| pb\_invalidate\_cache                                                    | couch/addons/page-builder/page-builder.php       |
| post\_alter\_page\_tag\_context                                            | couch/tags.php                                   |
| pre\_alter\_page\_tag\_context                                             | couch/tags.php                                   |
| pre\_process\_page                                                       | couch/cms.php                                    |
| register\_admin\_routes                                                  | couch/index.php                                  |
| register\_gc\_jobs                                                       | couch/addons/mosaic/gc/gc.php                    |
| register\_renderables                                                   | couch/functions.php                              |
| restore\_dump\_complete                                                  | couch/restore\_dump.php                           |
| restore\_dump\_normalize\_query                                           | couch/restore\_dump.php                           |
| rr\_alter\_ctx\_(token)                                                   | couch/addons/repeatable/repeatable.php           |
| save\_custom\_field                                                      | couch/page.php                                   |
| save\_custom\_field                                                      | couch/page.php                                   |
| save\_system\_field                                                      | couch/page.php                                   |
| set\_orderby\_clause                                                     | couch/tags.php                                   |
| skip\_qs\_params\_in\_paginator                                            | couch/addons/csv/csv.php                         |
| sql\_dump\_use\_extended\_inserts                                          | couch/gen\_dump.php                               |
| tag\_(tagname)\_executed                                                 | couch/parser/parser.php                          |
| tag\_unknown                                                            | couch/parser/parser.php                          |
| template\_deleted                                                       | couch/ajax.php                                   |
| template\_inserted                                                      | couch/page.php                                   |
| template\_modified                                                      | couch/tags.php                                   |
| template\_tag\_end                                                       | couch/tags.php                                   |
| transliterate\_clean\_url                                                | couch/functions.php                              |
| uid\_get\_data                                                           | couch/addons/uid/uid.php                         |
| uid\_get\_search\_data                                                    | couch/addons/uid/uid.php                         |
| uid\_validate                                                           | couch/addons/uid/uid.php                         |
| user\_deleted                                                           | couch/auth/user.php                              |
| user\_loaded                                                            | couch/auth/user.php                              |
| user\_predelete                                                         | couch/auth/user.php                              |
| user\_presave                                                           | couch/auth/user.php                              |
| user\_prevalidate                                                       | couch/auth/user.php                              |
| user\_saved                                                             | couch/auth/user.php                              |
| user\_validate                                                          | couch/auth/user.php                              |
| validate\_field                                                         | couch/page.php                                   |

</details>

<details><summary><h3>EVENTS by FILE (AZ ↓), NAME (AZ ↓)</h3></summary>

| file                                             | name                                                                   |
|:-------------------------------------------------|:-----------------------------------------------------------------------|
| couch/addons/cart/cart.php                       | cart\_alter\_custom\_fields                                               |
| couch/addons/copy-to-new/edit-copy-to-new.php    | copy\_to\_new\_complete                                                   |
| couch/addons/csv/csv.php                         | skip\_qs\_params\_in\_paginator                                            |
| couch/addons/data-bound-form/data-bound-form.php | (db\_persist\|db\_persist\_form)\_alter\_fields\_(token)                     |
| couch/addons/data-bound-form/data-bound-form.php | (db\_persist\|db\_persist\_form)\_postsave\_(token)                         |
| couch/addons/data-bound-form/data-bound-form.php | (db\_persist\|db\_persist\_form)\_presave\_(token)                          |
| couch/addons/data-bound-form/data-bound-form.php | (db\_persist\|db\_persist\_form)\_savefailed\_(token)                       |
| couch/addons/data-bound-form/data-bound-form.php | (db\_persist\|db\_persist\_form)\_savesuccess\_(token)                      |
| couch/addons/mosaic/edit-mosaic.php              | alter\_mosaic\_form\_fields                                               |
| couch/addons/mosaic/gc/gc.php                    | register\_gc\_jobs                                                       |
| couch/addons/page-builder/edit-page-builder.php  | alter\_tile\_clone\_insert                                                |
| couch/addons/page-builder/page-builder.php       | pb\_invalidate\_cache                                                    |
| couch/addons/phpmailer/phpmailer.php             | alter\_phpmailer                                                        |
| couch/addons/repeatable/repeatable.php           | rr\_alter\_ctx\_(token)                                                   |
| couch/addons/uid/uid.php                         | uid\_get\_data                                                           |
| couch/addons/uid/uid.php                         | uid\_get\_search\_data                                                    |
| couch/addons/uid/uid.php                         | uid\_validate                                                           |
| couch/addons/uk-icons/uk-icons.php               | add\_uk\_icons                                                           |
| couch/ajax.php                                   | (ajaxaction)                                                           |
| couch/ajax.php                                   | alter\_datafield\_delete\_for\_allpages                                    |
| couch/ajax.php                                   | alter\_template\_delete                                                  |
| couch/ajax.php                                   | field\_deleted                                                          |
| couch/ajax.php                                   | template\_deleted                                                       |
| couch/auth/user.php                              | alter\_user\_fields\_info                                                 |
| couch/auth/user.php                              | alter\_user\_save                                                        |
| couch/auth/user.php                              | user\_deleted                                                           |
| couch/auth/user.php                              | user\_loaded                                                            |
| couch/auth/user.php                              | user\_predelete                                                         |
| couch/auth/user.php                              | user\_presave                                                           |
| couch/auth/user.php                              | user\_prevalidate                                                       |
| couch/auth/user.php                              | user\_saved                                                             |
| couch/auth/user.php                              | user\_validate                                                          |
| couch/base.php                                   | action\_pages\_form                                                      |
| couch/base.php                                   | action\_pages\_list                                                      |
| couch/base.php                                   | add\_pages\_form\_actions                                                 |
| couch/base.php                                   | add\_pages\_form\_fields                                                  |
| couch/base.php                                   | add\_pages\_list\_actions                                                 |
| couch/base.php                                   | add\_pages\_list\_fields                                                  |
| couch/base.php                                   | alter\_pages\_form\_(toolbar\|filter\|page\|extended)\_actions             |
| couch/base.php                                   | alter\_pages\_form\_actions                                               |
| couch/base.php                                   | alter\_pages\_form\_default\_fields                                        |
| couch/base.php                                   | alter\_pages\_form\_fields                                                |
| couch/base.php                                   | alter\_pages\_list\_(toolbar\|filter\|batch\|page\|extended\|row)\_actions |
| couch/base.php                                   | alter\_pages\_list\_actions                                               |
| couch/base.php                                   | alter\_pages\_list\_fields                                                |
| couch/base.php                                   | pages\_form\_custom\_action                                               |
| couch/base.php                                   | pages\_form\_post\_action                                                 |
| couch/base.php                                   | pages\_list\_bulk\_action                                                 |
| couch/base.php                                   | pages\_list\_post\_action                                                 |
| couch/cms.php                                    | alter\_final\_page\_output                                                |
| couch/cms.php                                    | pre\_process\_page                                                       |
| couch/comment.php                                | alter\_comment\_fields\_info                                              |
| couch/comment.php                                | alter\_comment\_update                                                   |
| couch/comment.php                                | comment\_approved                                                       |
| couch/comment.php                                | comment\_approved                                                       |
| couch/comment.php                                | comment\_deleted                                                        |
| couch/comment.php                                | comment\_loaded                                                         |
| couch/comment.php                                | comment\_presave                                                        |
| couch/comment.php                                | comment\_prevalidate                                                    |
| couch/comment.php                                | comment\_updated                                                        |
| couch/comment.php                                | comment\_validate                                                       |
| couch/edit-pages.php                             | add\_pages\_form\_fields                                                  |
| couch/edit-pages.php                             | add\_pages\_list\_fields                                                  |
| couch/edit-pages.php                             | alter\_pages\_form\_default\_fields                                        |
| couch/edit-pages.php                             | alter\_pages\_form\_default\_fields\_final                                  |
| couch/edit-pages.php                             | alter\_pages\_form\_fields                                                |
| couch/edit-pages.php                             | alter\_pages\_list\_default\_fields                                        |
| couch/edit-pages.php                             | alter\_pages\_list\_default\_fields\_final                                  |
| couch/edit-pages.php                             | alter\_pages\_list\_fields                                                |
| couch/edit-pages.php                             | alter\_pages\_list\_selected\_fields                                       |
| couch/edit-pages.php                             | pages\_rt\_filter\_clonable\_only                                          |
| couch/edit-pages.php                             | pages\_rt\_filter\_resolve\_page                                           |
| couch/edit-pages.php                             | pages\_rt\_filter\_set\_related\_fields                                     |
| couch/field.php                                  | ckeditor\_alter\_config                                                  |
| couch/folder.php                                 | alter\_folder\_fields\_info                                               |
| couch/folder.php                                 | alter\_folder\_save                                                      |
| couch/folder.php                                 | alter\_folder\_set\_context                                               |
| couch/folder.php                                 | check\_admin\_(menu\|action)\_is\_current                                  |
| couch/folder.php                                 | folder\_deleted                                                         |
| couch/folder.php                                 | folder\_deleted                                                         |
| couch/folder.php                                 | folder\_loaded                                                          |
| couch/folder.php                                 | folder\_predelete                                                       |
| couch/folder.php                                 | folder\_predelete                                                       |
| couch/folder.php                                 | folder\_presave                                                         |
| couch/folder.php                                 | folder\_prevalidate                                                     |
| couch/folder.php                                 | folder\_saved                                                           |
| couch/folder.php                                 | folder\_validate                                                        |
| couch/functions.php                              | add\_render\_vars                                                        |
| couch/functions.php                              | admin\_post\_action                                                      |
| couch/functions.php                              | admin\_pre\_action                                                       |
| couch/functions.php                              | admin\_route\_found                                                      |
| couch/functions.php                              | alter\_render\_output\_(name)                                             |
| couch/functions.php                              | alter\_render\_vars                                                      |
| couch/functions.php                              | alter\_render\_vars\_(name)                                               |
| couch/functions.php                              | alter\_renderables                                                      |
| couch/functions.php                              | alter\_rewrite\_rules                                                    |
| couch/functions.php                              | alter\_rewrite\_rules\_final                                              |
| couch/functions.php                              | funcs\_get\_link                                                         |
| couch/functions.php                              | invalidate\_cache                                                       |
| couch/functions.php                              | override\_renderables                                                   |
| couch/functions.php                              | register\_renderables                                                   |
| couch/functions.php                              | transliterate\_clean\_url                                                |
| couch/gen\_dump.php                               | alter\_gen\_dump\_tables                                                  |
| couch/gen\_dump.php                               | gen\_dump\_table\_where                                                   |
| couch/gen\_dump.php                               | gen\_dump\_table\_where                                                   |
| couch/gen\_dump.php                               | sql\_dump\_use\_extended\_inserts                                          |
| couch/header.php                                 | init                                                                   |
| couch/includes/kcfinder/integration/couch.php    | kcfinder\_alter\_access                                                  |
| couch/index.php                                  | add\_render\_vars                                                        |
| couch/index.php                                  | admin\_init                                                             |
| couch/index.php                                  | alter\_admin\_routes                                                     |
| couch/index.php                                  | alter\_final\_admin\_page\_output                                          |
| couch/index.php                                  | register\_admin\_routes                                                  |
| couch/install.php                                | install\_complete                                                       |
| couch/page.php                                   | alter\_create\_insert                                                    |
| couch/page.php                                   | alter\_custom\_fields\_data                                               |
| couch/page.php                                   | alter\_custom\_fields\_info                                               |
| couch/page.php                                   | alter\_custom\_fields\_info\_db                                            |
| couch/page.php                                   | alter\_datafield\_insert\_for\_newpage                                     |
| couch/page.php                                   | alter\_draft\_insert                                                     |
| couch/page.php                                   | alter\_fields\_data                                                      |
| couch/page.php                                   | alter\_fields\_info                                                      |
| couch/page.php                                   | alter\_folders\_info                                                     |
| couch/page.php                                   | alter\_page\_fulltext\_insert                                             |
| couch/page.php                                   | alter\_page\_info                                                        |
| couch/page.php                                   | alter\_page\_save                                                        |
| couch/page.php                                   | alter\_page\_save\_full\_text                                              |
| couch/page.php                                   | alter\_page\_set\_context                                                 |
| couch/page.php                                   | alter\_page\_unclone                                                     |
| couch/page.php                                   | alter\_recreate\_parent\_insert                                           |
| couch/page.php                                   | alter\_save\_custom\_field                                                |
| couch/page.php                                   | alter\_save\_system\_field                                                |
| couch/page.php                                   | alter\_system\_fields\_info                                               |
| couch/page.php                                   | alter\_template\_info                                                    |
| couch/page.php                                   | alter\_template\_name                                                    |
| couch/page.php                                   | lock\_template                                                          |
| couch/page.php                                   | page\_deleted                                                           |
| couch/page.php                                   | page\_inserted                                                          |
| couch/page.php                                   | page\_load\_complete                                                     |
| couch/page.php                                   | page\_loaded                                                            |
| couch/page.php                                   | page\_predelete                                                         |
| couch/page.php                                   | page\_preload                                                           |
| couch/page.php                                   | page\_presave                                                           |
| couch/page.php                                   | page\_prevalidate                                                       |
| couch/page.php                                   | page\_save\_start                                                        |
| couch/page.php                                   | page\_saved                                                             |
| couch/page.php                                   | page\_uncloned                                                          |
| couch/page.php                                   | page\_validate                                                          |
| couch/page.php                                   | save\_custom\_field                                                      |
| couch/page.php                                   | save\_custom\_field                                                      |
| couch/page.php                                   | save\_system\_field                                                      |
| couch/page.php                                   | template\_inserted                                                      |
| couch/page.php                                   | validate\_field                                                         |
| couch/parser/parser.php                          | add\_render\_vars                                                        |
| couch/parser/parser.php                          | alter\_parsed\_dom                                                       |
| couch/parser/parser.php                          | alter\_str\_to\_parse                                                     |
| couch/parser/parser.php                          | alter\_tag\_(tagname)\_execute                                            |
| couch/parser/parser.php                          | tag\_(tagname)\_executed                                                 |
| couch/parser/parser.php                          | tag\_unknown                                                            |
| couch/restore\_dump.php                           | alter\_restore\_dump\_tables                                              |
| couch/restore\_dump.php                           | restore\_dump\_complete                                                  |
| couch/restore\_dump.php                           | restore\_dump\_normalize\_query                                           |
| couch/tags.php                                   | add\_template\_params                                                    |
| couch/tags.php                                   | alter\_datafield\_insert\_for\_existingpage                                |
| couch/tags.php                                   | alter\_editable                                                         |
| couch/tags.php                                   | alter\_editable\_modifications                                           |
| couch/tags.php                                   | alter\_editable\_start                                                   |
| couch/tags.php                                   | alter\_field\_insert                                                     |
| couch/tags.php                                   | alter\_field\_update                                                     |
| couch/tags.php                                   | alter\_folders\_tag\_params                                               |
| couch/tags.php                                   | alter\_page\_tag\_context                                                 |
| couch/tags.php                                   | alter\_page\_tag\_fields                                                  |
| couch/tags.php                                   | alter\_page\_tag\_params                                                  |
| couch/tags.php                                   | alter\_page\_tag\_query                                                   |
| couch/tags.php                                   | alter\_page\_tag\_query\_ex                                                |
| couch/tags.php                                   | alter\_relational\_types                                                 |
| couch/tags.php                                   | alter\_smart\_embed\_valid\_files                                          |
| couch/tags.php                                   | alter\_template                                                         |
| couch/tags.php                                   | alter\_template\_modified                                                |
| couch/tags.php                                   | alter\_template\_tag\_params                                              |
| couch/tags.php                                   | alter\_valid\_orderby                                                    |
| couch/tags.php                                   | each\_alter\_ctx\_(token)                                                 |
| couch/tags.php                                   | field\_inserted                                                         |
| couch/tags.php                                   | field\_updated                                                          |
| couch/tags.php                                   | form\_alter\_posted\_data\_(token)                                         |
| couch/tags.php                                   | form\_posted\_(token)                                                    |
| couch/tags.php                                   | form\_postvalidate\_(token)                                              |
| couch/tags.php                                   | form\_prevalidate\_(token)                                               |
| couch/tags.php                                   | post\_alter\_page\_tag\_context                                            |
| couch/tags.php                                   | pre\_alter\_page\_tag\_context                                             |
| couch/tags.php                                   | set\_orderby\_clause                                                     |
| couch/tags.php                                   | template\_modified                                                      |
| couch/tags.php                                   | template\_tag\_end                                                       |
| couch/theme/\_system/register.php                 | alter\_register\_pages\_routes                                            |

</details>

<details><summary><h3>EVENTS by FILE (AZ ↓), NAME in order of appearance</h3></summary>

| file                                             | name                                                                   |
|:-------------------------------------------------|:-----------------------------------------------------------------------|
| couch/addons/cart/cart.php                       | cart\_alter\_custom\_fields                                               |
| couch/addons/copy-to-new/edit-copy-to-new.php    | copy\_to\_new\_complete                                                   |
| couch/addons/csv/csv.php                         | skip\_qs\_params\_in\_paginator                                            |
| couch/addons/data-bound-form/data-bound-form.php | (db\_persist\|db\_persist\_form)\_alter\_fields\_(token)                     |
| couch/addons/data-bound-form/data-bound-form.php | (db\_persist\|db\_persist\_form)\_presave\_(token)                          |
| couch/addons/data-bound-form/data-bound-form.php | (db\_persist\|db\_persist\_form)\_postsave\_(token)                         |
| couch/addons/data-bound-form/data-bound-form.php | (db\_persist\|db\_persist\_form)\_savefailed\_(token)                       |
| couch/addons/data-bound-form/data-bound-form.php | (db\_persist\|db\_persist\_form)\_savesuccess\_(token)                      |
| couch/addons/mosaic/edit-mosaic.php              | alter\_mosaic\_form\_fields                                               |
| couch/addons/mosaic/gc/gc.php                    | register\_gc\_jobs                                                       |
| couch/addons/page-builder/edit-page-builder.php  | alter\_tile\_clone\_insert                                                |
| couch/addons/page-builder/page-builder.php       | pb\_invalidate\_cache                                                    |
| couch/addons/phpmailer/phpmailer.php             | alter\_phpmailer                                                        |
| couch/addons/repeatable/repeatable.php           | rr\_alter\_ctx\_(token)                                                   |
| couch/addons/uid/uid.php                         | uid\_get\_search\_data                                                    |
| couch/addons/uid/uid.php                         | uid\_get\_data                                                           |
| couch/addons/uid/uid.php                         | uid\_validate                                                           |
| couch/addons/uk-icons/uk-icons.php               | add\_uk\_icons                                                           |
| couch/ajax.php                                   | (ajaxaction)                                                           |
| couch/ajax.php                                   | alter\_template\_delete                                                  |
| couch/ajax.php                                   | template\_deleted                                                       |
| couch/ajax.php                                   | alter\_datafield\_delete\_for\_allpages                                    |
| couch/ajax.php                                   | field\_deleted                                                          |
| couch/auth/user.php                              | user\_loaded                                                            |
| couch/auth/user.php                              | alter\_user\_fields\_info                                                 |
| couch/auth/user.php                              | user\_presave                                                           |
| couch/auth/user.php                              | user\_prevalidate                                                       |
| couch/auth/user.php                              | user\_validate                                                          |
| couch/auth/user.php                              | alter\_user\_save                                                        |
| couch/auth/user.php                              | user\_saved                                                             |
| couch/auth/user.php                              | user\_predelete                                                         |
| couch/auth/user.php                              | user\_deleted                                                           |
| couch/base.php                                   | action\_pages\_list                                                      |
| couch/base.php                                   | pages\_list\_bulk\_action                                                 |
| couch/base.php                                   | pages\_list\_post\_action                                                 |
| couch/base.php                                   | alter\_pages\_list\_(toolbar\|filter\|batch\|page\|extended\|row)\_actions |
| couch/base.php                                   | add\_pages\_list\_actions                                                 |
| couch/base.php                                   | alter\_pages\_list\_actions                                               |
| couch/base.php                                   | add\_pages\_list\_fields                                                  |
| couch/base.php                                   | alter\_pages\_list\_fields                                                |
| couch/base.php                                   | action\_pages\_form                                                      |
| couch/base.php                                   | alter\_pages\_form\_(toolbar\|filter\|page\|extended)\_actions             |
| couch/base.php                                   | add\_pages\_form\_actions                                                 |
| couch/base.php                                   | alter\_pages\_form\_actions                                               |
| couch/base.php                                   | alter\_pages\_form\_default\_fields                                        |
| couch/base.php                                   | add\_pages\_form\_fields                                                  |
| couch/base.php                                   | alter\_pages\_form\_fields                                                |
| couch/base.php                                   | pages\_form\_custom\_action                                               |
| couch/base.php                                   | pages\_form\_post\_action                                                 |
| couch/base.php                                   | base.php                                                               |
| couch/cms.php                                    | pre\_process\_page                                                       |
| couch/cms.php                                    | alter\_final\_page\_output                                                |
| couch/comment.php                                | comment\_loaded                                                         |
| couch/comment.php                                | alter\_comment\_fields\_info                                              |
| couch/comment.php                                | comment\_presave                                                        |
| couch/comment.php                                | comment\_prevalidate                                                    |
| couch/comment.php                                | comment\_validate                                                       |
| couch/comment.php                                | alter\_comment\_update                                                   |
| couch/comment.php                                | comment\_updated                                                        |
| couch/comment.php                                | comment\_approved                                                       |
| couch/comment.php                                | comment\_approved                                                       |
| couch/comment.php                                | comment\_deleted                                                        |
| couch/edit-pages.php                             | alter\_pages\_list\_default\_fields                                        |
| couch/edit-pages.php                             | alter\_pages\_list\_selected\_fields                                       |
| couch/edit-pages.php                             | alter\_pages\_list\_default\_fields\_final                                  |
| couch/edit-pages.php                             | add\_pages\_list\_fields                                                  |
| couch/edit-pages.php                             | alter\_pages\_list\_fields                                                |
| couch/edit-pages.php                             | alter\_pages\_form\_default\_fields                                        |
| couch/edit-pages.php                             | alter\_pages\_form\_default\_fields\_final                                  |
| couch/edit-pages.php                             | add\_pages\_form\_fields                                                  |
| couch/edit-pages.php                             | alter\_pages\_form\_fields                                                |
| couch/edit-pages.php                             | pages\_rt\_filter\_resolve\_page                                           |
| couch/edit-pages.php                             | pages\_rt\_filter\_clonable\_only                                          |
| couch/edit-pages.php                             | pages\_rt\_filter\_set\_related\_fields                                     |
| couch/field.php                                  | ckeditor\_alter\_config                                                  |
| couch/folder.php                                 | folder\_loaded                                                          |
| couch/folder.php                                 | folder\_predelete                                                       |
| couch/folder.php                                 | folder\_deleted                                                         |
| couch/folder.php                                 | alter\_folder\_set\_context                                               |
| couch/folder.php                                 | alter\_folder\_fields\_info                                               |
| couch/folder.php                                 | folder\_presave                                                         |
| couch/folder.php                                 | folder\_prevalidate                                                     |
| couch/folder.php                                 | folder\_validate                                                        |
| couch/folder.php                                 | alter\_folder\_save                                                      |
| couch/folder.php                                 | folder\_saved                                                           |
| couch/folder.php                                 | folder\_predelete                                                       |
| couch/folder.php                                 | folder\_deleted                                                         |
| couch/folder.php                                 | check\_admin\_(menu\|action)\_is\_current                                  |
| couch/functions.php                              | transliterate\_clean\_url                                                |
| couch/functions.php                              | funcs\_get\_link                                                         |
| couch/functions.php                              | alter\_rewrite\_rules                                                    |
| couch/functions.php                              | alter\_rewrite\_rules\_final                                              |
| couch/functions.php                              | invalidate\_cache                                                       |
| couch/functions.php                              | register\_renderables                                                   |
| couch/functions.php                              | override\_renderables                                                   |
| couch/functions.php                              | alter\_renderables                                                      |
| couch/functions.php                              | add\_render\_vars                                                        |
| couch/functions.php                              | alter\_render\_vars                                                      |
| couch/functions.php                              | alter\_render\_vars\_(name)                                               |
| couch/functions.php                              | alter\_render\_output\_(name)                                             |
| couch/functions.php                              | admin\_route\_found                                                      |
| couch/functions.php                              | admin\_pre\_action                                                       |
| couch/functions.php                              | admin\_post\_action                                                      |
| couch/gen\_dump.php                               | sql\_dump\_use\_extended\_inserts                                          |
| couch/gen\_dump.php                               | alter\_gen\_dump\_tables                                                  |
| couch/gen\_dump.php                               | gen\_dump\_table\_where                                                   |
| couch/gen\_dump.php                               | gen\_dump\_table\_where                                                   |
| couch/header.php                                 | init                                                                   |
| couch/includes/kcfinder/integration/couch.php    | kcfinder\_alter\_access                                                  |
| couch/index.php                                  | admin\_init                                                             |
| couch/index.php                                  | register\_admin\_routes                                                  |
| couch/index.php                                  | alter\_admin\_routes                                                     |
| couch/index.php                                  | add\_render\_vars                                                        |
| couch/index.php                                  | alter\_final\_admin\_page\_output                                          |
| couch/install.php                                | install\_complete                                                       |
| couch/page.php                                   | page\_load\_complete                                                     |
| couch/page.php                                   | template\_inserted                                                      |
| couch/page.php                                   | alter\_template\_info                                                    |
| couch/page.php                                   | alter\_custom\_fields\_info\_db                                            |
| couch/page.php                                   | alter\_custom\_fields\_info                                               |
| couch/page.php                                   | alter\_system\_fields\_info                                               |
| couch/page.php                                   | alter\_fields\_info                                                      |
| couch/page.php                                   | alter\_folders\_info                                                     |
| couch/page.php                                   | page\_preload                                                           |
| couch/page.php                                   | alter\_page\_info                                                        |
| couch/page.php                                   | alter\_fields\_data                                                      |
| couch/page.php                                   | page\_loaded                                                            |
| couch/page.php                                   | alter\_custom\_fields\_data                                               |
| couch/page.php                                   | alter\_template\_name                                                    |
| couch/page.php                                   | page\_presave                                                           |
| couch/page.php                                   | lock\_template                                                          |
| couch/page.php                                   | page\_prevalidate                                                       |
| couch/page.php                                   | validate\_field                                                         |
| couch/page.php                                   | page\_validate                                                          |
| couch/page.php                                   | page\_save\_start                                                        |
| couch/page.php                                   | alter\_save\_system\_field                                                |
| couch/page.php                                   | save\_system\_field                                                      |
| couch/page.php                                   | alter\_save\_custom\_field                                                |
| couch/page.php                                   | save\_custom\_field                                                      |
| couch/page.php                                   | save\_custom\_field                                                      |
| couch/page.php                                   | alter\_page\_save                                                        |
| couch/page.php                                   | alter\_page\_save\_full\_text                                              |
| couch/page.php                                   | page\_saved                                                             |
| couch/page.php                                   | alter\_create\_insert                                                    |
| couch/page.php                                   | alter\_draft\_insert                                                     |
| couch/page.php                                   | alter\_recreate\_parent\_insert                                           |
| couch/page.php                                   | alter\_page\_unclone                                                     |
| couch/page.php                                   | page\_uncloned                                                          |
| couch/page.php                                   | alter\_datafield\_insert\_for\_newpage                                     |
| couch/page.php                                   | alter\_page\_fulltext\_insert                                             |
| couch/page.php                                   | page\_inserted                                                          |
| couch/page.php                                   | page\_predelete                                                         |
| couch/page.php                                   | page\_deleted                                                           |
| couch/page.php                                   | alter\_page\_set\_context                                                 |
| couch/parser/parser.php                          | add\_render\_vars                                                        |
| couch/parser/parser.php                          | alter\_tag\_(tagname)\_execute                                            |
| couch/parser/parser.php                          | tag\_(tagname)\_executed                                                 |
| couch/parser/parser.php                          | tag\_unknown                                                            |
| couch/parser/parser.php                          | alter\_str\_to\_parse                                                     |
| couch/parser/parser.php                          | alter\_parsed\_dom                                                       |
| couch/restore\_dump.php                           | restore\_dump\_complete                                                  |
| couch/restore\_dump.php                           | alter\_restore\_dump\_tables                                              |
| couch/restore\_dump.php                           | restore\_dump\_normalize\_query                                           |
| couch/tags.php                                   | each\_alter\_ctx\_(token)                                                 |
| couch/tags.php                                   | alter\_smart\_embed\_valid\_files                                          |
| couch/tags.php                                   | alter\_editable\_start                                                   |
| couch/tags.php                                   | alter\_editable                                                         |
| couch/tags.php                                   | alter\_editable\_modifications                                           |
| couch/tags.php                                   | alter\_field\_update                                                     |
| couch/tags.php                                   | field\_updated                                                          |
| couch/tags.php                                   | alter\_field\_insert                                                     |
| couch/tags.php                                   | alter\_datafield\_insert\_for\_existingpage                                |
| couch/tags.php                                   | field\_inserted                                                         |
| couch/tags.php                                   | alter\_template\_tag\_params                                              |
| couch/tags.php                                   | add\_template\_params                                                    |
| couch/tags.php                                   | alter\_template                                                         |
| couch/tags.php                                   | alter\_template\_modified                                                |
| couch/tags.php                                   | template\_modified                                                      |
| couch/tags.php                                   | template\_tag\_end                                                       |
| couch/tags.php                                   | alter\_page\_tag\_params                                                  |
| couch/tags.php                                   | alter\_valid\_orderby                                                    |
| couch/tags.php                                   | alter\_page\_tag\_fields                                                  |
| couch/tags.php                                   | alter\_relational\_types                                                 |
| couch/tags.php                                   | set\_orderby\_clause                                                     |
| couch/tags.php                                   | alter\_page\_tag\_query                                                   |
| couch/tags.php                                   | alter\_page\_tag\_query\_ex                                                |
| couch/tags.php                                   | pre\_alter\_page\_tag\_context                                             |
| couch/tags.php                                   | alter\_page\_tag\_context                                                 |
| couch/tags.php                                   | post\_alter\_page\_tag\_context                                            |
| couch/tags.php                                   | alter\_folders\_tag\_params                                               |
| couch/tags.php                                   | form\_posted\_(token)                                                    |
| couch/tags.php                                   | form\_alter\_posted\_data\_(token)                                         |
| couch/tags.php                                   | form\_prevalidate\_(token)                                               |
| couch/tags.php                                   | form\_postvalidate\_(token)                                              |
| couch/theme/\_system/register.php                 | alter\_register\_pages\_routes                                            |

</details>


## Usage

Mind that most events have already been dispatched by the moment the func kicks in. So, mostly it is useful to log the events which happen *after* in time e.g. events of tags.

Example:

```xml
<cms:call 'log-event' 'alter_tag_call_execute' />
```

<details><summary>sample listing of file <code>EVENT alter_tag_call_execute.log</code></summary>

```txt
.:: Event :: alter_tag_call_execute ::.
//////////////////////////////////////
array (
  0 => 'call',
  1 =>
  array (
    0 =>
    array (
      'lhs' => NULL,
      'op' => '=',
      'rhs' => 'broc-dump',
    ),
  ),
  2 =>
  KNode::__set_state(array(
     'type' => 1,
     'name' => 'call',
     'attributes' =>
    array (
      0 =>
      array (
        'value' => 'broc-dump',
        'value_type' => 1,
        'quote_type' => '\'',
        'op' => '=',
      ),
    ),
     'text' => '',
     'ID' => '_10_1493_10_44',
     'line_num' => 10,
     'char_num' => 44,
     'children' =>
    array (
    ),
  )),
  3 => '',
)
```
</details>


## Installation

**Use [Autoloading](https://github.com/trendoman/Cms-Fu/tree/master/ADDON-FUNCS-ON-DEMAND.md),**

or, alternatively, manually copy the func code to the page before the calling or embed func as a snippet —

```xml
<cms:embed 'funcs/Logs/log-event/log-event.func' />
```

## Support

[![Mail](https://img.shields.io/badge/gmail-%23539CFF.svg?&style=for-the-badge&logo=gmail&logoColor=white)](mailto:"Anton"<tony.smirnov@gmail.com>?subject=[GitHub])

Check out my dedicated [**SUPPORT**](/SUPPORT.md) page.
