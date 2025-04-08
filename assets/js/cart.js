// Cart functionaliteit voor de winkelwagenpagina
document.addEventListener('DOMContentLoaded', function() {
    initCart();
});
 
function initCart() {
    const cartItemsContainer = document.querySelector('.cart-items');
 
    if (!cartItemsContainer) return;
 
    cartItemsContainer.addEventListener('click', function(e) {
        const item = e.target.closest('.winkel-item');
        if (!item) return;
 
        const input = item.querySelector('.quantity-input');
 
        if (e.target.closest('.plus-btn')) {
            if (input) {
                input.value = parseInt(input.value) + 1;
                updateItemPrice(item);
            }
        }
       
        if (e.target.closest('.minus-btn')) {
            if (input && input.value > 1) {
                input.value = parseInt(input.value) - 1;
                updateItemPrice(item);
            }
        }
       
        if (e.target.closest('.remove-btn')) {
            item.style.transition = 'opacity 0.3s, transform 0.3s';
            item.style.opacity = '0';
            item.style.transform = 'translateX(-100%)';
            setTimeout(() => {
                item.remove();
                updateCartSummary();
                checkEmptyCart();
            }, 300);
        }
    });
 
    cartItemsContainer.addEventListener('change', function(e) {
        if (e.target.classList.contains('quantity-input')) {
            const input = e.target;
            if (input.value < 1) input.value = 1;
            updateItemPrice(input.closest('.winkel-item'));
        }
    });
 
    updateCartSummary();
}
 
function updateItemPrice(item) {
    const quantityInput = item.querySelector('.quantity-input');
    const priceDisplay = item.querySelector('.price-amount');
    const basePriceElement = item.querySelector('.item-price');
 
    if (!quantityInput || !priceDisplay || !basePriceElement) return;
 
    // Haal de originele prijs uit de HTML in plaats van een hardcoded dataset
    const basePrice = parseFloat(basePriceElement.textContent.replace('€', '').trim()) || 0;
    const quantity = parseInt(quantityInput.value) || 1;
    const totalPrice = basePrice * quantity;
 
    priceDisplay.textContent = totalPrice.toFixed(2);
    updateCartSummary();
}
 
function updateCartSummary() {
    const items = document.querySelectorAll('.winkel-item');
    let subtotal = 0;
 
    items.forEach(item => {
        const priceElement = item.querySelector('.price-amount');
        if (priceElement) {
            subtotal += parseFloat(priceElement.textContent) || 0;
        }
    });
 
    const tax = subtotal * 0.1;
    const total = subtotal + tax;
 
    document.querySelector('.subtotal').textContent = `€${subtotal.toFixed(2)}`;
    document.querySelector('.tax').textContent = `€${tax.toFixed(2)}`;
    document.querySelector('.total-price').textContent = `€${total.toFixed(2)}`;
}
 
function checkEmptyCart() {
    const cartItemsContainer = document.querySelector('.cart-items');
    const orderSummary = document.querySelector('.order-summary');
 
    if (!cartItemsContainer || !orderSummary) return;
 
    const items = document.querySelectorAll('.winkel-item');
    if (items.length === 0) {
        cartItemsContainer.innerHTML = `
            <div class="empty-message">
                <p>Je winkelwagen is leeg</p>
                <a href="producten.php" class="continue-shopping">Verder winkelen</a>
            </div>`;
        orderSummary.style.display = 'none';
    } else {
        orderSummary.style.display = 'block';
    }
}