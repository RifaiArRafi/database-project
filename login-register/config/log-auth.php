<?php
include ('config.php');
session_start();

// if(isset($_POST['submit'])){

    $email = $_POST['email'];
    $password = mysqli_real_escape_string($conn, md5($_POST['password']));
 
    $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$password'") or die('query failed');

    if (mysqli_num_rows($select_users) == 1) {
        $row = mysqli_fetch_array($select_users);
        $_SESSION['user_name'] = $row['username'];
        $_SESSION['user_email'] = $row['email'];
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['Login'] = true;
        header('Location:../../index.php');
    } else if ($username == '' || $password == '') {
        header('Location:../login/index.php?error=1');
    } else {
        header('Location:../login/index.php?error=2');
    }
// }
?>