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
    }
?>