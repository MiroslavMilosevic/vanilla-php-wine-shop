<?php
class Router
{


    /**
     * Extracts path from $_SERVER['REQUEST_URI'] and removes PART_TO_REMOVE_FROM_PATH 
     * defined in const file if that value is different from ''
     * Only first occurrence of string is removed from URL
     * @return String
     */
    public static function getPath()
    {
        $path = parse_url($_SERVER['REQUEST_URI'])['path'];

        if (PART_TO_REMOVE_FROM_PATH != '') {
            $path = explode(PART_TO_REMOVE_FROM_PATH, $path, 2)[1];
        }
        if (substr($path, -1) == '/' && strlen($path) > 1) {
            $path = substr($path, 0, -1);
        }

        return $path;
    }


    /**
     * redirects to login page if user is not authenticated
     * @return void
     */
    public static function redirectToLoginIfNotAuthenticated($user)
    {
        if (!$user->getAuthenticated()) {

            // needs to be better understod
            // header("Location: admin-login");
            header("Location: " . APP_URL . 'admin-login');
            die();
        }
    }
}
