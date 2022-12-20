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

        return $path;
    }
}
