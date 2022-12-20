<?php
require_once(__DIR__ . '/consts.php');
require_once(__DIR__ . '/custom/Router.php');
require_once(__DIR__ . '/custom/User.php');

$path = Router::getPath();
$user = new User();

echo '<pre>';
print_r($path);
print_r($_SESSION);
echo '</pre>';


switch ($path) {
  case '/':
    echo 'home';
    break;
  case '/test1':
    echo 'test1';
    break;
  case '/test2':
    echo 'test2';
    break;


  default:
    echo '404 page';
}
