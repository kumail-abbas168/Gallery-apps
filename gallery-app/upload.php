<?php
include "config.php";

if(isset($_POST['submit'])) {
    $targetDir = "uploads/";
    $fileName = basename($_FILES["image"]["name"]);
    $targetFilePath = $targetDir . $fileName;

    if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
        $sql = "INSERT INTO images (filename) VALUES ('$fileName')";
        if($conn->query($sql)) {
            header("Location: index.php?msg=success");
        } else {
            echo "Database error";
        }
    } else {
        echo "Upload failed";
    }
}
?>
