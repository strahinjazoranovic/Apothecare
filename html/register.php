<?php
//---------------------------------------------------------------------------------------------------//
// Naam script		  : register.php
// Omschrijving		  : Hier maak je een nieuw account aan
// Naam ontwikkelaar  : Groep 7
// Project		      : Apothecare
// Datum		      : projectweek - periode 3 - 2025
//---------------------------------------------------------------------------------------------------// 
    session_start();
    include("../DB_connect.php");

      // Controleer of de gebruiker is ingelogd
    if (isset($_SESSION['user_icon']) && $_SESSION['user_icon'] == true) {
    // Als ingelogd, stuur door naar account.php
    header('Location: account.php');
    exit(); // Stop verdere uitvoering van de pagina
    }

    if(isset($_POST['register'])) {
        $voornaam = $_POST['voornaam'];
        $tussenvoegsel = $_POST['tussenvoegsel'];
        $achternaam = $_POST['achternaam'];
        $mail = $_POST['mail'];
        $wachtwoord = password_hash($_POST['wachtwoord'], PASSWORD_DEFAULT);

        $query = mysqli_query($conn, "Insert into user (voornaam, tussenvoegsel, achternaam, email, wachtwoord) Values ('$voornaam', '$tussenvoegsel', '$achternaam', '$mail', '$wachtwoord')");
        if($query){
            $_SESSION['account_aanmaak'] = true;
            header("Location: login.php");
            exit();
        } else {
            echo"<script>alert('Account aanmaken mislukt probeer opnieuw of zoek contact op.'); </script>";
        }
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apothecare</title>
    <link rel="stylesheet" href="../css/main.css" />
    <link rel="shortcut icon" type="x-icon" href="../images/logo/Apothecare-minilogo-nobg.png">
</head>
<body>
    <div class="container">
        <header class="nav-register">
            <nav>
                <ul>
                    <li><a href="producten.php">Producten</a></li>
                    <li><a href="over.php">Over</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </nav>
            <div class="icons">
                <a href="winkelwagen.php" aria-label="Shopping Cart"><img src="../images/icons/cart.svg" alt="cart"></a>
                <a href="login.php" aria-label="Login"><img src="../images/icons/user.svg" alt="login"></a>
                <a href="#" aria-label="Search"><img src="../images/icons/search.svg" alt="search"></a>
            </div>
        </header>
    </div>

    <div class="container1">
        <div class="login-box">
            <a href="login.php"><img src="../images/icons/back.svg"></a>
            <div id="imglogo">
                <a href="../index.php"><img src="../images/logo/apothecare-nobg.png" class="logo" alt="logopng"></a>
            </div>

            <form onsubmit="validatePassword(event)" method="POST">  

                <label for="firstname">Voornaam</label>
                <input type="text" name="voornaam" id="voornaam" placeholder="Voer uw naam in" required>

                <label for="firstname">Tussenvoegsel</label>
                <input type="text" name="tussenvoegsel" id="tussenvoegsel" placeholder="Voer uw tussenvoegsel in">

                <label for="lastname">Achternaam</label>
                <input type="text" name="achternaam" id="achternaam" placeholder="Voer uw achternaam in" required>

                <label for="email">E-mail</label>
                <input type="email" name="mail" id="email" placeholder="Voer uw e-mail in" required>

                <label for="password">Wachtwoord</label>
                <input type="password" name="wachtwoord" id="password" placeholder="Voer uw wachtwoord in" required>

                <label for="againpassword">Voer wachtwoord opnieuw in</label>
                <input type="password" id="againpassword" placeholder="Voer uw wachtwoord opnieuw in" required>

                <p class="forgot">Wachtwoord vergeten?</p>

                <button type="submit" name="register" class="button">Registreer nu</button>
            </form>
        </div>
    </div>
    <script src="../js/main.js"></script>
</body>
</html>
