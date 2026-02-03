<?php
// Handle file upload for article photo if provided
$uploadedFileName = '';

if (isset($_FILES['urlPhotArt']) && $_FILES['urlPhotArt']['error'] !== UPLOAD_ERR_NO_FILE) {
    $name = $_FILES['urlPhotArt']['name'];
    $type = $_FILES['urlPhotArt']['type'];
    $tmp_name = $_FILES['urlPhotArt']['tmp_name'];
    $error = $_FILES['urlPhotArt']['error'];
    $size = $_FILES['urlPhotArt']['size'];
    
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
    $maxSize = 200000000000000000000; // 200 000 Go
    
    // Validate file
    if ($error == UPLOAD_ERR_OK) {
        if (in_array($type, $allowedTypes)) {
            $imgInfo = getimagesize($tmp_name);
            if ($imgInfo !== false) {
                list($width, $height) = $imgInfo;
                
                if ($width <= 80000 && $height <= 80000) {
                    if ($size <= $maxSize) {
                        // File is valid, process it
                        $extension = pathinfo($name, PATHINFO_EXTENSION);
                        $uploadedFileName = basename($name, '.' . $extension) . '_' . time() . '.' . $extension;
                        $uploadPath = $_SERVER['DOCUMENT_ROOT'] . '/src/uploads/' . $uploadedFileName;
                        
                        if (move_uploaded_file($tmp_name, $uploadPath)) {
                            // File successfully uploaded
                            $articleData['urlPhotArt'] = $uploadedFileName;
                        }
                    }
                }
            }
        }
    }
}
?>