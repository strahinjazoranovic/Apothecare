<?php
//---------------------------------------------------------------------------------------------------//
// Naam script          : producten.php
// Omschrijving          : Hier kan je alle producten vinden.
// Naam ontwikkelaar: Ebenezer Boateng
// Project              : Apothecare
// Datum                : projectweek - periode 3 - 2025
//---------------------------------------------------------------------------------------------------//
  session_start();
  include '../DB_connect.php';
// Haal de zoekterm en filteropties op
  $search = isset($_GET['search']) ? $_GET['search'] : '';
  $filter = isset($_GET['filter']) ? $_GET['filter'] : '';
// Bouw de SQL-query voor de producten met filters
  $sql = "SELECT * FROM producten WHERE naam LIKE '%$search%'";

// Voeg filter toe op pilsoort als dat nodig is
  if ($filter) {
    $sql .= " AND pilsoort = '$filter'";
  }

  $sql .= " ORDER BY naam ASC"; // Voeg sorteervolgorde toe, pas dit aan naar wens

  $result = $conn->query($sql);
?>

<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Apothecare - Producten</title>
  <link rel="stylesheet" href="../css/main.css" />
  <link rel="shortcut icon" type="x-icon" href="../images/logo/Apothecare-minilogo-nobg.png" />
  <!-- Dit is voor de font-->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet" />
</head>
<body>
  <!-- header -->
  <header class="product-page">
    <div class="logo">
      <a href="../index.php"><img src="../images/logo/apothecare-nobg.png" alt="Logo"></a>
    </div>
    <nav class="product-nav">
      <ul>
        <li><a href="producten.php">Producten</a></li>
        <li><a href="over.php">Over ons</a></li>
        <li><a href="contact.php">Contact</a></li>
      </ul>
    </nav>

    <div class="icons product-icons">
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
        <a href="<?php echo (isset($_SESSION['user_icon']) && $_SESSION['user_icon'] == true) ? 'account.php' : 'login.php'; ?>">
          <?php if (isset($_SESSION['user_icon']) && $_SESSION['user_icon'] == true): ?>
            <img src="../images/icons/user-found.svg" alt="user">
          <?php else: ?>
            <img src="../images/icons/user-wit.svg" alt="user">
          <?php endif; ?>
        </a>
      </div>
    </div>
  </header>

  <!-- main body -->
  <div class="product-filter-container">
    <form method="get">
      <div class="search-icon"></div>
      <input type="text" name="search" placeholder="Zoek producten" value="<?php echo $search; ?>">
      <select name="filter">
        <option value="">Alle pilsoorten</option>
        <option value="Pijnstillers" <?php if ($filter == 'Pijnstillers') echo 'selected'; ?>>Pijnstillers</option>
        <option value="Antibiotica" <?php if ($filter == 'Antibiotica') echo 'selected'; ?>>Antibiotica</option>
        <option value="Allergiemedicijnen" <?php if ($filter == 'Allergiemedicijnen') echo 'selected'; ?>>Allergiemedicijnen</option>
        <option value="Maag- en darmmedicijnen" <?php if ($filter == 'Maag- en darmmedicijnen') echo 'selected'; ?>>Maag- en darmmedicijnen</option>
        <option value="Hoge bloeddruk medicijnen" <?php if ($filter == 'Hoge bloeddruk medicijnen') echo 'selected'; ?>>Hoge bloeddruk medicijnen</option>
        <option value="Huidmedicijnen" <?php if ($filter == 'Huidmedicijnen') echo 'selected'; ?>>Huidmedicijnen</option>
        <option value="Hoest- en verkoudheidsmiddelen" <?php if ($filter == 'Hoest- en verkoudheidsmiddelen') echo 'selected'; ?>>Hoest- en verkoudheidsmiddelen</option>
        <option value="Diabetes medicijnen" <?php if ($filter == 'Diabetes medicijnen') echo 'selected'; ?>>Diabetes medicijnen</option>
        <option value="Vitamine- en mineralensupplementen" <?php if ($filter == 'Vitamine- en mineralensupplementen') echo 'selected'; ?>>Vitamine- en mineralensupplementen</option>
        <option value="Oogdruppels" <?php if ($filter == 'Oogdruppels') echo 'selected'; ?>>Oogdruppels</option>
        <option value="Anticonceptiemiddelen" <?php if ($filter == 'Anticonceptiemiddelen') echo 'selected'; ?>>Anticonceptiemiddelen</option>
        <option value="Slaap- en kalmeringsmiddelen" <?php if ($filter == 'Slaap- en kalmeringsmiddelen') echo 'selected'; ?>>Slaap- en kalmeringsmiddelen</option>
        <option value="Vaccins" <?php if ($filter == 'Vaccins') echo 'selected'; ?>>Vaccins</option>
        <option value="Anticonceptiepillen" <?php if ($filter == 'Anticonceptiepillen') echo 'selected'; ?>>Anticonceptiepillen</option>
      </select>
      <button type="submit">Filteren</button>
    </form>
  </div>

  <!-- Display van de producten -->
  <div class="product-grid">
    <?php while ($row = $result->fetch_assoc()) { ?>
      <div class="product-item">
        <img src="<?php echo $row['image_url']; ?>" alt="<?php echo $row['naam']; ?>" width="400" height="400">
        <h2><?php echo $row['naam']; ?></h2>
        <p><?php echo $row['beschrijving']; ?></p>
        <p>Prijs: €<?php echo $row['prijs']; ?></p>
        <button>Voeg toe aan winkelmand</button>
      </div>
    <?php } ?>
  </div>

  <script src="../js/main.js"></script>
</body>
</html>
