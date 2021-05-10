---
title: CONFIG
layout: layout.hbs
---
CONFIG
-----
Config::getConfigFromFile($key, $domain)

$key = ключ от конфигурационния масив (може да се използва dot notation)
$domain = името на домейна отговаря на файл от директория config

```php
<?php
    use \Core\Libs\Config;
    
    $databasename = Config::getConfigFromFile('connections.mysql.database', 'database');
    
    // or with Getter;
    $databasename = Config::get('connections.mysql.database', 'database');
    // or with helper
    $databasename = config('connections.mysql.database', 'database');
    
```
