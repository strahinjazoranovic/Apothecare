<?php
//---------------------------------------------------------------------------------------------------//
// Naam script		  : over.php
// Omschrijving		  : Op deze pagina staat alle informatie over het bedrijf
// Naam ontwikkelaar: Shiham Hammich
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
    <title>Apothecare - Over ons</title>
    <link rel="stylesheet" href="../css/main.css" />
    <link
      rel="shortcut icon"
      type="x-icon"
      href="../images/logo/Apothecare-minilogo-nobg.png"
    />
    <!-- Dit is voor de font-->
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <div class="container">
      <header>
        <a href="../index.php"><img src="../images/logo/apothecare-nobg.png" class="logo" alt="logopng" /></a>
        <nav>
            <ul>
                <li><a href="producten.php">Producten</a></li>
                <li><a href="over.php">Over</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>
        <div class="icons">
        <a href="winkelwagen.php" aria-label="Shopping Cart"><img src="../images/icons/cart.svg" alt="cart" /></a>
            <a href="login.php" aria-label="User Account">
            <a href="<?php echo (isset($_SESSION['user_icon']) && $_SESSION['user_icon'] == true) ? 'account.php' : 'register.php'; ?>" aria-label="User Account">
                <?php if (isset($_SESSION['user_icon']) && $_SESSION['user_icon'] == true): ?>
            <img src="../images/icons/user-found.svg" alt="user" />
                <?php else: ?>
            <img src="../images/icons/user.svg" alt="user" />
                <?php endif; ?></a>
            <a href="#" aria-label="Search"><img src="../images/icons/search.svg" alt="search" /></a>
        </div>
      </header>
    </div>

    <div class="over-ons-container">
  <div class="photo">
    <img src="../images/over-ons-foto.png" alt="ApotheCare medewerker">
    <div class="over-btn-container over-btn-desktop">
      <a href="producten.php" class="over-btn">Bekijk Producten</a>
    </div>
  </div>

  <div class="content">
    <div class="blok">
      <h2>Onze Geschiedenis</h2>
      <p>
        ApotheCare werd opgericht in 1893 toen dokter Cornelis Pillenius vond dat pillen kopen eenvoudiger moest worden.
        Wat begon als een stoffig kastje vol mysterieuze poeders, groeide uit tot een digitale apotheek voor iedereen.
      </p>
    </div>
    <div class="blok">
      <h2>Onze Doelen</h2>
      <p>
        Wij willen een wereld waarin je je medicijnen snel, duidelijk en zonder stress kunt regelen.
        Of het nou om een simpele pijnstiller gaat of een pil tegen je schoonmoederhoofdpijn — wij staan klaar.
      </p>
    </div>
    <div class="blok">
      <h2>Meer Uitleg</h2>
      <p>
        ApotheCare maakt gebruik van moderne technologie om medicatie makkelijk bereikbaar te maken.
        Geen lange wachttijden of onduidelijke etiketten — gewoon duidelijk, snel en veilig. 
      </p>
    </div>
    <div class="over-btn-container over-btn-mobile">
      <a href="producten.php" class="over-btn">Bekijk Producten</a>
    </div>
  </div>
</div>
  </body>
</html>
