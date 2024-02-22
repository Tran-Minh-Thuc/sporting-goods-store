```
remember to create env file
```
```
symfony server:start
```
```
php bin/console make:controller
```
```
php bin/console make:entity

Main Types
  * string
  * text
  * boolean
  * integer or smallint or bigint
  * float

Relationships/Associations
  * relation or a wizard will help you build the relation
  * ManyToOne
  * OneToMany
  * ManyToMany
  * OneToOne

Array/Object Types
  * array or simple_array
  * json
  * object
  * binary
  * blob

Date/Time Types
  * datetime or datetime_immutable
  * datetimetz or datetimetz_immutable
  * date or date_immutable
  * time or time_immutable
  * dateinterval
```
```
php bin/console make:migration
```
```
php bin/console doctrine:migrations:migrate
```

