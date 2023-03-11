<?php
class Product implements MyModel
{
    public static function faker()
    {


        $conn = Database::instance()->getConn();

        $tipovi = ['Vino', 'Spirit', 'Dzin', 'Rakija'];
        $tip = $tipovi[rand(0, count($tipovi) - 1)];

        $naslov = MyFaker::generateRandomSentence(1, 4, 2, 10) . ' ' . uniqid(strval(rand(1, 999)));
        $naziv = MyFaker::generateRandomSentence(2, 3, 2, 10);
        $opis = MyFaker::generateRandomSentence(7, 25, 1, 12);

        $cena = rand(300, 10000);

        $sql =
            "INSERT INTO `products` 
    (
    `id`,
    `tip`, 
    `naslov`, 
    `naziv`, 
    `opis`, 
    `cena`, 
    `file_path`,
    `ostale_info`,
    `fake`
    ) 
    VALUES 
    (
     NULL, 
     '$tip', 
     '$naslov', 
     '$naziv', 
     '$opis', 
     '$cena', 
     'C:/wamp64/www/vanilla-php-wine-shop/app/public/img/uploads/vinarija-kis-kis-bermet-beli-vino-cene.jpg',
     '[]',
     '1'
    )";
        echo $sql;
        if ($conn->query($sql) === TRUE) {
            // echo "New record created successfully";
            return true;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            return false;
        }
    }

    public static function parseKeyValueInputPairs()
    {
        $tmp_post = $_POST;
        $key_value_pairs = [];
        $index_counter = 1;
        foreach ($tmp_post as $key1 => $p1) {
            $key1 = explode('-', $key1);

            if ($key1[0] == 'fieldname') {
                foreach ($tmp_post as $key2 => $p2) {
                    $key2 = explode('-', $key2);
                    if ($key2[0] == 'value' && $key1[1] == $key2[1] && $p1 != '') {
                        array_push(
                            $key_value_pairs,
                            (["$p1" => ['key' => trim($p1), 'value' => trim($p2), 'index' => trim($index_counter)]])
                        );
                        $index_counter++;
                    }
                }
            }
        }

        return $key_value_pairs;
    }

    public static function requiredParamsAreSet(array $required_params)
    {
        $status = true;
        foreach ($required_params as $rp) {
            if (!isset($_POST[trim($rp)])) {
                $status = false;
                break;
            }
        }
        return $status;
    }

    public static function insert($tip, $naslov, $naziv, $opis, $cena, $file_path, $other)
    {

        $conn = Database::instance()->getConn();

        $tip = $tip;
        $naslov =  mysqli_real_escape_string($conn, $naslov);
        $naziv =  mysqli_real_escape_string($conn, $naziv);
        $opis =  mysqli_real_escape_string($conn, $opis);
        $cena =  mysqli_real_escape_string($conn, $cena);
        $file_path = mysqli_real_escape_string($conn, $file_path);
        $other =  json_encode($other);

        $sql =
            "INSERT INTO `products` 
        (
        `id`,
        `tip`, 
        `naslov`, 
        `naziv`, 
        `opis`, 
        `cena`, 
        `file_path`,
        `ostale_info`
        ) 
        VALUES 
        (
         NULL, 
         '$tip', 
         '$naslov', 
         '$naziv', 
         '$opis', 
         '$cena', 
         '$file_path',
         '$other'
        );";

        if ($conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
            // echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    public static function getProductsWithPagination(int $current_page = 1, int $items_per_page = 8, string $search_params = '')
    {
        $conn = Database::instance()->getConn();

        $current_page = mysqli_real_escape_string($conn, $current_page);
        $items_per_page = mysqli_real_escape_string($conn, $items_per_page);
        $offset = ($current_page - 1) * $items_per_page;

        $where_part = '1';
        if (strlen($search_params) > 0) {
            $where_part = "naslov LIKE '%" . trim($search_params) . "%' || naziv LIKE '%" . trim($search_params) . "%'";
        }

        $sql = "SELECT * FROM `products` WHERE $where_part LIMIT $items_per_page OFFSET $offset;";
        $result = $conn->query($sql);
        $products = [];

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $products[] = $row;
            }
        }
        return $products;
    }

    public static function getOneProduct(int $id): array
    {
        $conn = Database::instance()->getConn();

        $id = mysqli_real_escape_string($conn, $id);
        if (!is_numeric($id)) {
            return [];
        }
        $sql = "SELECT * FROM `products` WHERE id = $id LIMIT 1";
        $result = $conn->query($sql);
        $product = [];

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $product[] = $row;
            }
        }
        if (!isset($product[0])) {
            return [];
        }
        $product = $product[0];
        $product['ostale_info'] = self::fixAdditionalInfoArray($product);
        return $product;
    }

    public static function fixAdditionalInfoArray($arr)
    {
        $additional_info = json_decode($arr['ostale_info']);
        $additional_info = json_decode(json_encode($additional_info), true);
        if (count($additional_info) <= 0) {
            return [];
        }
        $tmp = [];
        foreach ($additional_info as $el) {

            foreach ($el as $key) {
                $tmp = array_merge($tmp, [$key['key'] => $key['value']]);
            }
        }
        return $tmp;
    }

    public static function delete(int $id)
    {
        if (!is_int($id)) {
            return false;
        }
        $conn = Database::instance()->getConn();
        $stmt = $conn->prepare("DELETE FROM `product` WHERE `product`.`id` = ?");
        if (is_bool($stmt)) {
            return false;
        }
        $stmt->bind_param('i', $id);
        return $stmt->execute();
    }



    public static function getRandProductsForCarousel()
    {

        $conn = Database::instance()->getConn();
        $sql = "SELECT * FROM products
        ORDER BY RAND()
        LIMIT ".DETAILS_PAGE_CAROUSEL_NUM_OF_ITEMS."";
        $result = $conn->query($sql);
        $products = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $products[] = $row;
            }
        }
        return $products;
    }
}// class
