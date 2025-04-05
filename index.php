<?php
//---------------------------------------------------------------------------------------------------//
// Naam script		  : Index.php
// Omschrijving		  : Deze is de landing page van de website.
// Naam ontwikkelaar: Strahinja Zoraonvic, Tejo Veldman
// Project		      : Apothecare
// Datum		        : projectweek - periode 3 - 2025
//---------------------------------------------------------------------------------------------------//
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Apothecare - Home</title>
  <link rel="stylesheet" href="css/main.css" />
  <!-- Dit is voor de icon die je bovenin in de tablad zit-->
  <link rel="shortcut icon" type="x-icon" href="images/logo/Apothecare-minilogo-nobg.png" />
  <!-- Dit is voor de font-->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet" />
</head>
<body>
  <header>
    <div class="logo">
      <a href="index.php"><img src="images/logo/apothecare-nobg.png" alt="Logo"></a>
    </div>

    <nav>
      <ul>
        <li><a href="php/producten.php">Producten</a></li>
        <li><a href="php/over.php">Over ons</a></li>
        <li><a href="php/contact.php">Contact</a></li>
      </ul>
    </nav>

    <div class="icons">
      <div class="search">
        <img src="images/icons/search.svg" alt="Search Icon">
      </div>
      <div class="cart">
        <a href="php/winkelwagen.php">
          <img src="images/icons/cart.svg" alt="Cart Icon">
        </a>
      </div>
      <div class="profile">
        <a href="<?php echo (isset($_SESSION['user_icon']) && $_SESSION['user_icon'] == true) ? 'account.php' : 'php/login.php'; ?>" aria-label="User Account">
          <?php if (isset($_SESSION['user_icon']) && $_SESSION['user_icon'] == true): ?>
            <img src="images/icons/user-found.svg" alt="user">
          <?php else: ?>
            <img src="images/icons/user.svg" alt="user">
          <?php endif; ?>
        </a>
      </div>
    </div>

<!-- Menu Icon voor mobiel -->
      <div class="menu-icon" onclick="toggleMobileMenu()">
        <img src="images/icons/menu.png" alt="Menu Icon">
      </div>

<!-- Mobiel menu overlay -->
      <div class="mobile-menu" id="mobileMenu">
        <div class="close-menu" onclick="toggleMobileMenu()">
          <img src="images/icons/close.png" alt="Sluit menu">
        </div>
      <ul class="mobile-links">
          <li><a href="#">Producten</a></li>
          <li><a href="#">Over ons</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
        <div class="mobile-icons">
          <a href="#"><img src="images/icons/search-wit.svg" alt="Search Icon"></a>
          <a href="winkelwagen.php"><img src="images/icons/cart-wit.svg" alt="Cart Icon"></a>
          <a href="<?php echo (isset($_SESSION['user_icon']) && $_SESSION['user_icon'] == true) ? 'account.php' : 'register.php'; ?>">
            <?php if (isset($_SESSION['user_icon']) && $_SESSION['user_icon'] == true): ?>
              <img src="images/icons/user-found.svg" alt="user">
            <?php else: ?>
              <img src="images/icons/user-wit.svg" alt="user">
            <?php endif; ?>
          </a>
        </div>
      </div>
    </header>
    <div class="chatBotWindow"></div>
      <div class="ChatBotClose"></div>
      <div class="chatBot">
        Need help? chat with our bot <img src="images/icons/headphones.svg" />
    </div>

    <div class="content">
      <h1 class="apothecare-header">Welkom bij Apothe<span class="red">care<span></h1>
      <p class="apothecare-text">Uw online apotheek voor medicijnen en gezondheidsproducten.</p>
      <a href="php/producten.php" class="button-filter">Bekijk onze producten</a>
      <a href="php/register.php" class="button-filter">Maak een nieuwe account aan</a>

      <script src="js/main.js"></script>            
</body>
</html>
