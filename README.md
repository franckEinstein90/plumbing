# tubings

## Database convention
Tubings works by expecting table names to be written in uppercase, and primary unique keys to be stored in a field by the same name as the table, but lowercase. So, for example, the table USER is indexed by the primary key user, and the table BOOK is indexed by the primary key book. Moreover, when parsing a tubing statement, table names are considered to be functions that take values of the same type as the primary key of the table. 

###example: 

in tubings:

```sql
USER("John Doe")
```

is equivalent to: 

```sql
...FROM TABLE USER WHERE user = "john Doe"
```

Moreover, tubing also always expect keys to be defined as 30 characters (VARCHAR 30)











## examples

To find out if a specific person is listed in a database: 
```php
$db.exists "PERSON(queriedperson@fd.ca)"
```

To match a password with a variable
```php
$db.match "PERSON($userVar).password", "password"
```

To create a new person with email address as key:
```php
$db.define "PERSON(newpers@onne.com)"
```
if the person already exists, nothing happens. 
