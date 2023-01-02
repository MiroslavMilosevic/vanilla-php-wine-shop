<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>

<body>
    <?php
    require_once(DOCUMENT_ROOT . '/views/header.php');
    Router::redirectToLoginIfNotAuthenticated($user);
    ?>
    
    <h1>Admin</h1>
    <a href="admin-add-product">Add Product</a>



</body>

</html>