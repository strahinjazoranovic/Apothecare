document.addEventListener('DOMContentLoaded', function() {
    // Initialize cart functionality
    initCart();
  });
  
  function initCart() {
    // Get elements
    const plusBtn = document.getElementById('item-plus');
    const minusBtn = document.getElementById('item-minus');
    const quantityInput = document.getElementById('item-number');
    const removeBtn = document.querySelector('.remove-item');
    
    // Item price (could be dynamic in a real application)
    const itemPrice = 29.99;
    
    // Event listeners
    plusBtn.addEventListener('click', function() {
      updateQuantity(1);
    });
    
    minusBtn.addEventListener('click', function() {
      updateQuantity(-1);
    });
    
    quantityInput.addEventListener('change', function() {
      validateQuantity();
      calculateTotal();
    });
    
    removeBtn.addEventListener('click', function() {
      removeItem();
    });
    
    // Calculate total on page load
    calculateTotal();
    
    // Helper functions
    function updateQuantity(change) {
      let newQuantity = parseInt(quantityInput.value) + change;
      if (newQuantity < 1) newQuantity = 1;
      quantityInput.value = newQuantity;
      calculateTotal();
    }
    
    function validateQuantity() {
      let quantity = parseInt(quantityInput.value);
      if (isNaN(quantity) || quantity < 1) {
        quantityInput.value = 1;
      }
    }
    
    function calculateTotal() {
      const quantity = parseInt(quantityInput.value);
      const subtotal = quantity * itemPrice;
      const tax = subtotal * 0.1; // 10% tax
      const total = subtotal + tax;
      
      // Update display
      document.getElementById('sub-total').textContent = `€${subtotal.toFixed(2)}`;
      document.getElementById('tax-amount').textContent = `€${tax.toFixed(2)}`;
      document.getElementById('total-price').textContent = `€${total.toFixed(2)}`;
    }
    
    function removeItem() {
      const item = document.querySelector('.winkel-item');
      item.style.transform = 'translateX(-100%)';
      item.style.opacity = '0';
      item.addEventListener('transitionend', function() {
        item.remove();
        updateCartEmptyState();
      });
    }
    
    function updateCartEmptyState() {
      const cartItems = document.querySelector('.cart-items');
      if (cartItems.children.length === 0) {
        const emptyCart = document.createElement('div');
        emptyCart.className = 'empty-cart';
        emptyCart.innerHTML = `
          <p>Your cart is empty</p>
          <a href="producten.html" class="continue-shopping">Continue Shopping</a>
        `;
        cartItems.appendChild(emptyCart);
        
        // Hide summary when cart is empty
        document.querySelector('.summary').style.display = 'none';
      }
    }
  }