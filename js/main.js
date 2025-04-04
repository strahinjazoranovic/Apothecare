// menu opener/closer header
function toggleSearch() {
  const form = document.getElementById('search-form');
  form.style.display = form.style.display === 'none' ? 'block' : 'none';
}

function toggleMobileMenu() {
  const menu = document.getElementById('mobileMenu');
  const chatBot = document.getElementById('chatBot');

  menu.classList.toggle('active');

  if (menu.classList.contains('active')) {
      if (chatBot) chatBot.style.display = 'none';
  } else {
      if (chatBot) chatBot.style.display = 'block';
  }
}

function submitSearch(e) {
  if (e.key === 'Enter') {
      e.target.form.submit();
  }
}

// Extra: sluit menu bij klikken op een link
document.addEventListener('DOMContentLoaded', function () {
  document.querySelectorAll('.mobile-menu a').forEach(link => {
      link.addEventListener('click', () => {
          const menu = document.getElementById('mobileMenu');
          const chatBot = document.getElementById('chatBot');

          menu.classList.remove('active');
          if (chatBot) chatBot.style.display = 'block';
      });
  });
});

// header search (was dubbel, gefixt)
function toggleSearch() {
  const form = document.getElementById('search-form');
  form.style.display = form.style.display === 'block' ? 'none' : 'block';
}

function submitSearch(event) {
  if (event.key === 'Enter') {
      document.getElementById('search-form').submit();
  }
}

// This is the main JavaScript file for the project
document.addEventListener('DOMContentLoaded', function () {
  // Initialize cart functionality
  initCart();
});

// hiermee check ik of het ingevulde wachtwoord hetzelfde is als die daarboven
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
}
