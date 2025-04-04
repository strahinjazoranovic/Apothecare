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
    header("Location: login.php");
    exit();
  }
  //database connection
  include("../DB_connect.php");

  //haalt gegevens uit database
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
// Gegevens bijwerken
  if(isset($_POST['update-account'])) {
    $voornaam_update = $_POST['voornaam'];
    $tussenvoegsel_update = $_POST['tussenvoegsel'];
    $achternaam_update = $_POST['achternaam'];
    $mail_update = $_POST['mail'];
    $telefoon_update = $_POST['telefoon'];

    $query = mysqli_query($conn, "UPDATE user SET voornaam = '$voornaam_update', tussenvoegsel = '$tussenvoegsel_update', achternaam = '$achternaam_update', email = '$mail_update', telefoon_nr = '$telefoon_update' WHERE ID = '{$_SESSION['user_id']}'");
    if($query){
        $_SESSION['account_bijgewerkt'] = true;
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } else {
        echo"<script>alert('Account bewerken mislukt probeer opnieuw of zoek contact op.'); </script>";
    }
}

// uitloggen
if (isset($_POST['uitloggen'])) {
    // Verwijder alle sessievariabelen
    $_SESSION = [];

    // Vernietig de sessie
    session_destroy();

    // Optioneel: Redirect naar de loginpagina
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="nl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Account - Apothecare</title>
    <link rel="shortcut icon" type="x-icon" href="../images/logo/Apothecare-minilogo-nobg.png">
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
          <a href="<?php echo (isset($_SESSION['user_icon']) && $_SESSION['user_icon'] == true) ? 'account.php' : 'register.php'; ?>" aria-label="User Account">
            <?php if (isset($_SESSION['user_icon']) && $_SESSION['user_icon'] == true): ?>
          <img src="../images/icons/user-found.svg" alt="user" />
            <?php else: ?>
          <img src="../images/icons/user.svg" alt="user" />
          <?php endif; ?></a>
          <a href="#" aria-label="Search"><img src="../images/icons/search.svg" alt="Search"/></a>
        </div>
      </header>
    </div>

    <div class="account-content">
      <div class="account-section">
        <h1>Mijn account</h1>
        <div class="account-gegevens">
          <h2>Gegevens van: <?php echo $voornaam . " "; echo $achternaam;?></h2>
            <form action="account.php" method="POST">
              <label for="voornaam">Voornaam</label>
              <input type="text" id="voornaam" name="voornaam" placeholder="Voer uw voornaam in" value="<?php echo $voornaam; ?>" required />

              <label for="tussenvoegsel">Tussenvoegsel</label>
              <input type="text" id="tussenvoegsel" name="tussenvoegsel" placeholder="Voer uw tussenvoegsel in" value="<?php echo $tussenvoegsel; ?>" />

              <label for="achternaam">Achternaam</label>
              <input type="text" id="achternaam" name="achternaam" placeholder="Voer uw achternaam in" value="<?php echo $achternaam; ?>" required />

              <label for="email">E-mail</label>
              <input type="email" id="email" name="mail" placeholder="Voer uw e-mail in" value="<?php echo $email; ?>" required />

              <label for="telefoon">Telefoonnummer</label>
              <input type="tel" id="telefoon" name="telefoon" placeholder="Voer uw telefoonnummer in" value="<?php echo $telefoon_nr; ?>" />
              <button type="submit" name="update-account" class="account-edit-button">Sla op</button>
            </form>

          <form method="POST" action="">
            <button type="submit" name="uitloggen" class="uitloggen" id="uitloggen">Uitloggen</button>
          </form>
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
