<?php

echo '<pre>';
print_r($_POST);
echo '</pre>';

$response = [];



do {

    if (
        !isset($_POST['naslov']) ||
        !isset($_POST['naziv']) ||
        !isset($_POST['opis']) ||
        !isset($_POST['cena']) 
    
    ) {
        $response = ['error' => ['all required params must be set']];
        break;
    }

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

    echo '<pre>';
    print_r($_FILES);
    echo '</pre>';
    // $target_dir = "uploads/";
    // $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    // $uploadOk = 1;
    // $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


} while (false);
