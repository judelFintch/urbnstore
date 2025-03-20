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
            cartContainer.innerHTML = "<p class='text-gray-500 text-center'>Votre panier est vide.</p>";
            return;
        }

        cartItems.forEach((item, index) => {
            let productHTML = `
                <div class="product-item" style="animation-delay: ${index * 0.1}s">
                    <div class="relative">
                        <img src="${item.image}" alt="${item.name}">
                    </div>
                    <div class="flex-grow">
                        <h3>${item.name}</h3>
                    </div>
                    <div class="price">$${item.price}</div>
                </div>
            `;
            cartContainer.insertAdjacentHTML("beforeend", productHTML);
        });

        // Ajouter l'effet d'apparition après un léger délai
        setTimeout(() => {
            document.querySelectorAll(".product-item").forEach(item => {
                item.classList.add("show");
            });
        }, 100);
    }

    displayCartItems();

    window.addEventListener("storage", displayCartItems);
});
