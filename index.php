

<?php 
    include "connection.php";

    $sql = "SELECT * FROM pet";

    $result = $conn->query($sql);

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Pet shelter</title>
  </head>
  <body>
      <?php include 'navbar.php' ?>
    <div class="container">
        <div class="row">

            <?php
                if($result->num_rows>0){
                    while($row = $result->fetch_assoc()){
                        echo '<div class="col-3">';
                            echo '<div class="card" style="width: 18rem;">';
                                echo '<img src="'.$row['image'].'" class="card-img-top" style="width:100%; height:250px" alt="..." />';
                                echo '<div class="card-body">';
                                    echo '<h5 class="card-title">'.$row['name'].'</h5>';
                                    echo '<p class="card-text">'.$row['description'].' </p>';
                                    echo '<a href="adoptMe.php?id='.$row['id'].'" class="btn btn-primary">Adopt me</a>';
                                    echo '<a href="editPet.php?id='.$row['id'].'" class="btn btn-success">Edit</a>';
                                    echo '<a href="deletePet.php?id='.$row['id'].'" class="btn btn-danger">Delete</a>';
                               
                                    echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    }
                }

            ?>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>


