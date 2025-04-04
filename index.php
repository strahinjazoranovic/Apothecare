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
  <div class="container">
    <header>
      <a href="index.php"><img src="images/logo/apothecare-nobg.png" class="logo" alt="logopng" /></a>
      <nav>
        <ul>
        <li><a href="html/producten.php">Producten</a></li>
        <li><a href="html/over.php">Over</a></li>
        <li><a href="html/contact.php">Contact</a></li>
        </ul>
      </nav>
      <div class="icons">
        <a href="html/winkelwagen.php" aria-label="Shopping Cart"><img src="images/icons/cart.svg" alt="cart" /></a>
        <a href="html/login.php" aria-label="User Account"><img src="images/icons/user.svg" alt="cart" /></a>
        <a href="#" aria-label="Search"><img src="images/icons/search.svg" alt="cart" /></a>
      </div>
    </header>

    <div id="chatBotWindow"></div>
      <div id="ChatBotClose"></div>
      <div id="chatBot">
        Need help? chat with our bot <img src="images/icons/headphones.svg" />
    </div>

    <div id="content">
      <h1 class="apothecare-header">Welkom bij Apothe<span class="red">care<span></h1>
      <p class="apothecare-text">Uw online apotheek voor medicijnen en gezondheidsproducten.</p>
      <a href="html/producten.php" class="button-filter">Bekijk onze producten</a>
      <a href="html/register.php" class="button-filter">Maak een nieuwe account aan</a>
  </div>
</body>
</html>
