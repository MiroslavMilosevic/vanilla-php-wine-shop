<?php



$response = [];
$deletion_sucessful = false;
do {
    if(!isset($_GET['id'])){
        $response['errors'][] = 'Id of product neded for deletion!';
        break;
    }
    $id = intval(trim($_GET['id']));
    $deletion_sucessful = Product::delete($id);
    if (!$deletion_sucessful) {
        $response['errors'][] = 'Something went wrong during deletion of Product. Try Again.';
        break;
    }
} while (false);


if($deletion_sucessful){
    header("Location: " . APP_URL . '/admin-delete-product');
}else{
    $user->setMessage($response['errors'][0]);
    header("Location: " . APP_URL . '/admin-delete-product');
}

