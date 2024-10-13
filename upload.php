<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if the file was uploaded without errors
    if (isset($_FILES['fileToUpload']) && $_FILES['fileToUpload']['error'] == 0) {
        // Retrieve file details
        $fileName = $_FILES['fileToUpload']['name'];
        $fileType = $_FILES['fileToUpload']['type'];
        $fileSize = $_FILES['fileToUpload']['size'];
        $fileTmpPath = $_FILES['fileToUpload']['tmp_name'];
        
        // Define the directory where the file will be uploaded
        $uploadDir = 'uploads/';
        $uploadFilePath = $uploadDir . basename($fileName);
        
        // Create the uploads directory if it doesn't exist
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // Move the uploaded file to the server's upload directory
        if (move_uploaded_file($fileTmpPath, $uploadFilePath)) {
            echo "<div class='container mt-5'>
                    <h3>File Uploaded Successfully!</h3>
                    <p>Original Name: $fileName</p>
                    <p>File Type: $fileType</p>
                    <p>File Size: " . number_format($fileSize / 1024, 2) . " KB</p>
                  </div>";
        } else {
            echo "<div class='container mt-5'><p>Error: Failed to upload file.</p></div>";
        }
    } else {
        echo "<div class='container mt-5'><p>Error: No file uploaded or there was an issue with the upload.</p></div>";
    }
}
?>