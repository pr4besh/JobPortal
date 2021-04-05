<?php
$target_dir = "elearning/";
$target_file = $target_dir . basename($_FILES["myfile"]["name"]);
$size = $_FILES['myfile']['size'];
$filename = $_FILES['myfile']['name'];
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = $_FILES["myfile"]["tmp_name"];
  if($check !== false) {
    $uploadOk = 1;
  } else {
    echo'<script>alert("Error uploading data!")</script>';
    $uploadOk = 0;
    echo'<script>window.location ="elearning.php"</script>';
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo'<script>alert("Sorry, file already exists.")</script>';
  $uploadOk = 0;
  echo'<script>window.location ="elearning.php"</script>';
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "pdf"
&& $imageFileType != "gif" && $imageFileType != "docx" && $imageFileType != "xlsx" && $imageFileType != "zip") {
  echo'<script>alert("Sorry, only DOC, EXCEL, JPG, JPEG, PNG, PDF, ZIP & GIF files are allowed.")</script>';
  $uploadOk = 0;
  echo'<script>window.location ="elearning.php"</script>';
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo'<script>alert("Sorry, your file was not uploaded.")</script>';
  echo'<script>window.location ="elearning.php"</script>';

// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["myfile"]["tmp_name"], $target_file)){
    echo'<script>alert("The file '. htmlspecialchars( basename( $_FILES['myfile']['name'])). ' has been uploaded.")</script>';
    echo'<script>window.location ="elearning.php"</script>';
  } else {
    echo'<script>alert("Sorry, there was an error uploading your file.")</script>';
    echo'<script>window.location ="elearning.php"</script>';
  }
}
?>
