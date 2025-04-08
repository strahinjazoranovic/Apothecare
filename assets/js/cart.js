// Cart functionaliteit voor de winkelwagenpagina
document.addEventListener('DOMContentLoaded', function() {
    initCart();
});

function initCart() {
    const cartItemsContainer = document.querySelector('.cart-items');

    if (!cartItemsContainer) return;

    // Sla de basisprijs op in een data-attribuut bij het laden
    document.querySelectorAll('.winkel-item').forEach(item => {
        const basePriceElement = item.querySelector('.item-price');
        if (basePriceElement) {
            const basePriceText = basePriceElement.textContent.replace(/[^\d,.-]/g, '').replace(',', '.');
            item.dataset.basePrice = parseFloat(basePriceText) || 0;
        }
    });

    cartItemsContainer.addEventListener('click', function(e) {
        const item = e.target.closest('.winkel-item');
        if (!item) return;

        const input = item.querySelector('.quantity-input');
        const action = 
            e.target.closest('.plus-btn') ? 'plus' :
            e.target.closest('.minus-btn') ? 'minus' :
            e.target.closest('.remove-btn') ? 'remove' : null;

        switch(action) {
            case 'plus':
                if (input) {
                    input.value = parseInt(input.value) + 1;
                    updateItemPrice(item);
                }
                break;
                
            case 'minus':
                if (input && parseInt(input.value) > 1) {
                    input.value = parseInt(input.value) - 1;
                    updateItemPrice(item);
                }
                break;
                
            case 'remove':
                removeCartItem(item);
                break;
        }
    });

    cartItemsContainer.addEventListener('change', function(e) {
        if (e.target.classList.contains('quantity-input')) {
            const input = e.target;
            const value = parseInt(input.value);
            
            if (isNaN(value)) {
                input.value = 1;
            } else if (value < 1) {
                input.value = 1;
            }
            
            updateItemPrice(input.closest('.winkel-item'));
        }
    });

    updateCartSummary();
    checkEmptyCart();
}

function updateItemPrice(item) {
    const quantityInput = item.querySelector('.quantity-input');
    const priceDisplay = item.querySelector('.price-amount');

    if (!quantityInput || !priceDisplay || !item.dataset.basePrice) return;

    const basePrice = parseFloat(item.dataset.basePrice);
    const quantity = parseInt(quantityInput.value) || 1;
    const totalPrice = basePrice * quantity;

    priceDisplay.textContent = `${totalPrice.toFixed(2)}`;
    updateCartSummary();
}

// Overige functies blijven hetzelfde...