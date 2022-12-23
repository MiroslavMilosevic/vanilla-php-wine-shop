<?php

/**
 * User class, used to handle user sessions and data
 */
class User
{
    public function __construct()
    {
        if (session_id() == '') {

            session_start();

            $_SESSION['session_stared'] = isset($_SESSION['session_stared']) ? $_SESSION['session_stared'] : date('Y-m-d H:i:s');
            $_SESSION['pid'] = isset($_SESSION['pid']) ? $_SESSION['pid'] : -1;
            $_SESSION['authenticated'] = isset($_SESSION['authenticated']) ? $_SESSION['authenticated'] : false;

            $_SESSION['type'] = isset($_SESSION['type']) ? $_SESSION['type'] : 'normal';

            $_SESSION['username'] = isset($_SESSION['username']) ? $_SESSION['username'] : '';
            $_SESSION['email'] = isset($_SESSION['email']) ? $_SESSION['email'] : '';

            $_SESSION['message'] = isset($_SESSION['message']) ? $_SESSION['message'] : '';

        }
    }

    public function getSessionStarted()
    {
        return $_SESSION['session_stared'];
    }

    public function getPid()
    {
        return $_SESSION['pid'];
    }
    public function setPid(bool $pid)
    {
        $_SESSION['pid'] = $pid;
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

    public function getType()
    {
        return $_SESSION['type'];
    }
    public function setType(string $type)
    {
        $_SESSION['type'] = $type;
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
    public function setEmail($email)
    {
        $_SESSION['email'] = $email;
    }

    public function getMessage()
    {
        return $_SESSION['message'];
    }
    public function setMessage($message)
    {
        $_SESSION['message'] = $message;
    }

    // USER RELATED METHODS

    public static function tryLogIn($post)
    {
        $conn = Database::instance()->getConn();

        $username = trim($post['username']);
        $password = trim($post['password']);

        $sql = "SELECT * FROM users WHERE `username`= ? AND `password` = ?"; // SQL with parameters
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result(); // get the mysqli result
        $db_user = null;

        if ($result->num_rows == 1) {
            $db_user = $result->fetch_assoc();
        }

        return $db_user;
    }

    
    public static function LogOut()
    {
        session_destroy();
    }
}
