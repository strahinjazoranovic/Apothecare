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
  <link rel="stylesheet" href="css/main.css?v=1" />
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
      <div class="cart">
        <a href="php/winkelwagen.php">
          <img src="images/icons/cart.svg" alt="Cart Icon">
        </a>
      </div>
      <div class="profile">
        <a href="<?php echo (isset($_SESSION['user_icon']) && $_SESSION['user_icon'] == true) ? 'php/account.php' : 'php/login.php'; ?>" aria-label="User Account">
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
          <li><a href="php/Producten.php">Producten</a></li>
          <li><a href="php/over.php">Over ons</a></li>
          <li><a href="php/contact.php">Contact</a></li>
        </ul>
        <div class="mobile-icons">
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
<!-- Main body -->
<div class="home-container">
  <div class="home-photo">
    <img src="images/digitale-apotheek.png" alt="Digitale apotheek">
    <div class="home-btn-container home-btn-desktop">
      <a href="php/register.php" class="home-btn">Maak Account Aan</a>
      <a href="php/producten.php" class="home-btn secondary-btn">Bekijk Producten</a>
    </div>
  </div>

  <div class="content-home">
    <!-- Welkom Sectie -->
    <div class="blok-home">
      <h1>Welkom bij <span class="apothe">Apothe</span><span class="care">Care</span></h1>
      <p class="slogan">"De snelste en gemakkelijkste manier om je medicijnen te krijgen, altijd en overal."</p>
    </div>

    <!-- Eenvoudige Bestelling Sectie -->
    <div class="blok-home">
      <h2>Eenvoudig Medicijnen Bestellen</h2>
      <p>
        ApotheCare biedt je de mogelijkheid om snel en gemakkelijk medicijnen te bestellen, zonder gedoe. Of je nu last hebt van een lichte verkoudheid of meer complexe zorg nodig hebt, onze gebruiksvriendelijke online platformen helpen je om de juiste medicijnen direct in huis te krijgen.
      </p>
    </div>

    <!-- Ervaring en Technologie Sectie -->
    <div class="blok-home">
      <h2>Jarenlange Ervaring en Moderne Technologie</h2>
      <p>
        Met onze jarenlange ervaring in de farmaceutische sector combineren we traditionele zorg met moderne technologie. ApotheCare zorgt ervoor dat je altijd de juiste producten kunt vinden, van pijnstillers tot specialistische medicijnen. Dit wordt ondersteund door gedetailleerde productinformatie, gebruikersreviews en snelle leveringen.
      </p>
    </div>

    <!-- Stressvrije Zorg Sectie -->
    <div class="blok-home">
      <h2>Toegankelijke en Stressvrije Zorg</h2>
      <p>
        Wij geloven dat zorg toegankelijk en stressvrij moet zijn. Daarom hebben we een systeem ontwikkeld waarmee je eenvoudig je medicatie kunt beheren en bestellen, waar je ook bent. Geen wachttijden, geen ingewikkelde formulieren, gewoon duidelijke en betrouwbare service.
      </p>
    </div>

    <!-- Call to Action Knoppen -->
    <div class="home-btn-container home-btn-mobile">
      <a href="php/register.php" class="home-btn">Maak Account Aan</a>
      <a href="php/producten.php" class="home-btn secondary-btn">Bekijk Producten</a>
    </div>
  </div>
</div>

<!-- chatbot -->
  <div class="chatBot">
    Need help? chat with our bot <img src="images/icons/headphones.svg" />
  </div>
  <script src="js/main.js"></script>            
</body>
</html>
