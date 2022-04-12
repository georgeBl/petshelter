<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Pet Shelter</title>
  </head>
  <body>
      <!-- Load the nav bar -->
    <?php include 'navbar.php';
    
    class Dog {
      public $name;
      public $description;
      
      public function __construct($n, $d){
          $this->name = $n;
          $this->description = $d;
      }

    }
    $dog1 = new Dog("Max", "I like to play a lot");
    $dog2 = new Dog("Jes", "I am serious");
    $dog3 = new Dog("Mini", "Tinity mini");


    ?>

    <?php 
    //allows for more than 1 command and 
    //does not print anything on to the screen
    ?>
    <?= "test" //only 1 command  and it will echo out on the screen   ?>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img src="uploads/img1.jpeg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $dog1->name ?></h5>
                        <p class="card-text"><?= $dog1->description ?></p>
                        <a href="#" class="btn btn-primary">Adopt now</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img src="uploads/img1.jpeg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $dog2->name ?></h5>
                        <p class="card-text"><?= $dog2->description ?></p>
                        <a href="#" class="btn btn-primary">Adopt me</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img src="uploads/img1.jpeg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $dog3->name ?></h5>
                        <p class="card-text"><?= $dog3->description ?></p>
                        <a href="#" class="btn btn-primary">Adopt me</a>
                    </div>
                </div>
            </div>
        </div>
        
    </div>










    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>