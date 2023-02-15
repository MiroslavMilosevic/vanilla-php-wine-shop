<?php
set_time_limit(10);
require_once($_SERVER['DOCUMENT_ROOT'] . '/vanilla-php-wine-shop/consts.php');
require_once(DOCUMENT_ROOT . '/custom/Database.php');
require_once(DOCUMENT_ROOT . '/custom/Router.php');
require_once(DOCUMENT_ROOT . '/custom/User.php');
require_once(DOCUMENT_ROOT . '/custom/Importer.php');
require_once(DOCUMENT_ROOT . '/custom/FileUploader.php');
require_once(DOCUMENT_ROOT . '/custom/MyModel.php');
require_once(DOCUMENT_ROOT . '/custom/MyFaker.php');

require_once(DOCUMENT_ROOT . '/app/Models/Product.php');

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
  case '/admin-add-product':
    require_once(DOCUMENT_ROOT . '/views/admin-add-product.php');
    break;
  case '/admin-delete-product':
    require_once(DOCUMENT_ROOT . '/views/admin-delete-product.php');
    break;
  case '/detail':
    require_once(DOCUMENT_ROOT . '/views/detail.php');
    break;
    // internal php logic
  case '/php/w-admin-login':
    require_once(DOCUMENT_ROOT . '/app/php/w-admin-login.php');
    break;
  case '/php/w-admin-logout':
    require_once(DOCUMENT_ROOT . '/app/php/w-admin-logout.php');
    break;
  case '/php/w-admin-add-product':
    require_once(DOCUMENT_ROOT . '/app/php/w-admin-add-product.php');
    break;
  case '/php/w-admin-delete-product':
    require_once(DOCUMENT_ROOT . '/app/php/w-admin-delete-product.php');
    break;
    // internal php logic
    //exec
    case '/exec':
      require_once(DOCUMENT_ROOT . '/app/exec.php');
      break;
    //exec
    // static content
    // static content


  default:
    echo '404 page';
}
