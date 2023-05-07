<?php
    require('database/config.php');

    $books_card_select_query = "SELECT * FROM books";
    $books = mysqli_query($conn, $books_card_select_query);
    
    
    
?>