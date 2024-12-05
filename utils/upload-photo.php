<?php

global $conn ;
require_once '../utils/connection.php'; 



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $conn->real_escape_string($_POST['title']);
    $description = $conn->real_escape_string($_POST['description']);
    $file_name = $_FILES ['photo']['name'];
    $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/uploads/";
    $target_file = $target_dir . $file_name; // Jalur absolut untuk move_uploaded_file
    $upload_path = "/uploads/" . $file_name; // Jalur relatif untuk disimpan di database
    
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
    if (file_exists($target_file)) {
        echo "File sudah ada.";
        $uploadOk = 0;
    }

    
    if ($_FILES["photo"]["size"] > 2000000) {
        echo "Ukuran file terlalu besar.";
        $uploadOk = 0;
    }

  
    if (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
        echo "Hanya file JPG, JPEG, PNG & GIF yang diperbolehkan.";
        $uploadOk = 0;
    }

 
    if ($uploadOk == 1) {
        if(!file_exists($target_dir)) {
            mkdir($target_dir, 0755, true);
        }

        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
            
            $sql = "INSERT INTO photos (photo_name, description, photo_path) VALUES ('$title', '$description', '$upload_path')";
            if ($conn->query($sql) === TRUE) {
                echo "Data berhasil disimpan.";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Ada masalah saat mengunggah file.";
        }
    }
}

$conn->close();
?>
