# tubings

## language


## examples

To find out if a specific person is listed in a database: 
$db.exists "PERSON(queriedperson@fd.ca)"

To match a password with a variable
$db.match "PERSON($userVar).password", "password"

To create a new person with email address as key:
$db.define "PERSON(newpers@onne.com)"

if the person already exists, nothing happens. 
