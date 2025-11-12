<?php
include "connect.php";
$db = koneksidatabase();
// $sql = "INSERT INTO kumpulantabel (file) VALUES ('foto.jpg')";
// $db->exec($sql);
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['user_file'])) {
    $temp_name = $_FILES['user_file']['tmp_name'];
    $file_name = $_FILES['user_file']['name'];
    $upload_dir = 'uploads/'; // Directory where files will be stored
    $destination = $upload_dir . $file_name;

    // Ensure the upload directory exists and has write permissions
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }
    if (move_uploaded_file($temp_name, $destination)) {
        echo "File '$file_name' uploaded successfully!";
    } else {
        echo "Error uploading file.";
        // You can add more specific error handling here, e.g., checking $_FILES['user_file']['error']
    }
}
?>

<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="user_file">
    <input type="submit" value="Upload File">
</form>