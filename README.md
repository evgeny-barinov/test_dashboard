# Dashboard Application

## Deployment Tips

### Using Docker

1) Run from project root:

```bash
 composer install && docker-compose up -d --build
```

2) Add `127.0.0.1 dashboard.local` to */etc/hosts*

---------

### Using your own environment

1) Run from project root:

```bash
 composer install
```

2) Create env.php in project root directory with content like
```php
<?php
define('ENV', 'prod');
```

3) Create `prod.php` config in *config/* directory. Similar to *config/dev.php*.
   
4) Import *db/dump.sql* to your database.

5) Set Up web server to work with *public/* directory.

6) It should be operational for now.