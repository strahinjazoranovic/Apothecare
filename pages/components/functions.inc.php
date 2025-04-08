<?php

// Check of de variable leeg zijn
function emptyInputSignup($name, $achternaam, $email, $ww, $wwrepeat) {
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

    $hashedWw = password_hash($ww, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sssss", $naam, $tussenv, $achternaam, $email, $hashedWw);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../account.php?error=none");
    exit();
}

?>