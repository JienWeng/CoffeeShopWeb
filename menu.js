function showCategory(category) {
    // Hide all category items
    var categoryItems = document.querySelectorAll('.category-items');
    categoryItems.forEach(function(item) {
        item.style.display = 'none';
    });

    // Show selected category items
    var selectedCategory = document.getElementById(category);
    if (selectedCategory) {
        selectedCategory.style.display = 'block';
    }
}
