<?php
//---------------------------------------------------------------------------------------------------//
// Naam script		  : over.php
// Omschrijving		  : Op deze pagina staat alle informatie over het bedrijf
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
          <a href="login.php" aria-label="Login"><img src="../images/icons/user.svg" alt="login" /></a>
          <a href="#" aria-label="Search"><img src="../images/icons/search.svg" alt="search" /></a>
        </div>
      </header>

      <div class="main-content">
        <div class="image-section">
          <div class="image-container">
            <img src="/images/Apothekers.jpg" alt="Two pharmacists in white coats standing in front of a modern building" />
          </div>
          <div class="bottom-text">
            <h2>Lorem ipsum dolor sit amet</h2>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce
              magna sapien, volutpat ac dapibus ut, porttitor quis odio.
              Curabitur sed mauris at urna hendrerit sagittis. Vestibulum vel
              ipsum eget erat posuere laoreet placerat et risus. Fusce
              facilisis, sapien ut mattis tempor, odio ante volutpat nulla, vel
              lacinia arcu massa eu tellus. Morbi sodales velit sit amet
              imperdiet ultrices. Nulla suscipit accumsan convallis. In hac
              habitasse platea dictumst. Nullam eros nunc, condimentum et tempor
              ut, porttitor nec dui. Interdum et malesuada fames ac ante ipsum
              primis in faucibus. Pellentesque a nisi sit amet neque bibendum
              hendrerit. Donec fringilla erat a elit efficitur blandit. Vivamus
              volutpat lobortis arcu ut porta. Proin non lorem sodales, porta
              tortor in, porta enim. Maecenas tincidunt scelerisque feugiat.
            </p>
          </div>
        </div>

        <div class="text-section">
          <h2>lorem ipsum dolor sit amet</h2>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce magna
            sapien, volutpat ac dapibus ut, porttitor quis odio. Curabitur sed
            mauris at urna hendrerit sagittis. Vestibulum vel ipsum eget erat
            posuere laoreet placerat et risus. Fusce facilisis, sapien ut mattis
            tempor, odio ante volutpat nulla, vel lacinia arcu massa eu tellus.
            Morbi sodales velit sit amet imperdiet ultrices. Nulla suscipit
            accumsan convallis. In hac habitasse platea dictumst. Nullam eros
            nunc, condimentum et tempor ut, porttitor nec dui. Interdum et
            malesuada fames ac ante ipsum primis in faucibus. Pellentesque a
            nisi sit amet neque bibendum hendrerit. Donec fringilla erat a elit
            efficitur blandit. Vivamus volutpat lobortis arcu ut porta. Proin
            non lorem sodales, porta tortor in, porta enim. Maecenas tincidunt
            scelerisque feugiat.
          </p>
        </div>
      </div>
    </div>
  </body>
</html>
