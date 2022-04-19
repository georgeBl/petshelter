

<?php 
    include "connection.php";


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Pet shelter Log In</title>
  </head>
  <body>
      <?php include 'navbar.php' ?>
    <div class="container">
        <div class="row">
            <!-- Log in form! This form resets if the username or password is wrong, you could add a value prop to the username input so it doesn't reset -->
            <form method="post" action="handlelogin.php" >
                <div class="mb-3">
                    
                            <label for="forUserName" class="form-label">User Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="username"  name="username" aria-describedby="usernameInput">
                           
                </div>
                <div class="mb-3">
                            <label for="forPassword" class="form-label">Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="password"  name="password" aria-describedby="passwordInput">
                   
                </div>
                <span class="text-danger"><?= isset($error['login']) ? $error['login'] : '' ?> </span>
                <button type="submit" class="btn btn-primary">Log In</button>
            </form>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>


