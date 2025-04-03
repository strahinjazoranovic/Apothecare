<?php
//---------------------------------------------------------------------------------------------------//
// Naam script		  : account.php
// Omschrijving		  : Deze file laat het account van de klant zien.
// Naam ontwikkelaar: Groep 7
// Project		      : Apothecare
// Datum		        : projectweek - periode 3 - 2025
//---------------------------------------------------------------------------------------------------//
  session_start();
  echo "welcome user" . $_SESSION["user_id"];
?>
<!DOCTYPE html>
<html lang="nl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Account - Apothecare</title>
    <link rel="stylesheet" href="../css/main.css" />
    <!-- Dit is voor de font-->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet"/>
  </head>

  <body>
    <div class="container">
      <header>
        <a href="../index.php"><img src="../images/logo/apothecare-nobg.png" class="logo" alt="logopng"/></a>
        <nav>
            <ul>
                <li><a href="producten.php">Producten</a></li>
                <li><a href="over.php">Over</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>
        <div class="icons">
          <a href="winkelwagen.php" aria-label="Shopping Cart"><img src="../images/icons/cart.svg" alt="cart"/></a>
          <a href="login.php" aria-label="Login"><img src="../images/icons/user.svg" alt="login"/></a>
          <a href="#" aria-label="Search"><img src="../images/icons/search.svg" alt="Search"/></a>
        </div>
      </header>
    </div>

    <div class="account-content">
      <div class="account-section">
        <h1>Account</h1>
        <div class="account-gegevens">
          <h2>Gegevens</h2>
          <form action="account.php" method="post">
            <label for="voornaam">Voornaam</label>
            <input type="text" id="voornaam" name="voornaam" required />

            <label for="tussenvoegsel">Tussenvoegsel</label>
            <input type="text" id="tussenvoegsel" name="tussenvoegsel" />

            <label for="achternaam">Achternaam</label>
            <input type="text" id="achternaam" name="achternaam" required />

            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" required />

            <label for="telefoon">Telefoonnummer</label>
            <input type="tel" id="telefoon" name="telefoon" />

            <label for="factuuradres">Factuuradres</label>
            <input type="text" id="factuuradres" name="factuuradres" required />

            <label for="adres">Bezorgadres</label>
            <input type="text" id="adres" name="adres" required />
          </form>
          <button class="button">Sla op</button>
        </div>
      </div>

      <div class="bestellingen-section">
        <div class="bestellingen-container">
          <div class="bestellingtext">
            <h2>Laatste bestellingen</h2>

            <div class="bestelling">
              <div class="bestelling-id">Bestelling #9999</div>
              <p class="bestelling-beschrijving">Productnaam:</p>

              <div class="bestelling-prijs">€99,99</div>
            </div>

            <div class="divider"></div>

            <div class="bestelling">
              <div class="bestelling-id">Bestelling #9998</div>
              <p class="bestelling-beschrijving">Productnaam:</p>

              <div class="bestelling-prijs">€99,99</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
