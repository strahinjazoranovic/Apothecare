<?php
//---------------------------------------------------------------------------------------------------//
// Naam script		  : Index.php
// Omschrijving		  : Deze is de landing page van de website.
// Naam ontwikkelaar: Groep 7
// Project		      : Apothecare
// Datum		        : projectweek - periode 3 - 2025
//---------------------------------------------------------------------------------------------------//
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Apothecare</title>
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
        <a href="html/account.php" aria-label="User Account"><img src="images/icons/user.svg" alt="cart" /></a>
        <a href="#" aria-label="Search"><img src="images/icons/search.svg" alt="cart" /></a>
      </div>
    </header>
  </div>
</body>
</html>
