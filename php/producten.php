<?php
//---------------------------------------------------------------------------------------------------//
// Naam script		  : producten.php
// Omschrijving		  : Hier kan je alle producten vinden.
// Naam ontwikkelaar: Ebenezer Boateng
// Project		      : Apothecare
// Datum		        : projectweek - periode 3 - 2025
//---------------------------------------------------------------------------------------------------//
  session_start();
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
   <header>
     <div class="logo">
       <a href="../index.php"><img src="../images/logo/apothecare-nobg.png" alt="Logo"></a>
     </div>
      <nav>
       <ul>
         <li><a href="producten.php">Producten</a></li>
         <li><a href="over.php">Over ons</a></li>
         <li><a href="contact.php">Contact</a></li>
       </ul>
     </nav>

      <div class="icons">
        <div class="search">
          <img src="../images/icons/search.svg" alt="Search Icon">
        </div>
       <div class="cart">
         <a href="winkelwagen.php">
           <img src="../images/icons/cart.svg" alt="Cart Icon">
         </a>
       </div>
       <div class="profile">
         <a href="<?php echo (isset($_SESSION['user_icon']) && $_SESSION['user_icon'] == true) ? 'account.php' : 'register.php'; ?>" aria-label="User Account">
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
         <li><a href="#">Producten</a></li>
         <li><a href="#">Over ons</a></li>
         <li><a href="#">Contact</a></li>
       </ul>
       <div class="mobile-icons">
         <a href="#"><img src="../images/icons/search.svg" alt="Search Icon"></a>
         <a href="winkelwagen.php"><img src="../images/icons/cart.svg" alt="Cart Icon"></a>
         <a href="<?php echo (isset($_SESSION['user_icon']) && $_SESSION['user_icon'] == true) ? 'account.php' : 'register.php'; ?>">
           <?php if (isset($_SESSION['user_icon']) && $_SESSION['user_icon'] == true): ?>
             <img src="../images/icons/user-found.svg" alt="user">
           <?php else: ?>
             <img src="../images/icons/user.svg" alt="user">
           <?php endif; ?>
         </a>
       </div>
     </div>
   </header>
<!-- main body -->
   <div class="filter">
     <button class="button-filter">Filteren</button>
   </div>

   <div class="product-grid">
     <div class="product-card">
       <img src="../images/placeholder-product-img.png" alt="Product afbeelding" />
       <div class="content">
         <h2>Lorem ipsum dolor sit amet</h2>
         <p>
           Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce magna
           sapien, volutpat ac dapibus ut, porttitor quis odio.
         </p>
         <span class="price">€19.99</span>
       </div>
       <a href="#" class="button">Toevoegen aan winkelmand</a>
     </div>
   </div>
   <script src="../js/main.js"></script>
 </body>
</html>
