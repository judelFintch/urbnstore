// Initialiser le panier à partir du localStorage ou un tableau vide
let cart = JSON.parse(localStorage.getItem('cart')) || [];

/**
 * Affiche le contenu du panier dans l'overlay et met à jour les totaux.
 */
function displayCart() {
    const cartContent = document.querySelector('.header-cart-wrapitem');
    const cartTotal = document.querySelector('.header-cart-total');
    cartContent.innerHTML = '';

    if (cart.length === 0) {
        cartContent.innerHTML = '<p>Votre panier est vide.</p>';
        cartTotal.innerHTML = 'Total: $0.00';
        updateCartIcon(0);
        return;
    }

    let total = 0;

    cart.forEach(item => {
        const itemTotal = item.price * item.quantity;
        total += itemTotal;

        const cartItem = document.createElement('li');
        cartItem.className = 'header-cart-item flex-w flex-t m-b-12';
        cartItem.innerHTML = `
            <div class="header-cart-item-img">
                <img src="${item.image}" alt="${item.name}">
            </div>
            <div class="header-cart-item-txt p-t-8">
                <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                    ${item.name}
                </a>
                <span class="header-cart-item-info">
                    ${item.quantity} x $${item.price.toFixed(2)}
                </span>
            </div>
        `;

        cartContent.appendChild(cartItem);
    });

    cartTotal.innerHTML = `Total: $${total.toFixed(2)}`;
    updateCartIcon(getTotalQuantity());
}

/**
 * Met à jour les badges des icônes du panier pour desktop et mobile.
 * @param {number} totalQuantity - La quantité totale de produits dans le panier.
 */
function updateCartIcon(totalQuantity) {
    const desktopIcon = document.querySelector('.container-menu-desktop .icon-header-noti');
    const mobileIcon = document.querySelector('.wrap-header-mobile .icon-header-noti');

    [desktopIcon, mobileIcon].forEach(icon => {
        if (icon) {
            icon.setAttribute('data-notify', totalQuantity);
        }
    });
}

/**
 * Ajoute un produit au panier ou met à jour sa quantité.
 * @param {number} id - L'identifiant unique du produit.
 * @param {string} name - Le nom du produit.
 * @param {number} price - Le prix unitaire du produit.
 * @param {string} imageUrl - L'URL de l'image du produit.
 */
function addToCart(id, name, price, imageUrl) {
    const existingProduct = cart.find(item => item.id === id);

    if (existingProduct) {
        existingProduct.quantity += 1;
    } else {
        cart.push({ id, name, price, image: imageUrl, quantity: 1 });
    }

    saveCart();
}

/**
 * Supprime un produit du panier.
 * @param {number} id - L'identifiant unique du produit à supprimer.
 */
function removeFromCart(id) {
    cart = cart.filter(item => item.id !== id);
    saveCart();
}

/**
 * Met à jour la quantité d'un produit dans le panier.
 * @param {number} id - L'identifiant unique du produit.
 * @param {number} quantity - La nouvelle quantité.
 */
function updateQuantity(id, quantity) {
    const product = cart.find(item => item.id === id);

    if (product) {
        product.quantity = Math.max(0, parseInt(quantity, 10)); // Assurer une quantité non négative
        if (product.quantity === 0) removeFromCart(id);
    }

    saveCart();
}

/**
 * Vide complètement le panier.
 */
function clearCart() {
    cart = [];
    saveCart();
}

/**
 * Retourne la quantité totale d'articles dans le panier.
 * @returns {number} - La quantité totale.
 */
function getTotalQuantity() {
    return cart.reduce((total, item) => total + item.quantity, 0);
}

/**
 * Sauvegarde le panier dans le localStorage et met à jour l'affichage.
 */
function saveCart() {
    localStorage.setItem('cart', JSON.stringify(cart));
    displayCart();
}

// Affiche le panier lors du chargement de la page
window.onload = displayCart;
