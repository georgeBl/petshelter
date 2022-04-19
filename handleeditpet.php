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
$adopted = $_POST['adopted'];
$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
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
if(!isset($type) || empty($type)){
    $error['type'] = 'Type is required';
}
if(!isset($race) || empty($race)){
    $error['race'] = 'Race is required';
}
// if(!isset($adopted) || empty($adopted)  ){
    
//     $error['adopted'] = 'Adopted is required';
// }

if(empty($error)){
    $sql = " UPDATE pet 
        SET name=?, description =?, age=?, type=?, race=?, adopted=? 
        WHERE id=?";
    $stmt= $conn->prepare($sql);
   
    $stmt->bind_param("ssissbi", $name, $description, $age, $type, $race, $adopted, $id);
    
    $stmt->execute();
    $conn->close();

    header("Location: index.php");
} else{
    require_once("editPet.php");
}
