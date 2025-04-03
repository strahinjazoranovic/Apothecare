<?php 
    include("../DB_connect.php");
    if(isset($_POST['register'])) {
        $voornaam = $_POST['voornaam'];
        $achternaam = $_POST['achternaam'];
        $mail = $_POST['mail'];
        $wachtwoord = $_POST['wachtwoord'];

        $query = mysqli_query($conn, "Insert into users (voornaam, achternaam, email, wachtwoord) Values ('$voornaam', '$achternaam', '$mail', '$wachtwoord')");
        if($query){
            echo"<script>alert('Account aangemaakt'); window.location.href = 'login.php';</script>";
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
        <header>
                <nav>
                    <ul>
                        <li><a href="producten.html">Producten</a></li>
                        <li><a href="over.html">Over</a></li>
                        <li><a href="../index.html">Home</a></li>
                    </ul>
                </nav>
                <div class="icons">
                    <a href="winkelwagen.html" aria-label="Shopping Cart"><img src="../images/icons/cart.svg" alt="cart"></a>
                    <a href="login.php" aria-label="Login"><img src="../images/icons/user.svg" alt="login"></a>
                    <a href="#" aria-label="Search"><img src="../images/icons/search.svg" alt="search"></a>
                </div>
            </header>
    </div>
    
    <div class="container1">
        <div class="login-box">
            <a href="login.php"><img src="../images/icons/back.svg"></a>
            <div id="imglogo">
                <a href="../index.html"><img src="../images/logo/apothecare-nobg.png" class="logo" alt="logopng"></a>
                </div>
            <button class="google-btn">Continue with Google</button>
            <form method="POST">  

                <label for="firstname">First name</label>
                <input type="text" name="voornaam" id="voornaam" placeholder="Enter your first name" required>

                <label for="lastname">Last name</label>
                <input type="text" name="achternaam" id="achternaam" placeholder="Enter your last name" required>

                <label for="email">Email</label>
                <input type="email" name="mail" id="email" placeholder="Enter your email" required>

                <label for="password">Password</label>
                <input type="password" name="wachtwoord" id="password" placeholder="Enter your password" required>

                <label for="againpassword">Enter password again</label>
                <input type="password" id="againpassword" placeholder="Enter your password again" required>

                <p class="forgot">Forgot password?</p>

                <button type="submit" name="register" class="button">Register now</button>
            </form>
        </div>
    </div>
    <script src="../js/main.js"></script>
</body>
</html>