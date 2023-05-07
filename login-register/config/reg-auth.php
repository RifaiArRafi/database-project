<?php
include ('config.php'); 
$email = stripslashes($_REQUEST['email']);
$username = stripslashes($_REQUEST['username']);
//escapes special characters in a string
$username = mysqli_real_escape_string($conn, $username);
$password = stripslashes($_REQUEST['password']);
$password = mysqli_real_escape_string($conn, $password);
$date = date("Y-m-d H:i:s");
$query    = "INSERT into `users` (email, username, password, date)
             VALUES ('$email', '$username', '" . md5($password) . "', '$date')";
$chkquery = "SELECT * FROM users WHERE username = '$username'";
$check   = mysqli_query($conn, $chkquery);
if (mysqli_num_rows($check)==1) {
    header('Location:../login/index.php?error=3');
} else if ($username == '' || $password == '' || $email == '') {
    header('Location:../login/index.php?error=4');
} else {
    $result = mysqli_query($conn, $query);
    header('Location:../login/index.php?success');
}
?>