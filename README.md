# Dashboard Application

Deployment Tips

1) Create env.php in project root directory with content like
```php
<?php
define('ENV', 'prod');
```

2) Create `prod.php` config in *config/* directory. Similar to *config/dev.php*.
   
3) Import *db/dump.sql* to your database.

4) Set Up web server to work with *public/* directory.

5) It should be operational for now.