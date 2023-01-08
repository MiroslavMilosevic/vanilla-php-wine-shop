<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    Importer::importCSS('admin-login-form.css');
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
</head>

<body>
    <?php
     require_once(DOCUMENT_ROOT . '/views/header.php');
    ?>
    <h1>Admin Login</h1>
    <form action="<?php echo APP_URL . '/php/w-admin-login' ?>" method="POST">
        <div class="login">
            <input type="text" placeholder="Username" id="username" name="username">
            <input type="password" placeholder="password" id="password" name="password">
            <input type="submit" value="Log In">
            <p><?php echo $user->getMessage() ?></p>
        </div>
        <div class="shadow"></div>
    </form>
    <?php
        require_once(DOCUMENT_ROOT . '/views/footer.php');
    ?>
</body>

</html>