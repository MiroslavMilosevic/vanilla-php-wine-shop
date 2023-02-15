<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h1>Delete Product</h1>
    <?php
    require_once(DOCUMENT_ROOT . '/views/header.php');
    ?>
    <p><a href="admin">admin</a></p>
    <p id="error-message"><?php echo $user->getMessage() ?></p>

    <div>
        <?php
        $products = [];
        $search = '';
        if (isset($_GET['search'])) {
            $search = trim($_GET['search']);
        }

        if (isset($_GET['page']) && is_int(intval($_GET['page'])) && intval($_GET['page']) > 0) {


            $products = Product::getProductsWithPagination(intval($_GET['page']), 8, $search);
        } else {
            $products = Product::getProductsWithPagination(1, 8, $search);
        }
        ?>
        <form action="<?php echo APP_URL . '/admin-delete-product' ?>" method="GET">
            <input type="text" name="search" name="search" placeholder="Pretraga po nazivu">
            <input type="submit" value="Pretrazi">
        </form>
        <?php
        foreach ($products as $p) {
        ?>

            <p>
                Naslov:<?php
                        echo $p['naslov'];
                        ?>
            </p>
            <p>
                Opis:<?php
                        echo $p['opis'];
                        ?>
            </p>
            <p>
                Cena:<?php
                        echo $p['cena'];
                        ?>
            </p>
            <form action="<?php echo APP_URL . '/php/w-admin-delete-product' ?>" method="GET">
                <input type="hidden" name="id" value="<?php echo $p['id'] ?>">
                <input type="submit" value="OBRISI PROIZVOD">
            </form>
            <br><br><br>
        <?php
        }
        ?>
    </div>



    <?php
    require_once(DOCUMENT_ROOT . '/views/footer.php');
    ?>
</body>

</html>