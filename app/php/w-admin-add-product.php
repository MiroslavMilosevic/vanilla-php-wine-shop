<?php

$response = [];
$insert_sucessful = false;
do {

    if (!Product::requiredParamsAreSet(['tip','naslov', 'naziv', 'opis', 'cena'])) {
        $response['errors'][] = 'all required params must be set';
        break;
    }

    $tip = trim($_POST['tip']);
    $naslov = trim($_POST['naslov']);
    $naziv = trim($_POST['naziv']);
    $opis = trim($_POST['opis']);
    $cena = trim($_POST['cena']);

    $key_value_pairs = Product::parseKeyValueInputPairs();

    $target_dir = DOCUMENT_ROOT . '/app/public/img/uploads/';
    $file_upload_response = FileUploader::uploadFile('fileToUpload', $target_dir, 'test-file-name');
    // if there were no errors while uploading file, continue insertion of product;
    if (count($file_upload_response['errors']) > 0) {
        $response['errors'][] = $file_upload_response['errors'][0];
        break;
    }

    $insert_sucessful = Product::insert($tip,$naslov, $naziv, $opis, $cena, $file_upload_response['file_path'],$key_value_pairs);
} while (false);


if($insert_sucessful){
    header("Location: " . APP_URL . '/admin');
}else{
    $user->setMessage($response['errors'][0]);
    header("Location: " . APP_URL . '/admin-add-product');
}

