// This is the main JavaScript file for the project
document.addEventListener('DOMContentLoaded', function () {
    // Initialize cart functionality
    initCart();
});

// hiermee check ik of het ingevulde wachtwoord het zelfde is als die daarboven
function checkPassword(event) {
    let password = document.getElementById("password").value;
    let confirmPassword = document.getElementById("againpassword").value;

    if (password !== confirmPassword) {
        alert("Wachtwoorden komen niet overeen!");
        event.preventDefault(); // Voorkomt dat het formulier wordt verzonden
    }
}

// Zorg dat het script pas wordt uitgevoerd als de pagina is geladen
document.addEventListener("DOMContentLoaded", function () {
    let form = document.querySelector("form");
    if (form) {
        form.addEventListener("submit", checkPassword);
    } else {
        console.error("Formulier niet gevonden!");
    }
});


// Zorgt ervoor dat het wachtwoord voldoet aan de vereisten
function validatePassword(event) {
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("againpassword").value;
    var errorMessage = "";

    // Controleer of het wachtwoord hetzelfde is
    if (password !== confirmPassword) {
        errorMessage += "Wachtwoorden komen niet overeen!\n";
    }

    // Controleer of het wachtwoord minstens 8 tekens lang is
    if (password.length < 8) {
        errorMessage += "Het wachtwoord moet minstens 8 tekens lang zijn.\n";
    }

    // Controleer of het wachtwoord een speciaal teken bevat
    var specialCharPattern = /[!@#$%^&*(),.?":{}|<>]/;
    if (!specialCharPattern.test(password)) {
        errorMessage += "Het wachtwoord moet minstens één speciaal teken bevatten.\n";
    }

    // Als er een fout is, toon de foutmeldingen
    if (errorMessage) {
        alert(errorMessage);
        event.preventDefault(); // Voorkomt dat het formulier wordt verzonden
    }


// winkelwagen functie    
}
