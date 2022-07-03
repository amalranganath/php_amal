<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Parker Sales Team</h1>
    <br>
</p>

The project is created using Yii 2 Basic Project Template is a skeleton [Yii 2](http://www.yiiframework.com/) application best for
rapidly creating small projects.

[![Latest Stable Version](https://img.shields.io/packagist/v/yiisoft/yii2-app-basic.svg)](https://packagist.org/packages/yiisoft/yii2-app-basic)
[![Total Downloads](https://img.shields.io/packagist/dt/yiisoft/yii2-app-basic.svg)](https://packagist.org/packages/yiisoft/yii2-app-basic)
[![build](https://github.com/yiisoft/yii2-app-basic/workflows/build/badge.svg)](https://github.com/yiisoft/yii2-app-basic/actions?query=workflow%3Abuild)

DIRECTORY STRUCTURE
-------------------

      assets/             contains assets definition
      commands/           contains console commands (controllers)
      config/             contains application configurations
      controllers/        contains Web controller classes
      mail/               contains view files for e-mails
      models/             contains model classes
      runtime/            contains files generated during runtime
      tests/              contains various tests for the basic application
      vendor/             contains dependent 3rd-party packages
      views/              contains view files for the Web application
      web/                contains the entry script and Web resources
      widgets/            contains the third part widgets



REQUIREMENTS
------------

The minimum requirement by this project template that your Web server supports PHP 5.6.0. and MySql.


INTALATION
------------

Please colne the repository to your local server run following command 

~~~
git colne https://github.com/amalranganath/php_amal.git
~~~


### composer

If you do not have [Composer](http://getcomposer.org/), you may install it by following the instructions
at [getcomposer.org](http://getcomposer.org/doc/00-intro.md#installation-nix).

Pleas create a database as in aboveand then install the database table using the following command:

~~~
composer update
~~~


CONFIGURATION
-------------

### Database

Edit the file `config/db.php` with real data, for example:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yii2basic',
    'username' => 'root',
    'password' => '1234',
    'charset' => 'utf8',
];
```

Pleas create a database as in aboveand then install the database table using the following command:

~~~
yii migrate
~~~

Now you should be able to access the application through the following URL, assuming `basic` is the directory
directly under the Web root.

~~~
http://localhost/php_amal/web/
~~~

