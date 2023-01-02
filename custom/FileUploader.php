<?php

class FileUploader
{



    public static function uploadFile(string $file_to_upload, string $target_dir, string $file_name, array $options = [])
    {

        // $target_dir = ;
        $file_max_size = isset($options['file_max_size']) ? $options['file_max_size'] : 500000;
        $allowed_formats = isset($options['allowed_formats']) ? $options['allowed_formats'] : ['jpg', 'png', 'gif', 'jpeg'];

        $response['errors'] = [];
        $response['messages'] = [];

        $file_to_upload = trim($file_to_upload);
        do {
            $target_file = $target_dir . basename($_FILES["$file_to_upload"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            // Check if file already exists
            if (file_exists($target_file)) {
                $response['errors'][] = 'File already exists';
                break;
            }
            // Check file size
            if ($_FILES["$file_to_upload"]["size"] > $file_max_size) {
                $response['errors'][] = "Sorry, your file is too large.";
                break;
            }
            // Allow certain file formats
            if (!in_array($imageFileType, $allowed_formats)) {
                $response['errors'][] = "Sorry, file format is not supported.";
                break;
            }
        } while (false);

        //if there were no errors, try uploading file
        echo 'targer-file: ' . $target_file;

        if (move_uploaded_file($_FILES["$file_to_upload"]["tmp_name"], $target_file)) {
            $response['messages'][] =  "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
        } else {
            $response['errors'][] = "Sorry, there was an error uploading your file.";
        }

        return $response;
    }
}//class
