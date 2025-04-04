<?php 
//---------------------------------------------------------------------------------------------------//
// Naam script		  : login.php
// Omschrijving		  : Op deze pagina kan je inloggen
// Naam ontwikkelaar: Groep 7
// Project		      : Apothecare
// Datum		        : projectweek - periode 3 - 2025
//---------------------------------------------------------------------------------------------------//
  session_start();
  include("../DB_connect.php");

  // Controleer of de gebruiker is ingelogd
  if (isset($_SESSION['user_icon']) && $_SESSION['user_icon'] == true) {
  // Als ingelogd, stuur door naar account.php
  header('Location: account.php');
  exit(); // Stop verdere uitvoering van de pagina
  }

  //als er een account is aangemaakt zal er een popup komen door deze code  
  if(isset($_SESSION['account_aanmaak'])){
    $nieuw_account_popup = "block";
    unset($_SESSION['account_aanmaak']);
  } else {
    $nieuw_account_popup = "none";
  }

  if(isset($_POST['login'])) {
    // Ingevulde velden in form
    $mail = $_POST['mail'];
    $wachtwoord = password_hash($_POST['wachtwoord'], PASSWORD_DEFAULT);

    // Kijkt of de velden zijn ingevuld
    if (!empty($mail) && !empty($wachtwoord)) {
      // Kijkt voor de email in de database
      $sql = "SELECT * FROM user WHERE email='$mail';";
      $result = mysqli_query($conn, $sql);
      $resultCheck = mysqli_num_rows($result);
  
      if ($resultCheck > 0){
        // Haal de gegevens van de gebruiker op
        while ($row = mysqli_fetch_assoc($result)) {
          // Vergelijk het ingevoerde wachtwoord met de hash uit de database
          if ($wachtwoord = $row['wachtwoord']) {
            // Als het wachtwoord correct is sla de gebruiker ID in de sessie op
            $_SESSION['user_id'] = $row['ID'];
            $_SESSION['user_icon'] = true;
            echo "Login succesvol!";
            echo"<script>window.location.href = 'account.php';</script>";
            // Hier kun je doorsturen naar een andere pagina
          } else {
            echo "Onjuist wachtwoord.";
          }
        }
      } else {
        echo "Geen gebruiker gevonden met dit e-mailadres.";
      }
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
<!-- ingelogd popup -->
<div class="popup" style="display: <?php echo $nieuw_account_popup; ?>;"><p>✅ Account succesvol aangemaakt! Log nu in.</p></div>
<!-- navbar -->
    <div class="container">
        <header class="nav-login">
          <nav>
            <ul>
                <li><a href="producten.php">Producten</a></li>
                <li><a href="over.php">Over</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
          </nav>
          <div class="icons">
            <a href="winkelwagen.php" aria-label="Shopping Cart"><img src="../images/icons/cart.svg" alt="cart"></a>
            <a href="register.php" aria-label="Login"><img src="../images/icons/user-plus.svg" alt="login"></a>
            <a href="#" aria-label="Search"><img src="../images/icons/search.svg" alt="search"></a>
          </div>
        </header>
    </div>
<!-- main body -->
    <div class="container1">
      <div class="login-box">
        <div id="imglogo">
          <a href="../index.php"><img src="../images/logo/apothecare-nobg.png" class="logo" alt="logopng"></a>
          </div>
          <!-- login -->
        <form method="POST">
          <label for="email">E-mail</label>
          <input type="email" name="mail" id="email" placeholder="Voer uw e-mail in" required />

          <label for="password">Wachtwoord</label>
          <input type="password" name="wachtwoord" id="password" placeholder="Voer uw wachtwoord in" required />

          <p class="forgot">Forgot password?</p>

          <button type="submit" name="login" class="button">Login</button>
        </form>
        <p class="signup">
          Heb je geen account?
          <a href="register.php"><span class="free">Registreer nu gratis</span>!</a>
        </p>
      </div>
    </div>
    <script src="main.js"></script>
  </body>
</html>
