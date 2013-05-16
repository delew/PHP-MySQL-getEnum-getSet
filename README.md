# getEnumSet
`getEnum()` and `getSet()` are just two helpful PHP functions providing well indexed associative array representing MySQL ENUM and SET column values.

## getEnum()

```php
function getEnum($table, $field, $mask=false);
```

parameters:
* $table: **<string>** table name
* $field: **<string>** field name
* $mask: **<int> (optional)** MySQL index of searched value

return:
* _if $mask specified_ **<string>|false** value corresponding to specified index or **false** if index doesn't exist
* _else_ **<array>** associatve array with MySQL indexes for keys

## getSet()

```php
function getSet($table, $field, $mask=false);
```

parameters:
* $table: **<string>** table name
* $field: **<string>** field name
* $mask: **<int> (optional)** decimal value representing binary index representation

return:
* _if $mask specified_ **<array>** associatve array with MySQL indexes for keys matching with $mask
* _else_ **<array>** associatve array with MySQL indexes for keys

## ENUM and SET documentation
http://dev.mysql.com/doc/refman/5.0/en/enum.html
http://dev.mysql.com/doc/refman/5.0/en/set.html