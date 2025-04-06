<?php
//---------------------------------------------------------------------------------------------------//
// Naam script		  : winkelwagen.php
// Omschrijving		  : hier vind je alle items die je wilt kopen
// Naam ontwikkelaar: Saleh Saleh
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
    <title>Apothecare - Winkelwagen</title>
    <link rel="stylesheet" href="../css/main.css" />
    <link rel="stylesheet" href="../css/winkelwagen.css" />
    <link rel="shortcut icon" type="x-icon" href="../images/icons/cart-favicon.png" />
    <!-- Dit is voor de font-->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
  </head>
  <body>
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
      <div class="main-container">
        <h1 class="title">Winkelwagen</h1>
        <div class="winkelwagen-container">
          <div class="cart-items">
            <div class="winkel-item cart-item" data-price="29.99">
              <div class="center-item">
                <img src="../images/placeholder-product-img.png" alt="Product photo" class="winkel-img"/>
                <h5 class="item-naam">Medicijn naam</h5>
              </div>
              <div class="center-item">
                <div class="quantity-control">
                  <button class="quantity-btn minus-btn"><i class="fas fa-minus"></i></button>
                  <input type="number" class="quantity-input" min="1" value="1">
                  <button class="quantity-btn plus-btn"><i class="fas fa-plus"></i></button>
                </div>
                <div class="item-text">
                  <p class="item-beschrijving">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  </p>
                </div>
                <div class="item-price">
                  <span>€<span class="price-amount">29.99</span></span>
                </div>
                <div class="remove">
                  <button class="remove-btn"><i class="fas fa-trash"></i></button>
                </div>
              </div>
            </div>
          </div>
         
          <div class="order-summary">
            <h4>Order Summary</h4>
            <div class="summary-row">
              <span>Subtotal:</span>
              <span class="subtotal">€29.99</span>
            </div>
            <div class="summary-row">
              <span>Tax:</span>
              <span class="tax">€3.00</span>
            </div>
            <div class="summary-row total-row">
              <span>Total:</span>
              <span class="total-price">€32.99</span>
            </div>
            <button class="checkout-btn">Checkout</button>
          </div>
        </div>
      </div>

    <script src="../js/cart.js"></script>
    <script src="../js/main.js"></script>
  </body>
</html>
