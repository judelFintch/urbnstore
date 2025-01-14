let cart = JSON.parse(localStorage.getItem('cart')) || [];

// Fonction pour afficher le contenu du panier
function displayCart() {
    const cartContent = document.querySelector('.header-cart-wrapitem');
    const cartTotal = document.querySelector('.header-cart-total');
    const cartIcon = document.querySelector('.icon-header-noti');
    cartContent.innerHTML = '';

    if (cart.length === 0) {
        cartContent.innerHTML = '<p>Votre panier est vide.</p>';
        cartTotal.innerHTML = 'Total: $0.00';
        cartIcon.setAttribute('data-notify', 0);
        return;
    }

    let total = 0;
    cart.forEach(item => {
        const itemTotal = item.price * item.quantity;
        total += itemTotal;

        const cartItem = document.createElement('li');
        cartItem.classList.add('header-cart-item', 'flex-w', 'flex-t', 'm-b-12');
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
    updateCartIcon();
    updateCartButtons(); // Mise à jour dynamique des boutons
}

function updateCartIcon() {
    const totalQuantity = getTotalQuantity();
    const cartIcon = document.querySelector('.icon-header-noti');
    cartIcon.setAttribute('data-notify', totalQuantity);
}

function updateCartButtons() {
    const btnViewCart = document.querySelector('.btn-view-cart');
    const btnClearCart = document.querySelector('.btn-clear-cart');
    const totalQuantity = getTotalQuantity();
    alert(3);

    if (totalQuantity > 0) {

        btnViewCart.classList.remove('disabled');
        const route = btnViewCart.getAttribute('data-route'); 
        btnViewCart.setAttribute('href', route); // Route dynamique
        btnClearCart.classList.remove('disabled');
    } else {
    
        btnViewCart.classList.add('disabled');
        btnViewCart.setAttribute('href', 'javascript:void(0);');
        btnClearCart.classList.add('disabled');
    }
}

function addToCart(id, name, price, imageUrl) {
    const existingProductIndex = cart.findIndex(item => item.id === id);

    if (existingProductIndex >= 0) {
        cart[existingProductIndex].quantity += 1;
    } else {
        cart.push({ id, name, price, image: imageUrl, quantity: 1 });
    }

    localStorage.setItem('cart', JSON.stringify(cart));
    displayCart();
}

function removeFromCart(id) {
    cart = cart.filter(item => item.id !== id);
    localStorage.setItem('cart', JSON.stringify(cart));
    displayCart();
}

function updateQuantity(id, quantity) {
    const productIndex = cart.findIndex(item => item.id === id);

    if (productIndex >= 0) {
        cart[productIndex].quantity = parseInt(quantity, 10);
        localStorage.setItem('cart', JSON.stringify(cart));
        displayCart();
    }
}

function getTotalQuantity() {
    return cart.reduce((total, item) => total + item.quantity, 0);
}

function clearCart() {
    cart = [];
    localStorage.setItem('cart', JSON.stringify(cart));
    displayCart();
}

window.onload = () => {
    
    displayCart();
    updateCartButtons();
};
