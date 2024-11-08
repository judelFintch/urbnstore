// Récupérer le panier depuis le localStorage ou initialiser un panier vide
let cart = JSON.parse(localStorage.getItem('cart')) || [];

// Fonction pour afficher le contenu du panier dans la structure d'overlay
function displayCart() {
    const cartContent = document.querySelector('.header-cart-wrapitem');
    const cartTotal = document.querySelector('.header-cart-total');
    cartContent.innerHTML = '';

    if (cart.length === 0) {
        cartContent.innerHTML = '<p>Votre panier est vide.</p>';
        cartTotal.innerHTML = 'Total: $0.00';
        return;
    }

    let total = 0;

    // Affichage des articles du panier
    cart.forEach(item => {
        const itemTotal = item.price * item.quantity;
        total += itemTotal;

        const cartItem = document.createElement('li');
        cartItem.classList.add('header-cart-item', 'flex-w', 'flex-t', 'm-b-12');

        cartItem.innerHTML = `
            <div class="header-cart-item-img">
                <img src="{{asset(images/item-cart-${item.id}.jpg')}}" alt="IMG">
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

    // Affichage du total global
    cartTotal.innerHTML = `Total: $${total.toFixed(2)}`;
}

// Fonction pour ajouter un produit au panier
function addToCart(id, name, price) {
    const existingProductIndex = cart.findIndex(item => item.id === id);

    if (existingProductIndex >= 0) {
        cart[existingProductIndex].quantity += 1;
    } else {
        cart.push({ id, name, price, quantity: 1 });
    }

    localStorage.setItem('cart', JSON.stringify(cart));
    displayCart();
}

// Fonction pour supprimer un produit du panier
function removeFromCart(id) {
    cart = cart.filter(item => item.id !== id);
    localStorage.setItem('cart', JSON.stringify(cart));
    displayCart();
}

// Fonction pour mettre à jour la quantité d'un produit
function updateQuantity(id, quantity) {
    const productIndex = cart.findIndex(item => item.id === id);

    if (productIndex >= 0) {
        cart[productIndex].quantity = parseInt(quantity, 10);
        localStorage.setItem('cart', JSON.stringify(cart));
        displayCart();
    }
}

// Afficher le panier au chargement de la page
window.onload = displayCart;
