<!doctype html>

<?php
    //make sure there is an ID in the link, so you can acccess details on the pet

    if(empty($_GET['id'])){
        header("Location: index.php");
    }
    //make sure id is an integer, positive and is not too large(try to avoid letting a user insert an impossibly long number);
    if($_GET['id'] <= 0 || $_GET['id'] > 100000){
        header("Location: index.php");
    }
    //instead of sending the user to the index page when there is an error, you could also let the user know of the issue and reddirect to a specific page (like a 404 page)
    // header ("Location: notallowed.php");

    //get pet details by ID
    include "connection.php";
    $sql = "SELECT * FROM pet WHERE id=".$_GET['id'];
    $result = $conn->query($sql);
    $pet = $result->fetch_assoc();

    //if there is no pet with that id send user back to index
    if(empty($pet)){
        header("Location: index.php");
    }
    //if the pet is adopted, you should also send the user to the home page.
    //insert code here!!!!



    
    // else it will continue below

?>


<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Pet shelter</title>
  </head>
  <body>
    <?php include 'navbar.php' ?>
    <div class="container">
       <h1>Adopt <?=$pet['name'] ?></h1>
       <div class="row">
           <div class="col-6">
                <!-- we will check this form using jQuery -->
                <!-- jQuery is a JavaScript library for browsers that helps with handeling and manipulating HTML tags using significantly less code-->
                <!-- see details on their doc page:  https://api.jquery.com/ -->
                <form method="post" action="handleadoptpet.php" >
                    <div class="mb-3">
                        <label for="forName" class="form-label">Full Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="fullname"  name="fullname" aria-describedby="nameInput">
                    </div>
                    <!-- instead of this, you could also use a address finder input - there are examples online -->
                    <div class="mb-3">
                        <label for="forName" class="form-label">Address Line 1 <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id=""  name="address1" aria-describedby="nameInput">
                    </div>
                    <div class="mb-3">
                        <label for="forName" class="form-label">Address Line 2</label>
                        <input type="text" class="form-control" id=""  name="address2" aria-describedby="nameInput">
                    </div>
                    <div class="mb-3">
                        <label for="forName" class="form-label">City <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id=""  name="city" aria-describedby="nameInput">
                    </div>
                    <div class="mb-3">
                        <label for="forName" class="form-label">Eircode</label>
                        <input type="text" class="form-control" id=""  name="eircode" aria-describedby="nameInput">
                    </div>
                    <div class="mb-3">
                        <label for="forName" class="form-label">Date of birth <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id=""  name="dob" aria-describedby="nameInput">
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Request addoption</button>
                </form>
           </div>
           <div class="col-6">
                <img src=" <?=$pet['image'] ?>" class="img-fluid" alt="Responsive image">
                <p style="font-style: italic"><?=$pet['description'] ?> </p>
                <p style="font-weight: bold">Age: <?= $pet['age']?> </p>
           </div>
       </div>

  
       
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>