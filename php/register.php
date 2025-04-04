<?php
//---------------------------------------------------------------------------------------------------//
// Naam script		  : register.php
// Omschrijving		  : Hier maak je een nieuw account aan
// Naam ontwikkelaar  : Tejo Veldman, Strahinja Zoranovic
// Project		      : Apothecare
// Datum		      : projectweek - periode 3 - 2025
//---------------------------------------------------------------------------------------------------// 
    session_start();
    include("../DB_connect.php");

      // Controleer of de gebruiker is ingelogd
    if (isset($_SESSION['user_icon']) && $_SESSION['user_icon'] == true) {
    // Als ingelogd, stuur door naar account.php
    header('Location: account.php');
    exit(); // Stop verdere uitvoering van de pagina
    }

    if(isset($_POST['register'])) {
        $voornaam = $_POST['voornaam'];
        $tussenvoegsel = $_POST['tussenvoegsel'];
        $achternaam = $_POST['achternaam'];
        $mail = $_POST['mail'];
        $wachtwoord = password_hash($_POST['wachtwoord'], PASSWORD_DEFAULT);

        $query = mysqli_query($conn, "Insert into user (voornaam, tussenvoegsel, achternaam, email, wachtwoord) Values ('$voornaam', '$tussenvoegsel', '$achternaam', '$mail', '$wachtwoord')");
        if($query){
            $_SESSION['account_aanmaak'] = true;
            header("Location: login.php");
            exit();
        } else {
            echo"<script>alert('Account aanmaken mislukt probeer opnieuw of zoek contact op.'); </script>";
        }
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apothecare - Register</title>
    <link rel="stylesheet" href="../css/main.css" />
    <link rel="shortcut icon" type="x-icon" href="../images/logo/Apothecare-minilogo-nobg.png">
    <!-- Dit is voor de font-->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet" />
</head>
<body>
    <header>
      <div class="logo">
        <a href="../index.php"><img src="../images/logo/apothecare-nobg.png" alt="Logo"></a>
      </div>

      <nav>
        <ul>
          <li><a href="producten.php">Producten</a></li>
          <li><a href="over.php">Over ons</a></li>
          <li><a href="contact.php">Contact</a></li>
        </ul>
      </nav>

      <div class="icons">
        <div class="search">
          <a href="javascript:void(0)" onclick="toggleSearch()">
            <img src="../images/icons/search.svg" alt="Search Icon">
          </a>
          <form id="search-form" action="#" method="post" style="display:none;">
            <input type="text" name="search" placeholder="Zoek..." onkeydown="submitSearch(event)">
          </form>
        </div>
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
              <img src="../images/icons/user.svg" alt="user">
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
          <li><a href="#">Producten</a></li>
          <li><a href="#">Over ons</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
        <div class="mobile-icons">
          <a href="#"><img src="../images/icons/search.svg" alt="Search Icon"></a>
          <a href="winkelwagen.php"><img src="../images/icons/cart.svg" alt="Cart Icon"></a>
          <a href="<?php echo (isset($_SESSION['user_icon']) && $_SESSION['user_icon'] == true) ? 'account.php' : 'register.php'; ?>">
            <?php if (isset($_SESSION['user_icon']) && $_SESSION['user_icon'] == true): ?>
              <img src="../images/icons/user-found.svg" alt="user">
            <?php else: ?>
              <img src="../images/icons/user.svg" alt="user">
            <?php endif; ?>
          </a>
        </div>
      </div>
    </header>

    <div class="container1">
        <div class="login-box">
            <a href="login.php"><img src="../images/icons/back.svg"></a>
            <div id="imglogo">
                <a href="../index.php"><img src="../images/logo/apothecare-nobg.png" class="logo" alt="logopng"></a>
            </div>

            <form onsubmit="validatePassword(event)" method="POST">  

                <label for="firstname">Voornaam</label>
                <input type="text" name="voornaam" id="voornaam" placeholder="Voer uw naam in" required>

                <label for="firstname">Tussenvoegsel</label>
                <input type="text" name="tussenvoegsel" id="tussenvoegsel" placeholder="Voer uw tussenvoegsel in">

                <label for="lastname">Achternaam</label>
                <input type="text" name="achternaam" id="achternaam" placeholder="Voer uw achternaam in" required>

                <label for="email">E-mail</label>
                <input type="email" name="mail" id="email" placeholder="Voer uw e-mail in" required>

                <label for="password">Wachtwoord</label>
                <p class="wachtwoordregels">* Wachtwoord moet minimaal 8 karakters bevatten <br> * Met 1 Speciaal teken</p> 
                <input type="password" name="wachtwoord" id="password" placeholder="Voer uw wachtwoord in" required>

                <label for="againpassword">Voer wachtwoord opnieuw in</label>
                <input type="password" id="againpassword" placeholder="Voer uw wachtwoord opnieuw in" required>
                
                <p class="forgot">Wachtwoord vergeten?</p>
                <button type="submit" name="register" class="button">Registreer nu</button>
                </div>
            </form>
        </div>
    </div>
    <script src="../js/main.js"></script>
</body>
</html>
