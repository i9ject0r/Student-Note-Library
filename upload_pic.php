<?php
$id = $_GET['id'];

$target_dir = "assets/img/$id/";
$target_file = $target_dir . "profile_pic.png";

if(!is_dir($target_dir)) {
    if(mkdir($target_dir, 0777, true));
}

$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

if($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
    echo "Sorry, only JPG, PNG, JPEG, & GIF files are allowed.";
    $uploadOk = 0;
}

if($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
} else {
    if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        header("Location: list_user.php");
        exit();
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>