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
                const totalPricePerItem = (item.price * item.quantity).toFixed(2);
                const cartItemDiv = document.createElement('div');
                cartItemDiv.classList.add('cart-item');
                cartItemDiv.innerHTML = `
                    <img src="${item.image}" alt="${item.name}">
                    <div class="cart-item-details">
                        <span class="item-name">${item.name}</span>
                        <span class="item-price">Price: $${item.price}</span>
                    </div>
                    <div class="quantity-controls">
                        <label>Quantity:</label>
                        <button class="change-quantity" data-index="${index}" data-change="decrease">-</button>
                        <span class="item-quantity">${item.quantity}</span>
                        <button class="change-quantity" data-index="${index}" data-change="increase">+</button>
                    </div>
                    <span>Total: $${totalPricePerItem}</span>
                    <button class="remove-item" data-index="${index}">Remove</button>
                `;
                cartItemsContainer.appendChild(cartItemDiv);
            });
    
            document.querySelectorAll('.change-quantity').forEach(button => {
                button.addEventListener('click', function() {
                    const index = parseInt(this.getAttribute('data-index'));
                    const change = this.getAttribute('data-change');
                    const item = cartItems[index];
    
                    if (change === 'increase') {
                        item.quantity++;
                    } else if (change === 'decrease') {
                        item.quantity--;
                        if (item.quantity < 1) {
                            cartItems.splice(index, 1);
                        }
                    }
    
                    localStorage.setItem('cartItems', JSON.stringify(cartItems));
                    updateCartUI();
                });
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
    

    const modal = document.getElementById('checkout-modal');
    const closeBtn = document.querySelector('.close-button');
    const checkoutBtn = document.getElementById('checkout-btn');
    
    checkoutBtn.addEventListener('click', function() {
        modal.style.display = 'block';
    });
    
    closeBtn.addEventListener('click', function() {
        modal.style.display = 'none';
    });
    
    
    document.getElementById('submit-order').addEventListener('click', (e) => {
        e.preventDefault();
        modal.style.display = 'none'; 
    });
    
   
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    };
    

});
