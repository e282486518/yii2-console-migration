
yii2命令行中使用migration备份和还原数据库
===========================
yii2命令行中使用migration备份和还原数据库


Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist e282486518/yii2-console-migration "*"
```

or add

```
"e282486518/yii2-console-migration": "*"
```

to the require section of your `composer.json` file.


Usage
-----

在```console\config\main.php```中添加  :

```php
    'controllerMap' => [
        'migrates' => [
            'class' => 'e282486518\migration\ConsoleController',
        ],
    ],
```

在命令行中使用方式：
```
php ./yii migrates/create all #备份全部表
php ./yii migrates/create table1,table2,table3... #备份多张表
php ./yii migrates/create table1 #备份一张表

php ./yii migrates/up #恢复全部表
```
