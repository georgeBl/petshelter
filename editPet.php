

<?php 
    include "connection.php";

    if(isset($_GET['id']) || ! empty($_GET['id']) ){
        $id = $_GET['id'];
    }
   
    $sql = "SELECT * FROM pet WHERE id=".$id;
    $result = $conn->query($sql);
    $pet = $result->fetch_assoc();
    // echo '<pre>';
    // print_r($pet['name']);
    // echo '</pre>';

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
        <h3>Edit Pet</h3>
        <form method="post" action="handleeditpet.php" enctype="multipart/form-data">
            <input type="hidden" value="<?=$id?>" name="id">
            <div class="mb-3">
                <label for="forName" class="form-label">Pet Name</label>
                <input  type="text" 
                        class="form-control" 
                        id=""  
                        name="name" 
                        aria-describedby="nameInput" 
                        value="<?= $pet['name'] ?>"
                        >
                <span class="text-danger"><?= (isset($error['name']))? $error['name'] : '' ?></span>
            </div>
            <div class="mb-3">
                <label for="forType" class="form-label">Pet Type</label>
                <select class="form-select"  name="type" aria-label="Default select example">
                    <option>Select a pet type</option>
                    <option <?= ($pet['type'] === 'dog')? 'selected' : NULL ?> value="dog">Dog</option>
                    <option <?= ($pet['type'] === 'cat')? 'selected' : NULL ?> value="cat">Cat</option>
                    <option <?= ($pet['type'] === 'rabbit')? 'selected' : NULL ?> value="rabbit">Rabbit</option>
                    <option <?= ($pet['type'] === 'snake')? 'selected' : NULL ?> value="snake">Snake</option>
                    <option <?= ($pet['type'] === 'fish')? 'selected' : NULL ?> value="fish">Fish</option>
                </select>
                <span class="text-danger"><?= (isset($error['type']))? $error['type'] : '' ?></span>
            </div>
            <div class="mb-3">
                <label for="forRace" class="form-label">Pet Race</label>
                <input  type="text" 
                        class="form-control" 
                        id="" 
                        name="race" 
                        value="<?= $pet['race'] ?>"
                        aria-describedby="raceInput"
                 >
                 <span class="text-danger"><?= (isset($error['race']))? $error['race'] : '' ?></span>
            </div>
            <div class="form-floating">
                <textarea class="form-control" placeholder="Leave description here" name="description" id="" style="height: 100px"><?= $pet['description']?></textarea>
                <label for="forDescription">Description</label>
                <span class="text-danger"><?= (isset($error['description']))? $error['description'] : '' ?></span>
            </div>
            <div class="mb-3">
                <label for="forAge" class="form-label">Pet Age</label>
                <input type="number" value="<?= $pet['age'] ?>" class="form-control" id=""  name="age" aria-describedby="ageInput">
                <span class="text-danger"><?= (isset($error['age']))? $error['age'] : '' ?></span>
            </div>
            <div class="mb-3">
                <label for="forAdopted" class="form-label">Pet Adopted?</label>
                <select class="form-select"  name="adopted" aria-label="Default select example">
                    <option <?= ($pet['adopted'] === true)? 'selected' : NULL ?> value="1">Adopted</option>
                    <option <?= ($pet['adopted'] === false)? 'selected' : NULL ?> value="0">Not Adopted</option>
                </select>
                <span class="text-danger"><?= (isset($error['adopted']))? $error['adopted'] : '' ?></span>
            </div>            
            <button type="submit" class="btn btn-primary">Submit pet</button>
        </form>
    </div>

         




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>


