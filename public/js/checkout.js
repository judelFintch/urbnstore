document.addEventListener('DOMContentLoaded', () => {
    function getCartItems() {
        let cart = JSON.parse(localStorage.getItem("cart")) || [];

        if (cart.length === 0) {
            console.warn("⚠️ Panier vide !");
            return [];
        }

        return cart.map(item => ({
            image: item.image,
            name: item.name,
            price: item.price.toFixed(2),
            quantity: item.quantity || 1
        }));
    }

    function removeItemFromCart(itemName) {
        let cart = JSON.parse(localStorage.getItem("cart")) || [];
        cart = cart.filter(item => item.name !== itemName);
        localStorage.setItem("cart", JSON.stringify(cart));
        updateCartView();
    }

    function displayCartItems() {
        const cartContainer = document.querySelector(".recpaImage");

        if (!cartContainer) {
            console.warn("⚠️ Élément .recpaImage introuvable !");
            return;
        }

        cartContainer.innerHTML = "";

        let cartItems = getCartItems();

        if (cartItems.length === 0) {
            cartContainer.innerHTML = "<p class='text-gray-500 text-center'>Votre panier est vide.</p>";
            return;
        }

        cartItems.forEach((item, index) => {
            let productHTML = `
                <div class="product-item" style="animation-delay: ${index * 0.1}s">
                    <div class="relative">
                        <img src="${item.image}" alt="${item.name}" class="rounded w-20 h-20 object-cover">
                        <span class="absolute -top-2 -right-2 bg-gray-500 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs">${item.quantity}</span>
                    </div>
                    <div class="flex-grow">
                        <h3 class="font-semibold">${item.name}</h3>
                    </div>
                    <div class="price font-semibold">$${item.price}</div>
                    <button class="remove-btn" data-name="${item.name}">🗑️</button>
                </div>
            `;
            cartContainer.insertAdjacentHTML("beforeend", productHTML);
        });

        // Animation d'apparition
        setTimeout(() => {
            document.querySelectorAll(".product-item").forEach(item => {
                item.classList.add("show");
            });
        }, 100);

        // Ajout d'un écouteur sur chaque bouton de suppression
        document.querySelectorAll(".remove-btn").forEach(button => {
            button.addEventListener("click", (event) => {
                const itemName = event.target.getAttribute("data-name");
                removeItemFromCart(itemName);
            });
        });

        updateOrderSummary();
    }

    function getCartSubtotal() {
        let cart = JSON.parse(localStorage.getItem("cart")) || [];

        if (cart.length === 0) {
            console.warn("⚠️ Panier vide !");
            return 0;
        }

        let subtotal = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
        return subtotal.toFixed(2);
    }

    function updateOrderSummary() {
        const subtotalElement = document.querySelector("#order-subtotal");
        const shippingElement = document.querySelector("#order-shipping");
        const totalElement = document.querySelector("#order-total");

        if (!subtotalElement || !shippingElement || !totalElement) {
            console.warn("⚠️ Un élément du résumé de commande est introuvable !");
            return;
        }

        let subtotal = parseFloat(getCartSubtotal());
        let shipping = 14.00; 
        let total = subtotal + shipping;

        subtotalElement.textContent = `$${subtotal.toFixed(2)}`;
        shippingElement.textContent = `$${shipping.toFixed(2)}`;
        totalElement.textContent = `$${total.toFixed(2)}`;
    }

    function updateCartView() {
        displayCartItems();
        updateOrderSummary();
    }

    updateCartView();

    window.addEventListener("storage", updateCartView);
});
