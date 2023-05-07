<?php
require('database/config.php');
require('database/functions.php');
require('database/buttons.php');


$borrow = "SELECT * FROM borrowed_books";
$res = mysqli_query($conn, $borrow);


$id_borr = "";

  if(isset($_GET["id"])){
    $id_borr = $_GET["id"];
  }

if(isset($_POST['borrow'])){
  $lend_book = "INSERT INTO borrowed_books (book_id, book_title, book_image) SELECT book_id, book_title, book_image FROM books where book_id = $id_borr";
  $res_lend = mysqli_query($conn, $lend_book);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <title>borrow</title>
</head>
<body>
    <?php while($data_borrow = mysqli_fetch_assoc($res)){?>
    <div class="card" style="width: 18rem;">
      <img class="card-img-top" src="assets/<?= $data_borrow["book_image"] ?>" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        <form action="" method="post">
          <button class="btn btn-primary">Delete</button>
        </form>
      </div>
    </div>
    <?php } ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>
</html>