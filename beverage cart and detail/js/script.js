document.addEventListener('DOMContentLoaded', function() {
    const addToCartButtons = document.querySelectorAll('.add-to-cart');
    const cartCountSpan = document.getElementById('cart-count');
    const cartTotalSpan = document.getElementById('cart-total');
    let cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
    updateCartUI();

    addToCartButtons.forEach(button => {
        button.addEventListener('click', () => {
            const price = parseFloat(button.getAttribute('data-price'));
            const productName = button.parentElement.querySelector('h4').textContent;
            const productImage = button.parentElement.querySelector('img').src;
            const itemId = button.parentElement.querySelector('img').alt;

            // Check if item already exists in cart
            const existingItem = cartItems.find(item => item.id === itemId);
            if (existingItem) {
                existingItem.quantity++;
            } else {
                cartItems.push({ id: itemId,name: productName,price, quantity: 1, image: productImage });
            }

            localStorage.setItem('cartItems', JSON.stringify(cartItems));
            updateCartUI();
        });
    });

    function updateCartUI() {
        const cartItemsContainer = document.getElementById('cart-items');
        if (cartItemsContainer) {
            cartItemsContainer.innerHTML = '';
            cartItems.forEach((item, index) => {
                const cartItemDiv = document.createElement('div');
                cartItemDiv.classList.add('cart-item');
                cartItemDiv.innerHTML = `
                    <img src="${item.image}" alt="${item.name}">
                    <div class="cart-item-details">
                        <span class="item-name">${item.name}</span>
                        <span class="item-price">Price: $${item.price}</span>
                        <span class="item-quantity">Quantity: ${item.quantity}</span>
                    </div>
                    <button class="remove-item" data-index="${index}">Remove</button>
                `;
                cartItemsContainer.appendChild(cartItemDiv);
            });
    
            const removeButtons = cartItemsContainer.querySelectorAll('.remove-item');
            removeButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const index = parseInt(button.getAttribute('data-index'));
                    cartItems.splice(index, 1);
                    localStorage.setItem('cartItems', JSON.stringify(cartItems));
                    updateCartUI();
                });
            });
        }
    
        let total = 0;
        let count = 0;
        cartItems.forEach(item => {
            total += item.price * item.quantity;
            count += item.quantity;
        });
    
        if (cartCountSpan) cartCountSpan.textContent = count;
        if (cartTotalSpan) cartTotalSpan.textContent = `$${total.toFixed(2)}`;
    }
    
});
