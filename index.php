

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
    <script>
        // to insert a pop-up if you want to delete 
        const askDeleted = (id) => {
            console.log(`You will delete pet with id: ${id}`);
            if(confirm("Are you sure you want to delete?")){
                window.location.href = "deletePet.php?id=" + id;
            }
        }
        

    </script>
    <title>Pet shelter</title>
  </head>
  <body>
      <?php include 'navbar.php' ?>
    <div class="container">
        <div class="row">

            <?php
                if($result->num_rows>0){
                    while($row = $result->fetch_assoc()){
                        // make sure you don't render the pet that is adopted.
                        echo '<div class="col-3">';
                            echo '<div class="card" style="width: 18rem;">';
                            //an example of conditional rendering depending on a variable (if you have access to it or not)
                                if($row['image'] == ''){
                                    //show default image in case the pet doesn't have an image
                                echo '<img src="uploads/default.jpg" class="card-img-top" style="width:100%; height:250px" alt="..." />';
                                }else {
                                    
                                echo '<img src="'. $row['image'] .'" class="card-img-top" style="width:100%; height:250px" alt="..." />';
                                }
                                echo '<div class="card-body">';
                                    echo '<h5 class="card-title">'.$row['name'].'</h5>';
                                    echo '<p class="card-text">'.$row['description'].' </p>';
                                    echo '<a href="adoptMe.php?id='.$row['id'].'" class="btn btn-primary">Adopt me</a>';
                                    echo '<a href="editPet.php?id='.$row['id'].'" class="btn btn-success">Edit</a>';
                                    echo '<button href="" class="btn btn-danger" onclick="askDeleted('.$row['id'].')" >Delete</button>';
                               
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


