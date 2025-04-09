<?php
//---------------------------------------------------------------------------------------------------//
// Naam script        : contact.php
// Omschrijving       : Contactpagina waar gebruikers vragen kunnen stellen en veelgestelde vragen kunnen bekijken
// Naam ontwikkelaar  : Groep 7
// Project            : Apothecare
// Datum              : projectweek - periode 3 - 2025
//---------------------------------------------------------------------------------------------------//
 
// Start de sessie voor eventuele sessievariabelen
session_start();
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
 
    <!-- Basis metadata voor de pagina -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <!-- Paginatitel die in de browser tab verschijnt -->
    <title>Apothecare - Contact</title>
   
    <!-- Link naar het hoofd CSS bestand -->
    <link rel="stylesheet" href="../assets/css/main.css?v=3" />
   
    <!-- Favicon (icoontje in browser tabblad) -->
    <link rel="shortcut icon" type="x-icon" href="../images/logo/Apothecare-minilogo-nobg.png" />
   
    <!-- Google Fonts - Poppins font familie -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet" />
   
    <!-- JavaScript voor de uitklapbare FAQ functionaliteit -->
    <script>
        // Wacht tot de DOM volledig geladen is
        document.addEventListener('DOMContentLoaded', function() {
            // Selecteer alle FAQ vragen
            const faqItems = document.querySelectorAll('.faq-question');
           
            // Voeg voor elke vraag een click event listener toe
            faqItems.forEach(item => {
                item.addEventListener('click', function() {
                    // Toggle de 'active' class voor styling doeleinden
                    this.classList.toggle('active');
                   
                    // Selecteer het bijbehorende antwoord element
                    const answer = this.nextElementSibling;
                   
                    // Controleer of het antwoord momenteel zichtbaar is
                    if (answer.style.display === 'block') {
                        // Verberg het antwoord en verander pijl naar rechts
                        answer.style.display = 'none';
                        this.querySelector('.arrow').textContent = '▶';
                    } else {
                        // Toon het antwoord en verander pijl naar beneden
                        answer.style.display = 'block';
                        this.querySelector('.arrow').textContent = '▼';
                    }
                });
            });
        });
    </script>
</head>
<body>
<!-- Hoofd container voor de hele pagina -->
<div class="container">
    <!-- Header sectie met logo, navigatie en iconen -->
    <header>
    <div class="logo">
      <a href="../index.php"><img src="../assets/images/logo/apothecare-nobg.png" alt="Logo"></a>
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
          <img src="../assets/images/icons/cart.svg" alt="Cart Icon">
        </a>
      </div>
      <div class="profile">
        <a href="<?php echo (isset($_SESSION['userid']) && $_SESSION['userid'] == true) ? 'account.php' : 'login.php'; ?>" aria-label="User Account">
          <?php if (isset($_SESSION['userid']) && $_SESSION['userid'] == true): ?>
            <img src="../assets/images/icons/user-found.svg" alt="user">
          <?php else: ?>
            <img src="../assets/images/icons/user.svg" alt="user">
          <?php endif; ?>
        </a>
      </div>
    </div>
    </header>
 
    <!-- Hoofdinhoud van de contactpagina -->
    <div class="contact-content">
        <!-- Sectie met veelgestelde vragen -->
        <section class="faq-section">
            <h2>Veelgestelde vragen</h2>
           
            <!-- Eerste FAQ item -->
            <div class="faq-item">
                <!-- Klikbare vraag met pijltje -->
                <div class="faq-question">
                    <span class="arrow">▶</span> Hoe kan ik mijn bestelling volgen?
                </div>
                <!-- Antwoord dat initieel verborgen is -->
                <div class="faq-answer" style="display: none;">
                    <p>Na het plaatsen van uw bestelling ontvangt u een trackingnummer per e-mail waarmee u uw pakket kunt volgen.</p>
                </div>
            </div>
           
            <!-- Tweede FAQ item -->
            <div class="faq-item">
                <div class="faq-question">
                    <span class="arrow">▶</span> Wat zijn de levertijden?
                </div>
                <div class="faq-answer" style="display: none;">
                    <p>Onze standaard levertijd is 2-3 werkdagen. Voor specifieke producten kan dit afwijken.</p>
                </div>
            </div>
           
            <!-- Derde FAQ item -->
            <div class="faq-item">
                <div class="faq-question">
                    <span class="arrow">▶</span> Kan ik een product retourneren?
                </div>
                <div class="faq-answer" style="display: none;">
                    <p>Ja, binnen 30 dagen na ontvangst kunt u producten retourneren mits deze ongeopend en in originele staat zijn.</p>
                </div>
            </div>
        </section>
 
        <!-- Contactformulier sectie -->
        <section class="contact-form">
            <h2>Neem contact met ons op</h2>
           
            <!-- Formulier dat naar verwerk_contact.php wordt gestuurd -->
            <form action="verwerk_contact.php" method="post">
                <!-- Naam invoerveld -->
                <div class="form-group">
                    <label for="naam">Naam:</label>
                    <input type="text" id="naam" name="naam" required>
                </div>
               
                <!-- E-mail invoerveld -->
                <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input type="email" id="email" name="email" required>
                </div>
               
                <!-- Vraag tekstarea -->
                <div class="form-group">
                    <label for="vraag">Uw vraag:</label>
                    <textarea id="vraag" name="vraag" rows="5" required></textarea>
                </div>
               
                <!-- Verzendknop -->
                <button type="submit" class="submit-btn">Versturen</button>
            </form>
        </section>
    </div>
</div>
 
<style>

</style>
</body>
</html>