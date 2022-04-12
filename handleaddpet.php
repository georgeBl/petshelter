<?php 

include 'connection.php';
// echo '<pre>';
// print_r($_POST);
// echo '</pre>';

$name = filter_input(INPUT_POST, 'name',  FILTER_SANITIZE_STRING);
$description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
$age = filter_input(INPUT_POST, 'age', FILTER_SANITIZE_NUMBER_INT);
$type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_STRING);
$race = filter_input(INPUT_POST, 'race', FILTER_SANITIZE_STRING);

//declare the error array
$error =[];

if(!isset($name) || empty($name)){
    $error['name'] = 'Pet name is required';
}
if(!isset($description) || empty($description)){
    $error['description'] = 'Description is required';
}
if(!isset($age) || empty($age)){
    $error['age'] = 'Age is required';
}
$adopted = false;


$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["image"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["image"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}


if(empty($error)){

    $sql = "INSERT INTO pet (name, type, race, age, description, adopted, image ) 
            VALUES (?,?,?,?,?,?,?)";

    $stmt= $conn->prepare($sql);

    $stmt->bind_param("sssisbs",  $name,$type,$race, $age, $description, $adopted, $target_file);

    $stmt->execute();
    $conn->close();

    header("Location: index.php");
} else{
    echo '<pre>';
    print_r($error);
    echo '</pre>';
    require_once("addpet.php");
}
