<?php

/**
 * User class, used to handle user sessions and data
 */
class User
{
    public function __construct()
    {
        session_start();
        $_SESSION['session_stared'] = date('Y-m-d H:i:s');
        $_SESSION['authenticated'] = false;
        $_SESSION['permission'] = 1;

        $_SESSION['username'] = '';
        $_SESSION['email'] = '';
    }

    public function getSessionStarted()
    {
        return $_SESSION['session_stared'];
    }

    public function getAuthenticated()
    {
        return $_SESSION['authenticated'];
    }
    public function setAuthenticated(bool $authenticated)
    {
        $_SESSION['authenticated'] = $authenticated;
    }

    public function getPermission()
    {
        return $_SESSION['permission'];
    }
    public function setPermission(int $permission)
    {
        $_SESSION['permission'] = $permission;
    }

    public function getUsername()
    {
        return $_SESSION['username'];
    }
    public function setUsername(string $username)
    {
        $_SESSION['username'] = $username;
    }

    public function getEmail()
    {
        return $_SESSION['email'];
    }
    public function setEmail(string $email)
    {
        $_SESSION['email'] = $email;
    }
}
