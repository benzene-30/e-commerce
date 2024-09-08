let totalSum = 0;

function updateQuantity(productId, action) {
    const quantityElement = document.getElementById('quantity-' + productId);
    let quantity = parseInt(quantityElement.textContent);

    if (action === 'increase') {
        quantity++;
    } else if (action === 'decrease') {
        quantity--;
        if (quantity <= 0) {
            removeItem(productId);
            return;
        }
    }

    quantityElement.textContent = quantity;
    updatePrice(productId, quantity);
    updateTotalPrice();
}

function updatePrice(productId, quantity) {
    const priceElement = document.getElementById('price-' + productId);
    const unitPrice = parseFloat(priceElement.getAttribute('data-unit-price'));

    const totalPrice = unitPrice * quantity;
    priceElement.textContent = 'Total Price: $' + totalPrice.toFixed(2);
}

function removeItem(productId) {
    const cartSection = document.getElementById('section-' + productId);
    cartSection.remove(); // Remove the entire section when quantity is 0
    updateTotalPrice();

    // Make an AJAX call to remove the product from the session cart
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "remove_from_cart.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("product_id=" + productId);

    xhr.onload = function () {
        if (xhr.status === 200) {
            console.log("Product removed from cart");
        } else {
            console.log("Error removing product");
        }
    };
}

function updateTotalPrice() {
    totalSum = 0;
    const priceElements = document.querySelectorAll('[data-unit-price]');
    priceElements.forEach(priceElement => {
        const unitPrice = parseFloat(priceElement.getAttribute('data-unit-price'));
        const quantity = parseInt(document.getElementById('quantity-' + priceElement.id.split('-')[1]).textContent);
        totalSum += unitPrice * quantity;
    });
    document.getElementById('total-price').textContent = 'Total: $' + totalSum.toFixed(2);
}

document.addEventListener('DOMContentLoaded', () => {
    updateTotalPrice(); // Initial calculation of total price
});