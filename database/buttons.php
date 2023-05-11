<?php
    require('database/config.php');
    require('database/functions.php');

    if(isset($_GET["submit-button"])) {
        $books_card_select_query = "SELECT * FROM books 
        WHERE book_title like '%".$_GET['search-input']."%'";

        $books = mysqli_query($conn, $books_card_select_query);
    }

    if(isset($_POST["logout"])){
        session_start();
        $_SESSION = [];
        session_unset();
        session_destroy();

        header("Location: login-register/login/index.php");
    }elseif(isset($_POST["back"])){
        header("Location: login-register/login/index.php");
    }

    $borrow = "SELECT * FROM borrowed_books";
    $res = mysqli_query($conn, $borrow);
    $borrow_quantity = mysqli_num_rows($res);

    $borrow_quantity_query = "SELECT 'COUNT(book_id)' FROM borrowed_books";
    $borrow_result = mysqli_query($conn, $borrow_quantity_query);

    if(isset($_POST['borrow'])){
    $id_borr = $_POST['id_bor'];
    $validate_book = mysqli_query($conn, "SELECT * FROM borrowed_books WHERE book_id = $id_borr");
    if( $borrow_quantity >= 5){
        echo "<script>alert('You cannot borrow books more than 5')</script>";
    }else if(mysqli_num_rows($validate_book) == 1){
        echo "<script>alert('You cannot borrow the same book more than twice')</script>";
    }else {
        $user_id = $_SESSION['user_id'];
        $lend_book = "INSERT INTO borrowed_books (book_id, book_title, book_image) SELECT book_id, book_title, book_image FROM books where book_id = $id_borr";
        $res_lend = mysqli_query($conn, $lend_book);
        header("location: index.php");
    }
    }

    if(isset($_POST['delete'])){
        $id_del = $_POST['id_del'];
        $del_book= "DELETE FROM borrowed_books WHERE book_id = $id_del";
        $res_del = mysqli_query($conn, $del_book);
        header("location: index.php");
      }
      
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