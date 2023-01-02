<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add new Product</title>
</head>

<body>
    <h1>Add new Product</h1>
    <form action="<?php echo APP_URL . '/php/w-admin-add-product' ?>" method="POST" enctype="multipart/form-data">

    <input type="text" name="naslov" id="naslov" placeholder="naslov" required>
    <br>
    <input type="text" name="naziv" id="naziv" placeholder="naziv" required>
    <br>
    <input type="text" name="opis" id="opis" placeholder="opis" required>
    <br>
    <input type="number" name="cena" id="cena" placeholder="cena" required>
    <br>
    <input type="file" name="fileToUpload" id="fileToUpload" value="slika">
    <!-- accept="image/png, image/jpeg, image/jpg" -->
    <br>
    <input type="submit" value="Dodaj Proizvod">
    <br><br>
    <button id="add-field">Dodaj Polje</button>
    <div class="additional-fields-wrapper" id="additional-fields-wrapper">
    <p id="p1">
        <input type="text" name="fieldname-1">
        <span> : </span>
        <input type="text" name="value-1">
    </p>
    <p id="p2">
        <input type="text" name="fieldname-2">
        <span> : </span>
        <input type="text" name="value-2">
    </p>
    <p id="p3">
        <input type="text" name="fieldname-3">
        <span> : </span>
        <input type="text" name="value-3">
    </p>
    <p id="p4">
        <input type="text" name="fieldname-4">
        <span> : </span>
        <input type="text" name="value-4">
    </p>
    </div>
    </form>



    <?php
    Importer::importJS('admin/add-product.js');
    ?>
</body>

</html>