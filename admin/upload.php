<?php
$id = $_GET['id']
    
?>

<!DOCTYPE html>
<html>
<body>

<form action="upload_pic.php?id=<?=$id?>" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>