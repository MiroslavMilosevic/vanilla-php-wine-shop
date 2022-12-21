<?php
class Importer
{



    /**
     * Extracts path from $_SERVER['REQUEST_URI'] and removes PART_TO_REMOVE_FROM_PATH 
     */
    public static function importCSS()
    {
        echo "<style>";
        include(DOCUMENT_ROOT . '/app/public/css/admin-login-form.css');
        echo "</style>";
    }
}
