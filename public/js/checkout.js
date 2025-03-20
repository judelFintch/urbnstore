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

    function displayCartItems() {
        const cartContainer = document.querySelector(".recpaImage");

        if (!cartContainer) {
            console.warn("⚠️ Élément .recpaImage introuvable !");
            return;
        }

        cartContainer.innerHTML = "";

        let cartItems = getCartItems();

        if (cartItems.length === 0) {
            cartContainer.innerHTML = "<p class='text-gray-500'>Votre panier est vide.</p>";
            return;
        }

        cartItems.forEach(item => {
            let productHTML = `
                <div class="product-item">
                    <div class="relative">
                        <img src="${item.image}" alt="${item.name}" class="rounded w-20 h-20 object-cover">
                        <span class="absolute -top-2 -right-2 bg-gray-500 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs">${item.quantity}</span>
                    </div>
                    <div class="flex-grow">
                        <h3 class="font-semibold">${item.name}</h3>
                    </div>
                    <div class="font-semibold">$${item.price}</div>
                </div>
                <br>
            `;
            cartContainer.insertAdjacentHTML("beforeend", productHTML);
        });
    }

    displayCartItems();

    window.addEventListener("storage", displayCartItems);
});
