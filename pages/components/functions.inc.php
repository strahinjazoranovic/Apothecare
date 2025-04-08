<?php

// Check of de variable leeg zijn
function emptyInputRegister($name, $achternaam, $email, $ww, $wwrepeat) {
    $result;
    if(empty($name) || empty($achternaam) || empty($email) || empty($ww) || empty($wwrepeat)){
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

// Check of de layout email klopt
function invalidEmail($email) {
    $result;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function wwMatch($ww, $wwrepeat) {
    $result;
    if($ww !== $wwrepeat){
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function emailExists($conn, $email) {
    $sql = "SELECT * FROM user WHERE email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../register.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn, $naam, $tussenv, $achternaam, $email, $ww) {
    $sql = "INSERT INTO user (voornaam, tussenvoegsel, achternaam, email, wachtwoord) VALUES (?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../register.php?error=stmtfailed");
        exit();
    }

    $db_ww = hash('sha256', $ww);

    mysqli_stmt_bind_param($stmt, "sssss", $naam, $tussenv, $achternaam, $email, $db_ww);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../login.php?error=none");
    exit();
}

function emptyInputLogin($email, $ww) {
    $result;
    if(empty($email) || empty($ww)){
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function loginUser($conn, $email, $ww) {
    $emailExists = emailExists($conn, $email);

    if ($emailExists === false) {
        header("location: ../login.php?error=wrongLogin");
        exit();
    }

    $db_ww = $emailExists["wachtwoord"];
    $wwHashed = hash('sha256', $ww);
    if($db_ww === $wwHashed) {
        $wwChecker = true;
    } else {
        $wwChecker = false;
    }

    if ($wwChecker === false) {
        header("location: ../login.php?error=wrongLogin");
        exit();
    } else if ($wwChecker === true) {
        session_start();
        $_SESSION["userid"] = $emailExists["ID"];
        header("location: ../account.php?error=none");
        exit();
    }
}