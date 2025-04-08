// Wacht tot de hele pagina is geladen voordat we de winkelwagen initialiseren
document.addEventListener('DOMContentLoaded', function() {
    console.log('Pagina is geladen, winkelwagen wordt klaargemaakt');
    initCart();
});

// Deze functie maakt de winkelwagen klaar voor gebruik
function initCart() {
    // Zoek het deel van de pagina waar de winkelwagen-items staan
    const cartItemsContainer = document.querySelector('.cart-items');
    
    // Controleer of de winkelwagen bestaat
    if (!cartItemsContainer) {
        console.error('Winkelwagen niet gevonden op de pagina');
        return;
    }

    // Maak elk item in de winkelwagen klaar
    document.querySelectorAll('.winkel-item').forEach(item => {
        initCartItem(item);
    });

    // Voeg luisteraars toe voor klikken en veranderingen
    cartItemsContainer.addEventListener('click', handleCartClick);
    cartItemsContainer.addEventListener('change', handleQuantityChange);

    // Bereken de totale prijs
    updateCartSummary();
}

// Maakt een enkel winkelwagen-item klaar
function initCartItem(item) {
    // Zoek de prijs en hoeveelheid invoer van het item
    const priceElement = item.querySelector('.item-price .price-amount');
    const quantityInput = item.querySelector('.quantity-input');
    
    // Controleer of alle onderdelen er zijn
    if (!priceElement || !quantityInput) {
        console.error('Onderdelen ontbreken in winkelwagen-item', item);
        return;
    }

    // Bewaar de basisprijs van het item
    const basePrice = parseFloat(priceElement.textContent);
    item.dataset.basePrice = basePrice;
    
    // Zet de beginhoeveelheid op 1 als er nog geen waarde is
    quantityInput.value = quantityInput.value || 1;
    
    // Bereken de beginprijs
    updateItemPrice(item);
}

// Handelt klikken in de winkelwagen af
function handleCartClick(e) {
    // Zoek het dichtstbijzijnde winkelwagen-item
    const item = e.target.closest('.winkel-item');
    if (!item) return;

    // Zoek de hoeveelheid invoer van het item
    const input = item.querySelector('.quantity-input');
    if (!input) return;

    // Kijk of er op de plus-knop is geklikt
    if (e.target.closest('.plus-btn')) {
        input.value = parseInt(input.value) + 1;
        updateItemPrice(item);
    } 
    // Kijk of er op de min-knop is geklikt
    else if (e.target.closest('.minus-btn')) {
        const newValue = parseInt(input.value) - 1;
        input.value = newValue > 0 ? newValue : 1; // Zorg dat het niet onder 1 komt
        updateItemPrice(item);
    } 
    // Kijk of er op de verwijder-knop is geklikt
    else if (e.target.closest('.remove-btn')) {
        removeCartItem(item);
    }
}

// Handelt veranderingen in de hoeveelheid af
function handleQuantityChange(e) {
    // Controleer of de verandering in een hoeveelheidsinvoer was
    if (e.target.classList.contains('quantity-input')) {
        const input = e.target;
        const value = parseInt(input.value);
        
        // Zorg dat de waarde minimaal 1 is
        input.value = value > 0 ? value : 1;
        updateItemPrice(input.closest('.winkel-item'));
    }
}

// Werkt de prijs van een item bij op basis van de hoeveelheid
function updateItemPrice(item) {
    const quantityInput = item.querySelector('.quantity-input');
    const priceDisplay = item.querySelector('.item-price .price-amount');

    // Controleer of alle onderdelen er zijn
    if (!quantityInput || !priceDisplay || !item.dataset.basePrice) {
        console.error('Gegevens ontbreken voor prijsupdate', item);
        return;
    }

    // Bereken de nieuwe prijs
    const basePrice = parseFloat(item.dataset.basePrice);
    const quantity = parseInt(quantityInput.value);
    const totalPrice = basePrice * quantity;

    // Toon de nieuwe prijs met 2 decimalen
    priceDisplay.textContent = totalPrice.toFixed(2);
    updateCartSummary();
}

// Verwijdert een item uit de winkelwagen
function removeCartItem(item) {
    // Voeg een vloeiende verwijder-animatie toe
    item.style.transition = 'opacity 0.3s, transform 0.3s';
    item.style.opacity = '0';
    item.style.transform = 'translateX(-100%)';
    
    // Wacht tot de animatie klaar is voordat het item echt wordt verwijderd
    setTimeout(() => {
        item.remove();
        updateCartSummary();
        checkEmptyCart();
    }, 300);
}

// Werkt het overzicht van de winkelwagen bij (subtotaal, belasting, totaal)
function updateCartSummary() {
    const items = document.querySelectorAll('.winkel-item');
    let subtotal = 0;

    // Tel alle prijzen van de items op
    items.forEach(item => {
        const priceElement = item.querySelector('.item-price .price-amount');
        if (priceElement) {
            subtotal += parseFloat(priceElement.textContent);
        }
    });

    // Bereken belasting (10%) en totaalbedrag
    const tax = subtotal * 0.1;
    const total = subtotal + tax;

    // Toon de bedragen op de pagina
    document.querySelector('.subtotal').textContent = `€${subtotal.toFixed(2)}`;
    document.querySelector('.tax').textContent = `€${tax.toFixed(2)}`;
    document.querySelector('.total-price').textContent = `€${total.toFixed(2)}`;
}

// Controleert of de winkelwagen leeg is en toont een bericht
function checkEmptyCart() {
    const cartItemsContainer = document.querySelector('.cart-items');
    const orderSummary = document.querySelector('.order-summary');

    if (!cartItemsContainer || !orderSummary) return;

    // Als er geen items meer zijn
    if (document.querySelectorAll('.winkel-item').length === 0) {
        // Toon een bericht dat de winkelwagen leeg is
        cartItemsContainer.innerHTML = `
            <div class="empty-message">
                <p>Je winkelwagen is leeg</p>
                <a href="producten.php" class="continue-shopping">Verder winkelen</a>
            </div>`;
        orderSummary.style.display = 'none'; // Verberg het overzicht
    } else {
        orderSummary.style.display = 'block'; // Toon het overzicht
    }
}

// Functie om het mobiele menu te tonen/verbergen
function toggleMobileMenu() {
    const mobileMenu = document.getElementById('mobileMenu');
    mobileMenu.classList.toggle('active'); // Voegt/verwijdert de 'active' klasse
}