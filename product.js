let basePrice = 24.99;
let quantity = 1;
let weightFactor = 1;

function updatePrice() {
    const weight = parseFloat(document.getElementById("weight").value);
    weightFactor = weight;
    calculatePrice();
}

function changeQuantity(change) {
    quantity = Math.max(1, quantity + change);
    document.getElementById("quantity").innerText = quantity;
    calculatePrice();
}

function calculatePrice() {
    const totalPrice = (basePrice * weightFactor * quantity).toFixed(2);
    document.getElementById("price").innerText = `$${totalPrice}`;
}

function addToCart() {
    const weight = document.getElementById("weight").value;
    const message = document.getElementById("message").value;
    alert(`Added to cart: ${quantity}x ${weight}kg Chocolate Cake. Message: "${message}"`);
    document.querySelector(".add-to-cart").style.backgroundColor = "#ff1493";
    setTimeout(() => {
        document.querySelector(".add-to-cart").style.backgroundColor = "#ff69b4";
    }, 500);
}