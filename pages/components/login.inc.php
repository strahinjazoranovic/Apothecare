<?php

if (isset($_POST["login"])) {

    // alle items die worden gepost worden in een apparte variable gezet
    $email = $_POST["email"];
    $ww = $_POST["ww"];

    // include de database connectie en de functies file.
    require_once '../../config/DB_connect.php';
    require_once 'functions.inc.php';


    if (emptyInputLogin($email, $ww) !== false) {
        header("location: ../login.php?error=emptyinput");
        exit();
    }

    loginUser($conn, $email, $ww);
} else {
    header("location: ../login.php?error=wrongWay");
    exit();
}

