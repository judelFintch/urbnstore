
document.addEventListener("DOMContentLoaded", function () {

    const cart = JSON.parse(localStorage.getItem("cart") || "[]");
    if (!cart.length) return;

    document.getElementById("cart_json").value = JSON.stringify(cart);
    const total = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
    document.getElementById("total").value = total;

    // Affichage dynamique dans le récapitulatif
    const container = document.getElementById("order-summary-products");
    container.innerHTML = "";
    cart.forEach(item => {
        container.innerHTML += `
                <div class="flex justify-between border-b pb-2 mb-2">
                    <div>
                        <p class="font-semibold">${item.title}</p>
                        <p class="text-sm text-gray-500">Quantité: ${item.quantity}</p>
                    </div>
                    <p class="font-medium">${(item.price * item.quantity).toFixed(2)} $</p>
                </div>
            `;
    });
    document.getElementById("order-subtotal").textContent = total.toFixed(2) + ' $';
    document.getElementById("order-total").textContent = (total + 14).toFixed(2) + ' $';
});
