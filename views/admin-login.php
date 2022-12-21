<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    Importer::importCSS();
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
</head>

<body>
    <h1>Admin Login</h1>


    <form action="">
        <?php
        require_once('include/admin-login-form.php');
        ?>
    </form>
</body>

</html>