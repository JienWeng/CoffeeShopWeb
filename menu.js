document.addEventListener("DOMContentLoaded", function() {
    // Add event listener to all "View More" buttons
    const viewMoreButtons = document.querySelectorAll('.btn-secondary');
    viewMoreButtons.forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the default action of the link

            // Get the product ID from the data-id attribute
            const productId = button.closest('.product').getAttribute('data-id');

            // Show the corresponding product preview
            showProductPreview(productId);
        });
    });

    // Function to show product preview
    function showProductPreview(productId) {
        // Hide any currently active previews
        const activePreviews = document.querySelectorAll('.products-preview .preview.active');
        activePreviews.forEach(preview => {
            preview.classList.remove('active');
        });

        // Show the preview corresponding to the product ID
        const targetPreview = document.querySelector(`.products-preview .preview[data-target='${productId}']`);
        if (targetPreview) {
            targetPreview.classList.add('active');
        }

        // Show the products preview container
        const productsPreviewContainer = document.querySelector('.products-preview');
        productsPreviewContainer.style.display = 'flex';
    }

    // Close preview when clicking on the close button
    const closeButtons = document.querySelectorAll('.products-preview .fa-times');
    closeButtons.forEach(button => {
        button.addEventListener('click', function() {
            const productsPreviewContainer = document.querySelector('.products-preview');
            productsPreviewContainer.style.display = 'none';
        });
    });

    // Add event listener to all "Add to Cart" buttons
    const addToCartButtons = document.querySelectorAll('.btn-primary');
    addToCartButtons.forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the default form submission

            // Get the product ID from the closest product container
            const productId = button.closest('.product').getAttribute('data-id');

            // Make AJAX call to add_to_cart.php
            fetch('add_to_cart.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ productId: productId, increment: true })
            })
            .then(response => response.json())
            .then(data => alert(data.message))
            .catch(error => console.error('Error adding product to cart:', error));
        });
    });
});
