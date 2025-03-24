
document.addEventListener("DOMContentLoaded", function () {

    const cart = JSON.parse(localStorage.getItem("cart") || "[]");
    if (!cart.length) return;

    document.getElementById("cart_json").value = JSON.stringify(cart);
    const total = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
    document.getElementById("total").value = total;

    // Affichage dynamique dans le récapitulatif
    const container = document.getElementById("order-summary-products");
    container.innerHTML = "";
    
    document.getElementById("order-subtotal-form").textContent = total.toFixed(2) + ' $';
    document.getElementById("order-total-form").textContent = (total + 14).toFixed(2) + ' $';
});
