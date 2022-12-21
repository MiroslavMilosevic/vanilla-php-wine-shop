<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/vanilla-php-wine-shop/consts.php');
require_once(DOCUMENT_ROOT . '/custom/Router.php');
require_once(DOCUMENT_ROOT . '/custom/User.php');
require_once(DOCUMENT_ROOT . '/custom/Importer.php');

$path = Router::getPath();
$user = new User();


  //      echo '<link rel="stylesheet" href="' . DOCUMENT_ROOT . '/app/public/css/admin-login-form.css ' . '>';
// echo  DOCUMENT_ROOT . '/app/public/css/admin-login-form.css';
switch ($path) {
  case '/':
    require_once(DOCUMENT_ROOT .  '/views/home.php');
    break;
  case '/admin':
    require_once(DOCUMENT_ROOT .  '/views/admin.php');
    break;
  case '/admin-login':
    require_once(DOCUMENT_ROOT . '/views/admin-login.php');
    break;
  default:
    echo '404 page';
}
