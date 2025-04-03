<?php 
session_start();
  include("../DB_connect.php");
  if(isset($_POST['login'])) {
    $mailid = $_POST['mail'];
    $wachtwoord = $_POST['wachtwoord'];

    $sql = "SELECT count(*) as total FROM `users` WHERE email = '".$mailid."' AND wachtwoord = '".$password."' ";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
      $_SESSION['email'] = $mailid;
      header("location:account.html");
      die;
    }

  }
?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Apothecare</title>
    <link rel="stylesheet" href="../css/main.css" />
    <link rel="shortcut icon" type="x-icon" href="../images/logo/Apothecare-minilogo-nobg.png">
  </head>
  <body>
    <div class="container">
        <header>
                <nav>
                    <ul>
                        <li><a href="producten.html">Producten</a></li>
                        <li><a href="over.html">Over</a></li>
                        <li><a href="../index.html">Home</a></li>
                    </ul>
                </nav>
                <div class="icons">
                  <a href="winkelwagen.html" aria-label="Shopping Cart"><img src="../images/icons/cart.svg" alt="cart"></a>
                  <a href="account.html" aria-label="Login"><img src="../images/icons/user.svg" alt="login"></a>
                  <a href="#" aria-label="Search"><img src="../images/icons/search.svg" alt="search"></a>
              </div>
            </header>
    </div>

    <div class="container1">
      <div class="login-box">
        <div id="imglogo">
          <a href="../index.html"><img src="../images/logo/apothecare-nobg.png" class="logo" alt="logopng"></a>
          </div>
        <button class="google-btn">Continue with Google</button>
        <form method="POST">
          <label for="email">Email</label>
          <input type="email" name="mail" id="email" placeholder="Enter your E-mail" required />

          <label for="password">Password</label>
          <input type="password" name="wachtwoord" id="password" placeholder="Enter your password" required />

          <p class="forgot">Forgot password?</p>

          <button type="submit" class="button">Login</button>
        </form>
        <p class="signup">
          Don't have an account?
          <a href="register.php"><span class="free">Sign up for free</span></a>
        </p>
      </div>
    </div>
  </body>
</html>
