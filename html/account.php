<?php
//---------------------------------------------------------------------------------------------------//
// Naam script		  : account.php
// Omschrijving		  : Deze file laat het account van de klant zien.
// Naam ontwikkelaar: Tejo Veldman
// Project		      : Apothecare
// Datum		        : projectweek - periode 3 - 2025
//---------------------------------------------------------------------------------------------------//
  session_start();
  // Als de gebruiker niet is ingelogd stuur door naar inlogpagina
  if (!isset($_SESSION['user_id'])) {
    header("Location: inlog.php");
    exit();
  }
  //database connection
  include("../DB_connect.php");

  $sql = "SELECT * FROM user WHERE ID='{$_SESSION["user_id"]}';";
  $result = mysqli_query($conn, $sql);
  $resultCheck = mysqli_num_rows($result);

  if(isset ($_SESSION["user_id"])){
    if ($resultCheck > 0){

      while ($row = mysqli_fetch_assoc($result)) {
        $voornaam = $row['voornaam'];
        $tussenvoegsel = $row['tussenvoegsel'];
        $achternaam = $row['achternaam'];
        $email = $row['email'];
        $telefoon_nr = $row['telefoon_nr'];
      }
    }
  }
?>
<!DOCTYPE html>
<html lang="nl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Apothecare - Account</title>
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
        <h1>Mijn account</h1>
        <div class="account-gegevens">
          <h2>Gegevens van: <?php echo $voornaam . " "; echo $achternaam;?></h2>
          <form action="account.php" method="post">
            <label for="voornaam">Voornaam</label>
            <input type="text" id="voornaam" name="voornaam" placeholder="<?php echo $voornaam; ?>" required />

            <label for="tussenvoegsel">Tussenvoegsel</label>
            <input type="text" id="tussenvoegsel" name="tussenvoegsel" placeholder="<?php echo $tussenvoegsel; ?>" />

            <label for="achternaam">Achternaam</label>
            <input type="text" id="achternaam" name="achternaam" placeholder="<?php echo $achternaam; ?>" required />

            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" placeholder="<?php echo $email; ?>" required />

            <label for="telefoon">Telefoonnummer</label>
            <input type="tel" id="telefoon" name="telefoon" placeholder="<?php echo $telefoon_nr; ?>" />
          </form>
          <button class="account-edit-button">Sla op</button>
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
