<link rel="stylesheet" href="css/main.css">
<?php
    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "Apothecare";
    $conn = "";

try{
    $conn = mysqli_connect($db_server,
                           $db_user,
                           $db_pass,
                           $db_name);
}
catch(mysqli_sql_exception){
    // echo"<p class='db_error'>Database '$db_name' could <span>not</span> connect!</p>";
}

if($conn){
    // echo"<p class='db_connected'>Database '$db_name' is connected!</p>";
} 
?>

<!-- Om connectie te testen haal de echo comando's uit de comment -->