<?php

$user_db = User::tryLogIn($_POST);

if ($user_db == null) {
    $user->setmessage('wrong username or password');
    header("Location: " . APP_URL . '/admin');
} else {
    $user->setPid($user_db['id']);
    $user->setAuthenticated(true);
    $user->setUsername($user_db['username']);
    $user->setType($user_db['type']);
    $user->setEmail($user_db['email']);
    $user->setmessage('');
    header("Location: " . APP_URL . '/admin');
    die();
}
