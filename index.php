<?php
require('database/config.php');
require('database/functions.php');
require('database/buttons.php');

session_start();

if(!isset($_SESSION["Login"])){
  header("location: login-register/login/index.php");
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Library</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body style="background-image: url(assets/library.jpg); background-repeat: no-repeat; background-size:cover;">

<!-- As a link -->
<nav class="navbar bg-body-tertiary bg-primary" data-bs-theme="dark">
  <div class="container container-fluid">
    <a class="navbar-brand">Hello, <?= $_SESSION["user_name"] ?> </a>
    <form class="d-flex" role="search" action="" method="get">
      <input class="form-control me-2" type="search" placeholder="Search by title.." aria-label="Search" name="search-input" autofocus>
      <button class="btn btn-outline-success" type="submit" name="submit-button">Search</button>
    </form>
    <form action="" method="post">
      <button class="btn btn-primary" type="submit" name="logout">Logout</button>
    </form>
  </div>
</nav>

  <hr>

<h1 style="justify-content: center; display: flex; color: lightblue;"> WELCOME TO OUR HOME PAGE</h1>


<form  method="post">
  <button class="btn btn-primary m-4" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">Your borrowed books</button>
  <button class="btn btn-primary m-4" type="submit" name="newest">Newest released book</button>
</form>

<form method="get">
  <div class="container">
    <h5 style="justify-content: center; display: flex; color: lightblue;">Search books above specific year</h5> <br>
    <div class="input-group mb-3">
    
      <button class="btn btn-primary" type="submit" id="button-addon1" name="above">Search</button>
      <input name="search-above" type="text" class="form-control" placeholder="e.g 2003..." aria-label="Example text with button addon" aria-describedby="button-addon1">
      
    </div>

    <h5 style="justify-content: center; display: flex; color: lightblue;">Search books below specific year</h5> <br>
    <div class="input-group mb-3">
      <button class="btn btn-primary" type="submit" id="button-addon1" name="below">Search</button>
      <input name="search-below" type="text" class="form-control" placeholder="e.g 2017..." aria-label="Example text with button addon" aria-describedby="button-addon1">
    </div>

    <h5 style="justify-content: center; display: flex; color: lightblue;">Search books between years</h5> <br>
    <div class="input-group mb-3">
      <button class="btn btn-primary" type="submit" id="button-addon1" name="between">Search</button>
      <input type="text" class="form-control" placeholder="e.g 2003..." aria-label="Username" name="low-between">
      <span class="input-group-text">and</span>
      <input type="text" class="form-control" placeholder="e.g 2010" aria-label="Server" name="high-between">
      
    </div>
  </div>
  </form>

<div style="overflow-y: scroll; max-height 500px" class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Your borrowings (<span id="borrow_quant"><?= $borrow_quantity  ?></span>/5)</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <form action="" method="post">
  <div  class="offcanvas-body">
      <?php while($data_borrow = mysqli_fetch_assoc($res)){?>
        <div class="card" style="width: 18rem;">
          <img class="card-img-top" src="assets/<?= $data_borrow["book_image"] ?>" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title"><?= $data_borrow["book_title"] ?></h5>
            <input type="hidden" value="<?= $data_borrow['book_id']?>" name="id_del">
            <button type="submit" class="btn btn-primary" name="delete">Delete</button>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</form>

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
        <a href="details.php?id=<?= $data['book_id']?>" target="_blank" class="btn btn-primary" name="details">See details</a>
        
        <form action="" method="post">
          <input type="hidden" value="<?= $data['book_id']?>" name="id_bor">
          <button type="submit" name="borrow" class="btn btn-primary mt-2">Borrow</button>
        </form>
        
      </div>
    </div>
    <?php } ?>  
  </div>  

</div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>