<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    require_once(DOCUMENT_ROOT . '/views/header.php');
    ?>



    <div>
        <?php
        $products = Product::getProductsWithPagination();
        ?>
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