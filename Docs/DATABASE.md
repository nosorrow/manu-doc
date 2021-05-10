---
title: Database
layout: layout.hbs
---
DATABASE
--------
Настройките за базите данни се намират в <code>App/Config/mysql_db_config.php</code>

```php
<?php 
    return [
        'use-database' => true, // false if you dont use database in your app.
        'default' => 'mysql',
    
        'connections' => [
            'mysql' =>[
                'driver' => 'mysql',
                'host' => 'localhost',
                'port'=>33060,
                'database' => 'dbname',
                'username' => 'root',
                'password' => 'secretpass',
                'charset' => 'utf8',
                'collation' => 'utf8_unicode_ci',
                'prefix' => '',
            ],
            'mysql-second' =>[
                'driver' => 'mysql',
                'host' => '192.168.1.10',
                'port'=>3306,
                'database' => 'dbname-second',
                'username' => 'root',
                'password' => 'secret',
                'charset' => 'utf8',
                'collation' => 'utf8_unicode_ci',
                'prefix' => '',
            ]
        ]
    ];
?>
```
##### Използване на facade DB
С помоща на DB фасадата много лесно можем да вземем PDO инстанция към определена връзка с база данни
например <code>$dbh = DB::pdo()</code> се връзва към <code>'default' => 'mysql'</code> или 
<code>$dbh = DB::connection('conn_name')->pdo()</code> 

```php
<?php
use Core\Libs\Support\Facades\DB;

class City extends \Core\Model
{
    public function getCity()
    {
        //Get pdo $dbh = DB::pdo();
    
        //get specific connections
        $dbh = DB::connection('mysql-second')->pdo();
        
        $sth = $dbh->prepare('SELECT * FROM geo_city WHERE city_id = :id');
    
        $sth->bindValue(':id', 10);
        $sth->execute();
        dump($result = $sth->fetch());
    }
}
```

##### Използване на DB query builder

###### <b>Изпълнение на Raw query</b>  
Методът <code>DB::execute_sql($sql, array $args)</code> подготвя SQL оператор, 
който се изпълнява чрез метода <code>PDOStatement :: execute ()</code> и връща  <code>PDOStatement</code> обект, 
от който извличаме резултатите примерно с <code>PDOStatement :: fetchAll</code>

```php
<?php
use Core\Libs\Support\Facades\DB;

class City extends \Core\Model
{
    public function getCity()
    {
        $post_code = 2000;
        $sql = "SELECT * FROM geo_city_homestead WHERE post_code < :post_code";
        
        $result = DB::execute_sql($sql, ['post_code'=>$post_code])->fetchAll(\PDO::FETCH_ASSOC);

        foreach($result as $r){
            dump($r);
        }
    }
}
```
###### <b>Изпълнение на заявки от две конекции</b> 
```php
<?php
use Core\Libs\Support\Facades\DB;

class City extends \Core\Model
{
    public function getCity()
    {
       $post_code = 2000;
       $sql = "SELECT * FROM geo_city_homestead WHERE post_code > :post_code";
       $sql1 = "SELECT * FROM users";
       
       $result = DB::execute_sql($sql, ['post_code'=>$post_code])->fetch(\PDO::FETCH_ASSOC);
       $result2 = DB::connection('mysql-xampp')->execute_sql($sql1)->fetch(2);

       dump($result);
       dump($result2);
    }
}
```
###### <b>query builder</b> 

```php
<?php
use Core\Libs\Support\Facades\DB;

class City extends \Core\Model
{
    public function getCity()
    {
        $result = DB::table('city')
                    ->where('post_code', '>', 8500)
                    ->orderBy('name')
                    ->limit(10)
                    ->get();
        
        dump($result);
         // fetch style -> array
        $result = DB::table('city')
                    ->limit(10)
                    ->get(\PDO::FETCH_ASSOC);
        
        dump($result);
        
        // using Generator for big data an select only 2 columns from table
        $result = DB::table('geo_city_homestead')
                    ->select('name', 'post_code')
                    ->yield();
        
        foreach ($result as $res) {
            dump($res);
        }
    }
}
```

Параметърът fetch_style в методът <code>DB::get($fetch_style = null)</code> по подразбиране е 
<code>PDO::FETCH_OBJ</code>
Вижте останалите <code>PDO</code> константи : https://www.php.net/manual/en/pdostatement.fetch.php  

###### С DB facade може да бъдат използвани следните методи на DB query builder.

```php
/**
 * Class DB
 * method static pdo()
 * method static table(string $table)
 * method static execute_sql(string $query)
 * method static where(string $field, $operator = '', $data = '')
 * method static or_where($field, $operator = '', $data = '')
 * method static orderBy($field, $order = 'ASC')
 * method static groupBy($field)
 * method static field(...$field_name)
 * method static select(...$field_name)
 * method static get($fetch_style = null)
 * method static getOne($fetch_style = null)
 * method static yield($fetch_style = null)
 * method static count()
 * method static insert($data)
 * method static delete()
 * method static update($data)
 * method static limit($rows, $offset = 0)
 **/
```
