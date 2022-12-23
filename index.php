<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/vanilla-php-wine-shop/consts.php');
require_once(DOCUMENT_ROOT . '/custom/Database.php');
require_once(DOCUMENT_ROOT . '/custom/Router.php');
require_once(DOCUMENT_ROOT . '/custom/User.php');
require_once(DOCUMENT_ROOT . '/custom/Importer.php');


$path = Router::getPath();
$user = new User();

switch ($path) {
  case '/':
    require_once(DOCUMENT_ROOT .  '/views/home.php');
    break;
  case '/home':
    require_once(DOCUMENT_ROOT .  '/views/home.php');
    break;
  case '/admin':
    require_once(DOCUMENT_ROOT .  '/views/admin.php');
    break;
  case '/admin-login':
    require_once(DOCUMENT_ROOT . '/views/admin-login.php');
    break;
  // internal php logic
  case '/php/w-admin-login':
    require_once(DOCUMENT_ROOT . '/app/php/w-admin-login.php');
    break;
  case '/php/w-admin-logout':
    require_once(DOCUMENT_ROOT . '/app/php/w-admin-logout.php');
    break;
  // internal php logic
  // static content
  case '/blabla.css':
    require_once(DOCUMENT_ROOT . '/app/public/css/blabla.css');
    break;
  case '/php/w-admin-logout':
    require_once(DOCUMENT_ROOT . '/app/php/w-admin-logout.php');
    break;
    // static content
    

  default:
    echo '404 page';
}
