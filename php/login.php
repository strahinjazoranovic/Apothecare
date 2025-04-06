<?php 
//---------------------------------------------------------------------------------------------------//
// Naam script		  : login.php
// Omschrijving		  : Op deze pagina kan je inloggen
// Naam ontwikkelaar: Tejo Veldman, Strahinja Zoranovic
// Project		      : Apothecare
// Datum		        : projectweek - periode 3 - 2025
//---------------------------------------------------------------------------------------------------//
  session_start();
  include("../DB_connect.php");

  // Controleer of de gebruiker is ingelogd
  if (isset($_SESSION['user_icon']) && $_SESSION['user_icon'] == true) {
  // Als ingelogd, stuur door naar account.php
  echo "<script>window.location.href = 'account.php';</script>";
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
    <title>Apothecare - Login</title>
    <link rel="stylesheet" href="../css/main.css" />
    <link rel="shortcut icon" type="x-icon" href="../images/logo/Apothecare-minilogo-nobg.png">
    <!-- Dit is voor de font-->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet" />
  </head>
  <body class="login-page">
<!-- account aangemaakt popup -->
  <div class="popup" style="display: <?php echo $nieuw_account_popup; ?>;">
    <p>✅ Account succesvol aangemaakt! Log nu in.</p>
  </div>
<!-- header -->
  <header class="login-header">

     <nav>
       <ul>
         <li><a href="producten.php">Producten</a></li>
         <li><a href="over.php">Over ons</a></li>
         <li><a href="contact.php">Contact</a></li>
       </ul>
     </nav>

     <div class="icons">
       <div class="cart">
         <a href="winkelwagen.php">
           <img src="../images/icons/cart.svg" alt="Cart Icon">
         </a>
       </div>
       <div class="profile">
         <a href="<?php echo (isset($_SESSION['user_icon']) && $_SESSION['user_icon'] == true) ? 'account.php' : 'register.php'; ?>" aria-label="User Account">
           <?php if (isset($_SESSION['user_icon']) && $_SESSION['user_icon'] == true): ?>
             <img src="../images/icons/user-found.svg" alt="user">
           <?php else: ?>
             <img src="../images/icons/user-plus.svg" alt="user">
           <?php endif; ?>
         </a>
       </div>
     </div>

<!-- Menu Icon voor mobiel -->
     <div class="menu-icon" onclick="toggleMobileMenu()">
       <img src="../images/icons/menu.png" alt="Menu Icon">
     </div>

<!-- Mobiel menu overlay -->
     <div class="mobile-menu" id="mobileMenu">
       <div class="close-menu" onclick="toggleMobileMenu()">
         <img src="../images/icons/close.png" alt="Sluit menu">
       </div>
     <ul class="mobile-links">
         <li><a href="producten.php">Producten</a></li>
         <li><a href="over.php">Over ons</a></li>
         <li><a href="contact.php">Contact</a></li>
       </ul>
       <div class="mobile-icons">
         <a href="winkelwagen.php"><img src="../images/icons/cart-wit.svg" alt="Cart Icon"></a>
         <a href="<?php echo (isset($_SESSION['user_icon']) && $_SESSION['user_icon'] == true) ? 'account.php' : 'register.php'; ?>">
           <?php if (isset($_SESSION['user_icon']) && $_SESSION['user_icon'] == true): ?>
             <img src="../images/icons/user-found.svg" alt="user">
           <?php else: ?>
             <img src="../images/icons/user-plus-wit.svg" alt="user">
           <?php endif; ?>
         </a>
       </div>
     </div>
   </header>
<!-- main body -->
    <div class="container1">
      <div class="login-box">
        <div id="imglogo">
          <a href="../index.php"><img src="../images/logo/apothecare-nobg.png" alt="logopng"></a>
        </div>

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
    <script src="../js/main.js"></script>
  </body>
</html>
