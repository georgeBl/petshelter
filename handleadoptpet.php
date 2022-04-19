<?php

//handler for adopt pet 
// this handler will create a request that can be approved by a member of the website.

//connect to the database and get the $conn var.
include 'connection.php';

// prints the $_POST array to check all variables.
echo '<pre>';
print_r($_POST);
echo '</pre>';

//sanitize filters
$fullname = filter_input(INPUT_POST, 'fullname',  FILTER_SANITIZE_STRING);
$address1 = filter_input(INPUT_POST, 'address1', FILTER_SANITIZE_STRING);
$address2 = filter_input(INPUT_POST, 'address2', FILTER_SANITIZE_STRING);
$city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
$eircode = filter_input(INPUT_POST, 'eircode', FILTER_SANITIZE_STRING);
$dob = filter_input(INPUT_POST, 'dob', FILTER_SANITIZE_STRING);

//TODO:: You should check each input as shown before (see if its empty, certain size, etc.) and add erros accordingly
$error = [];

if(empty($error)){
    $sql = " INSERT INTO `adoptrequest`(`fullname`, `address1`, `address2`, `city`, `eircode`, `dob`) VALUES (?,?,?,?,?,?)";

    // prepare the statement
    $stmt = $conn->prepare($sql);

    //bind all parameters
    $stmt->bind_param("ssssss", $fullname, $address1, $address2, $city, $eircode, $dob);

    // check to see if you inserted into the database! 
    if ($stmt->execute()) { 
    // ok 
    // $count = $stmt->rowCount();
    echo $stmt->insert_id;
    } else {
    // not inserted and prints the list of errors that can occur. You have to turn off redirect if you want to be able to see this errors. 
    print_r($stmt->error_list);
    }

    $conn->close();

    header("Location: index.php");
} else{
    require_once("adoptme.php");
}
//set your SQL with prepared statements

