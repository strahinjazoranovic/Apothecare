// Javascript code

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
