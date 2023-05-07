<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <script src="https://unpkg.com/ionicons@latest/dist/ionicons.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
  <header>
    <h2 class="logo">Library MS</h2>
    <nav class="navigation">
      <a href="../../guest.php" class="btnLogin-popup">Guest</a>
    </nav>
  </header>

  <div class="wrapper">
    <div class="icon-close">
      <ion-icon name="close-outline"></ion-icon>
    </div>
    <div class="form-box login">
      <h2>Login</h2>
        <form action="../config/log-auth.php" method="post">
          <div class="input-box">
            <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
            <input type="text" name="email">			
            <label>Email</label>		
		      </div>
          <div class="input-box">
            <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
            <input type="password" name="password">			
            <label>Password</label>		
		      </div>
          <div class="remember-forgot">
            <label><input type="checkbox" name="remember">Remember me</label>
           
          </div>
          <button type="submit" class="btn">Login</button>
          <div class="login-register">
            <p>Don't have an account? <a class="register-link">Register</a></p>
          </div>
        </form>
    </div>

    <div class="form-box register">
      <h2>Register</h2>
        <form action="../config/reg-auth.php" method="post">
          <div class="input-box">
            <span class="icon"><ion-icon name="mail-outline"></ion-icon></span>
            <input type="email" name="email">			
            <label>Email</label>		
		      </div>
          <div class="input-box">
            <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
            <input type="text" name="username">			
            <label>Username</label>		
		      </div>
          <div class="input-box">
            <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
            <input type="password" name="password">			
            <label>Password</label>		
		      </div>
          <button type="submit" class="btn">Register</button>
          <div class="login-register">
            <p>Already have an account? <a class="login-link">Login</a></p>
          </div>
        </form>
    </div>
  </div>

</body>
<script src="../plugins/sweetalert2/sweetalert2.min.js"></script>
<?php
include('conditions.php');
?>
<script src="script.js"></script>
</html>