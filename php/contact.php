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
    <link rel="stylesheet" href="/css/main.css" />
   
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
        <!-- Logo dat terug linkt naar de homepage -->
        <a href="index.php"><img src="../images/logo/apothecare-nobg.png" class="logo" alt="Apothecare logo" /></a>
       
        <!-- Hoofd navigatie menu -->
        <nav>
            <ul>
                <li><a href="producten.php">Producten</a></li>
                <li><a href="over.php">Over</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>
       
        <!-- Icoontjes voor winkelwagen, gebruikersaccount en zoeken -->
        <div class="icons">
            <a href="winkelwagen.php" aria-label="Shopping Cart"><img src="../images/icons/cart.svg" alt="Winkelwagen" /></a>
            <a href="login.php" aria-label="User Account"><img src="../images/icons/user.svg" alt="Gebruikersaccount" /></a>
            <a href="#" aria-label="Search"><img src="../images/icons/search.svg" alt="Zoeken" /></a>
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
    /* Algemene stijlen */
:root {
    --primary-color: #4a90e2;
    --secondary-color: #2c3e50;
    --light-gray: #f5f7fa;
    --medium-gray: #e1e1e1;
    --dark-gray: #333;
    --white: #ffffff;
    --hover-blue: #3a7bc8;
}

* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

body {
    font-family: 'Poppins', sans-serif;
    background-color: var(--light-gray);
    color: var(--dark-gray);
    line-height: 1.6;
    min-height: 100vh;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

/* Header stijlen */
header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px 0;
    border-bottom: 1px solid var(--medium-gray);
    margin-bottom: 40px;
    background-color: var(--white);
    position: sticky;
    top: 0;
    z-index: 100;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

.logo {
    height: 50px;
    width: auto;
    transition: transform 0.3s;
}

.logo:hover {
    transform: scale(1.05);
}

nav ul {
    display: flex;
    list-style: none;
    gap: 30px;
}

nav a {
    text-decoration: none;
    color: var(--dark-gray);
    font-weight: 500;
    transition: all 0.3s;
    padding: 5px 0;
    position: relative;
}

nav a:hover {
    color: var(--primary-color);
}

nav a::after {
    content: '';
    position: absolute;
    width: 0;
    height: 2px;
    background: var(--primary-color);
    bottom: 0;
    left: 0;
    transition: width 0.3s;
}

nav a:hover::after {
    width: 100%;
}

.icons {
    display: flex;
    gap: 20px;
}

.icons img {
    height: 24px;
    width: auto;
    opacity: 0.7;
    transition: all 0.3s;
}

.icons a:hover img {
    opacity: 1;
    transform: translateY(-2px);
}

/* Contact inhoud */
.contact-content {
    display: flex;
    gap: 50px;
    margin-bottom: 60px;
    align-items: flex-start;
}

.faq-section {
    flex: 1;
    min-width: 0;
}

.contact-form {
    flex: 1;
    min-width: 0;
}

.faq-section h2, 
.contact-form h2 {
    font-size: 28px;
    margin-bottom: 25px;
    color: var(--secondary-color);
    position: relative;
    padding-bottom: 10px;
}

.faq-section h2::after,
.contact-form h2::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: 0;
    width: 50px;
    height: 3px;
    background: var(--primary-color);
}

/* FAQ stijlen */
.faq-item {
    margin-bottom: 15px;
    border: 1px solid var(--medium-gray);
    border-radius: 8px;
    overflow: hidden;
    transition: all 0.3s;
}

.faq-item:hover {
    box-shadow: 0 3px 10px rgba(0,0,0,0.1);
}

.faq-question {
    padding: 18px 20px;
    background-color: var(--white);
    cursor: pointer;
    display: flex;
    align-items: center;
    font-weight: 500;
    transition: all 0.3s;
    user-select: none;
}

.faq-question:hover {
    background-color: #f9f9f9;
}

.faq-question.active {
    background-color: #f0f4f8;
    color: var(--secondary-color);
}

.arrow {
    margin-right: 15px;
    font-size: 12px;
    transition: transform 0.3s;
}

.faq-question.active .arrow {
    transform: rotate(90deg);
}

.faq-answer {
    padding: 0 20px;
    background-color: var(--white);
    border-top: 1px solid var(--medium-gray);
    display: none;
    animation: fadeIn 0.3s ease-in-out;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(-10px); }
    to { opacity: 1; transform: translateY(0); }
}

.faq-answer p {
    padding: 20px 0;
    margin: 0;
    color: #555;
}

/* Contact formulier stijlen */
.contact-form {
    background-color: var(--white);
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
}

.form-group {
    margin-bottom: 25px;
}

.form-group label {
    display: block;
    margin-bottom: 10px;
    font-weight: 500;
    color: var(--secondary-color);
}

.form-group input,
.form-group textarea {
    width: 100%;
    padding: 14px 15px;
    border: 1px solid var(--medium-gray);
    border-radius: 6px;
    font-family: 'Poppins', sans-serif;
    font-size: 15px;
    transition: all 0.3s;
}

.form-group input:focus,
.form-group textarea:focus {
    border-color: var(--primary-color);
    outline: none;
    box-shadow: 0 0 0 3px rgba(74, 144, 226, 0.2);
}

.form-group textarea {
    resize: vertical;
    min-height: 150px;
}

.submit-btn {
    background-color: var(--primary-color);
    color: var(--white);
    border: none;
    padding: 14px 30px;
    border-radius: 6px;
    cursor: pointer;
    font-family: 'Poppins', sans-serif;
    font-weight: 500;
    font-size: 16px;
    transition: all 0.3s;
    width: 100%;
    letter-spacing: 0.5px;
}

.submit-btn:hover {
    background-color: var(--hover-blue);
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}

.submit-btn:active {
    transform: translateY(0);
}

/* Responsive aanpassingen */
@media (max-width: 900px) {
    .contact-content {
        flex-direction: column;
        gap: 40px;
    }
    
    .faq-section, 
    .contact-form {
        width: 100%;
    }
}

@media (max-width: 768px) {
    header {
        flex-direction: column;
        gap: 20px;
        padding: 15px 0;
    }
    
    nav ul {
        gap: 15px;
        flex-wrap: wrap;
        justify-content: center;
    }
    
    .icons {
        margin-top: 10px;
    }
    
    .faq-section h2, 
    .contact-form h2 {
        font-size: 24px;
    }
    
    .form-group input,
    .form-group textarea {
        padding: 12px 15px;
    }
}

@media (max-width: 480px) {
    .container {
        padding: 0 15px;
    }
    
    .contact-form {
        padding: 20px;
    }
    
    .faq-question {
        padding: 15px;
    }
    
    .submit-btn {
        padding: 12px 20px;
    }
}
</style>
</body>
</html>