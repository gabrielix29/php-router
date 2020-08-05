# PHP-Router

[![HitCount](http://hits.dwyl.com/gabrielix29/php-router.svg)](http://hits.dwyl.com/gabrielix29/php-router)
[![license](https://img.shields.io/github/license/gabrielix29/php-router?style=flat-square)](https://github.com/gabrielix29/php-router/blob/master/LICENSE)
[![version](https://img.shields.io/github/v/tag/gabrielix29/php-router?label=version&style=flat-square)](https://github.com/gabrielix29/php-router/releases)
[![php-version](https://img.shields.io/packagist/php-v/gabrielix29/php-router?style=flat-square)](https://www.php.net/releases/7_4_0.php)
[![downloads](https://img.shields.io/packagist/dt/gabrielix29/php-router?style=flat-square)](https://packagist.org/packages/gabrielix29/php-router)
[![discord](https://img.shields.io/discord/730148877247840346?style=flat-square)](https://discord.gg/za3EMgy)

[![github-follow](https://img.shields.io/github/followers/gabrielix29?style=social)](https://github.com/gabrielix29)
[![twitter-follow](https://img.shields.io/twitter/follow/gabrielix29?style=social)](https://twitter.com/gabrielix29)


## Installation

With Composer:
```bash
composer require gabrielix29/php-router
```

## Example

```php
<?php
require_once __DIR__ . '/../vendor/autoload.php';

use gabrielix29\Router\Router;

$router = new Router();
$router->add("%method%", "%route%", [new Controller(), "%controller method%"]); //with Controller
$router->add("%method%", "%route%", function () { //with function
  echo "message";    
});
$router->run();
```
allowed methods are: `GET`, `POST`, `PUT`, `DELETE`, `ALL` 

routes are define as regex expression
