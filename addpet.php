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
       <h1>Add pet page</h1>

       <form method="post" action="handleaddpet.php" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="forName" class="form-label">Pet Name</label>
                <input type="text" class="form-control" id=""  name="name" aria-describedby="nameInput">
            </div>
            <div class="mb-3">
                <label for="forType" class="form-label">Pet Type</label>
                <select class="form-select"  name="type" aria-label="Default select example">
                    <option selected>Select a pet type</option>
                    <option value="dog">Dog</option>
                    <option value="cat">Cat</option>
                    <option value="rabbit">Rabbit</option>
                    <option value="snake">Snake</option>
                    <option value="fish">Fish</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="forRace" class="form-label">Pet Race</label>
                <input type="text" class="form-control" id=""  name="race" aria-describedby="raceInput">
            </div>
            <div class="form-floating">
                <textarea class="form-control" placeholder="Leave description here" name="description" id="" style="height: 100px"></textarea>
                <label for="forDescription">Description</label>
            </div>
            <div class="mb-3">
                <label for="forAge" class="form-label">Pet Age</label>
                <input type="number" class="form-control" id=""  name="age" aria-describedby="ageInput">
            </div>
            <div class="mb-3">
                <input type="file" name="image" id="imageToUpload">
            </div>
            <button type="submit" class="btn btn-primary">Submit pet</button>
        </form>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>