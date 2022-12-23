<?php
class Importer
{
    /**
     * Extracts path from $_SERVER['REQUEST_URI'] and removes PART_TO_REMOVE_FROM_PATH 
     */
    public static function importCSS(string $file_name)
    {
        echo "<style>";
        include(DOCUMENT_ROOT . '/app/public/css/'.trim($file_name));
        echo "</style>";
    }

   /**
     * Extracts path from $_SERVER['REQUEST_URI'] and removes PART_TO_REMOVE_FROM_PATH 
     */
    public static function importHeader()
    {
    require_once(DOCUMENT_ROOT . '/views/header.php');
    }
}
