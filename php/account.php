<?php
//---------------------------------------------------------------------------------------------------//
// Naam script		  : account.php
// Omschrijving		  : Deze file laat het account van de klant zien.
// Naam ontwikkelaar: Tejo Veldman
// Project		      : Apothecare
// Datum		        : projectweek - periode 3 - 2025
//---------------------------------------------------------------------------------------------------//
  session_start();
  //database connection
  include("../DB_connect.php");
  // Als de gebruiker niet is ingelogd stuur door naar inlogpagina
  if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
  }

  //als er een account is aangemaakt zal er een popup komen door deze code  
  if(isset($_SESSION['gegevens_bijwerken'])){
    $gegevens_bijwerken_popup = "block";
    unset($_SESSION['gegevens_bijwerken']);
  } else {
    $gegevens_bijwerken_popup = "none";
  }

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
        $_SESSION['gegevens_bijwerken'] = "bijgewerkt";
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
    <!-- ingelogd popup -->
    <div class="popup" style="display: <?php echo $gegevens_bijwerken_popup; ?>;"><p>✅ Account succesvol bijgewerkt!</p></div>
  <header>
    <div class="logo">
      <a href="index.php"><img src="../images/logo/apothecare-nobg.png" alt="Logo"></a>
    </div>

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
        <a href="<?php echo (isset($_SESSION['user_icon']) && $_SESSION['user_icon'] == true) ? 'account.php' : 'login.php'; ?>" aria-label="User Account">
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
              <img src="../images/icons/user-wit.svg" alt="user">
            <?php endif; ?>
          </a>
        </div>
      </div>
    </header>

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
              <button type="submit" name="update-account" class="account-edit-button">Opslaan</button>

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
    <script src="../js/main.js"></script>
  </body>
</html>
