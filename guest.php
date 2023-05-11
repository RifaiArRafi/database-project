<?php
require('database/config.php');
require('database/functions.php');
require('database/buttons.php');

if(isset($_POST["newest"])){
  // $sort_type = $_GET["sort-type"];
  $find_newest_query = "SELECT * FROM books GROUP BY released DESC ";
  $books = mysqli_query($conn,$find_newest_query);
}

$year_above ="";
$year_below ="";
$year_low="";
$year_high="";
if(isset($_GET['above'])){
  $year_above = $_GET['search-above'];

  $above_query = "SELECT * FROM books GROUP BY released HAVING released > $year_above";
  $books = mysqli_query($conn,$above_query);
}elseif (isset($_GET['below'])) {
  $year_below = $_GET['search-below'];

  $below_query = "SELECT * FROM books GROUP BY released HAVING released < $year_below";
  $books = mysqli_query($conn,$below_query);
}elseif (isset($_GET['between'])) {
  $year_low = $_GET['low-between'];
  $year_high = $_GET['high-between'];

  $below_query = "SELECT * FROM books GROUP BY released HAVING released BETWEEN $year_low and $year_high";
  $books = mysqli_query($conn,$below_query);
}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body style="background-image: url(assets/library.jpg); background-repeat: no-repeat; background-size:cover;">

<!-- As a link -->
<nav class="navbar bg-body-tertiary bg-primary" data-bs-theme="dark">
  <div class="container container-fluid">
    <a class="navbar-brand">Hello, Guest</a>
    <form class="d-flex" role="search" action="" method="get">
      <input class="form-control me-2" type="search" placeholder="Search by title.." aria-label="Search" name="search-input" autofocus>
      <button class="btn btn-outline-success" type="submit" name="submit-button">Search</button>
    </form>
  </div>
</nav>

  <hr>

<h1 style="justify-content: center; display: flex; color: white;"> WELCOME TO OUR HOME PAGE</h1>

<!--for offcanvas-->
<form  method="post">
  <button class="btn btn-primary m-4" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">Your borrowed books</button>
  <button class="btn btn-primary m-4" type="submit" name="newest">Newest released book</button>
</form>

<form method="get">
  <div class="container">
    <h5 style="justify-content: center; display: flex; color: white;">Search books above specific year</h5> <br>
    <div class="input-group mb-3">
    
      <button class="btn btn-primary" type="submit" id="button-addon1" name="above">Search</button>
      <input name="search-above" type="text" class="form-control" placeholder="e.g 2003..." aria-label="Example text with button addon" aria-describedby="button-addon1">
      
    </div>

    <h5 style="justify-content: center; display: flex; color: white;">Search books below specific year</h5> <br>
    <div class="input-group mb-3">
      <button class="btn btn-primary" type="submit" id="button-addon1" name="below">Search</button>
      <input name="search-below" type="text" class="form-control" placeholder="e.g 2017..." aria-label="Example text with button addon" aria-describedby="button-addon1">
    </div>

    <h5 style="justify-content: center; display: flex; color: white;">Search books between years</h5> <br>
    <div class="input-group mb-3">
      <button class="btn btn-primary" type="submit" id="button-addon1" name="between">Search</button>
      <input type="text" class="form-control" placeholder="e.g 2003..." aria-label="Username" name="low-between">
      <span class="input-group-text">and</span>
      <input type="text" class="form-control" placeholder="e.g 2010" aria-label="Server" name="high-between">
      
    </div>
  </div>
  </form>

<div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Become our member first</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <p>You will have your borrowed books here</p>
  </div>
</div>

<hr>

<!-- for books card -->


<div class="container" style="display: flex;">
  <div class="row justify-content-center">
  <?php while ($data = mysqli_fetch_assoc($books)) {?>
    <div class="card" style="width: 18rem; margin: 5px;">
      <img src="assets/<?= $data['book_image']?>" class="card-img-top">
      <div class="card-body">
        <h5 class="card-title"><?= $data['book_title']?></h5>
        <p class="card-text"><?= $data['book_excerpt']?></p>
        <a href="details.php?id=<?= $data['book_id']?>" class="btn btn-primary" name="details">See details</a>
        
        <form action="" method="post">
          <input type="hidden" value="<?= $data['book_id']?>" name="id_bor">
          <button onclick="hayo()" type="submit" class="btn btn-primary mt-2">Borrow</button>
        </form>
        
      </div>
    </div>
    <?php } ?>

    <div class="footer">
      <form action="" method="post">
        <button style="margin-left: 45%;" class="btn btn-primary" type="submit" name="back">Back to login page</button>
      </form>
    </div>
  </div>  
 

    <script>
      function hayo() {
        alert("You have to be a member first to borrow books");
      }
      
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>