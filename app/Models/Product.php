<?php
class Product
{

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

    public static function addProduct($tip,$naslov, $naziv, $opis, $cena, $file_path, $other)
    {

        $conn = Database::instance()->getConn();

        $tip = $tip;
        $naslov =  mysqli_real_escape_string($conn,$naslov);
        $naziv =  mysqli_real_escape_string($conn,$naziv);
        $opis =  mysqli_real_escape_string($conn,$opis);
        $cena =  mysqli_real_escape_string($conn,$cena);
        $file_path = mysqli_real_escape_string($conn,$file_path);
        $other =  json_encode($other);


        $sql =
            "INSERT INTO `product` 
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

        echo '<pre>';
        print_r($sql);
        echo '</pre>';

        if ($conn->query($sql) === TRUE) {
            // echo "New record created successfully";
            return true;
        } else {
            return false;
            // echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }


    public static function getProductsWithPagination($current_page = 1, $items_per_page = 1, $search_params = [])
    {
        $conn = Database::instance()->getConn();

        $current_page = mysqli_real_escape_string($conn, $current_page);
        $items_per_page = mysqli_real_escape_string($conn, $items_per_page);
        // $current_page = mysqli_real_escape_string($conn, $current_page);

        $sql = "SELECT * FROM `product` WHERE 1 LIMIT 8 OFFSET 0;";
        $result = $conn->query($sql);

        $products = [];

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              $products[] = $row;
            }
          }


          return $products;
    }

}// class
