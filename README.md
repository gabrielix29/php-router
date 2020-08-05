# PHP-Router

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
```
allowed methods are: `GET`, `POST`, `PUT`, `DELETE`, `ALL` 

routes are define as regex expression
