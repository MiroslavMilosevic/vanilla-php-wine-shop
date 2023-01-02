<?php
class Importer
{
    /**
     * Class for importing static files
     */
    public static function importCSS(string $file_name)
    {
        echo "<style>";
        include(DOCUMENT_ROOT . '/app/public/css/'.trim($file_name));
        echo "</style>";
    }


    public static function importJS(string $file_name)
    {
        echo "<script>";
        include(DOCUMENT_ROOT . '/app/public/js/'.trim($file_name));
        echo "</script>";
    }
//    /**
//      * Extracts path from $_SERVER['REQUEST_URI'] and removes PART_TO_REMOVE_FROM_PATH 
//      */
//     public static function importHeader()
//     {
//     require_once(DOCUMENT_ROOT . '/views/header.php');
//     }
}
