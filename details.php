<?php
require('database/config.php');
require('database/functions.php');
require('database/buttons.php');


  $id = "";

  if(isset($_GET["id"])){
    $id = $_GET["id"];
  }

  $details_select = "SELECT * FROM books WHERE book_id = $id";
  $details = mysqli_query($conn, $details_select);
  
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="style/details.css">
</head>
  <body class="img-fluid" style="background-image: url(assets/library.jpg); background-repeat: repeat; background-size:cover;">
    
    <div class="container container-fluid mt-5">
      <?php while ($data = mysqli_fetch_assoc($details)) { ?>
        <div class="row  justify-content-start">
            <div class="col-4">
                <img src="assets/<?= $data['book_image']?>" class="img-fluid img-thumbnail">
            </div>
          
            <div class="col-4 mt-3">
                <h3><b>Description </b></h3>
                <p><?= $data['book_desc']?></p>
            </div>

            <div class="col-4 text-center">
                <h4>Author profile :</h4>
                <img src="assets/<?= $data['author_image']?>" width="100" height="130">
                <p><?= $data['author_name']?></p>

                <br>

                <h4>Realeased by </h4>
                <p>Rifai Studio in 1933</p>
            </div>
        </div>
        <?php } ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>