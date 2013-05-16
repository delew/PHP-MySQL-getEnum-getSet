# getEnumSet
`getEnum()` and `getSet()` are just two helpful PHP functions providing well indexed associative array representing MySQL ENUM and SET column values.

## getEnum()

```php
function getEnum($table, $field, $mask=false);
```

#####parameters:
* $table: `<string>` table name
* $field: `<string>` field name
* $mask: `<int>` **(optional)** MySQL index of searched value

#####return:
* _if $mask specified_ `<string>|false` value corresponding to specified index or **false** if index doesn't exist
* _else_ `<array>` associatve array with MySQL indexes for keys

#####examples:
```sql
ALTER TABLE example ADD color ENUM('red','green','blue','yellow');
```
 Index | Value
:------|:---------------
 0     | 
 1     | red
 2     | green
 3     | blue
 4     | yellow
```php
getEnum('example', 'color');
==> array(1=>'red', 2=>'green', 3=>'blue', 4=>'yellow');

getEnum('example', 'color', 3);
==> 'blue';

getEnum('example', 'color', 5);
==> false;
```

## getSet()

```php
function getSet($table, $field, $mask=false);
```

#####parameters:
* $table: `<string>` table name
* $field: `<string>` field name
* $mask: `<int>` **(optional)** decimal value representing binary index representation

#####return:
* _if $mask specified_ `<array>` associatve array with MySQL indexes for keys matching with $mask
* _else_ `<array>` associatve array with MySQL indexes for keys

#####examples:
```sql
ALTER TABLE example ADD colors SET('red','green','blue','yellow');
```
 Index | Value
:------|:---------------
 0     | 
 1     | red
 2     | green
 4     | blue
 8     | yellow
```php
getSet('example', 'colors');
==> array(1=>'red', 2=>'green', 4=>'blue', 8=>'yellow');

getSet('example', 'color', 4);
==> array(4=>'blue');

getSet('example', 'color', 5);
==> array(1=>'red', 4=>'blue');

getSet('example', 'colors', 14);
==> array(2=>'green', 4=>'blue', 8=>'yellow');
```

## ENUM and SET documentation

* http://dev.mysql.com/doc/refman/5.0/en/enum.html
* http://dev.mysql.com/doc/refman/5.0/en/set.html
