document.addEventListener('DOMContentLoaded', () => {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    const cartTable = document.querySelector('.table-shopping-cart');
    const cartSubtotal = document.querySelector('.cart-subtotal');
    const cartTotal = document.querySelector('.cart-total');
    const proceedToCheckout = document.querySelector('.proceed-to-checkout');
    const cartCounterDesktop = document.querySelector('.icon-header-noti'); // Ex. classe pour le badge desktop
    const cartCounterMobile = document.querySelector('.icon-header-noti-mobile');  // Ex. classe pour le badge mobile

    function renderCart() {
        cartTable.querySelectorAll('.table_row').forEach(row => row.remove());

        if (cart.length === 0) {
            cartTable.insertAdjacentHTML('beforeend', '<tr><td colspan="5">Your cart is empty.</td></tr>');
            cartSubtotal.textContent = '$0.00';
            cartTotal.textContent = '$0.00';
            updateCartCounter(0); // Met à jour le compteur à zéro
            return;
        }

        const rows = cart.map((item, index) => `
            <tr class="table_row">
                <td class="column-1">
                    <div class="how-itemcart1">
                        <img src="${item.image}" alt="${item.name}">
                    </div>
                </td>
                <td class="column-2">${item.name}</td>
                <td class="column-3">$${item.price.toFixed(2)}</td>
                <td class="column-4">
                    <div class="wrap-num-product flex-w m-l-auto m-r-0">
                        <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m" data-index="${index}">
                            <i class="fs-16 zmdi zmdi-minus"></i>
                        </div>
                        <input class="mtext-104 cl3 txt-center num-product" type="number" data-index="${index}" value="${item.quantity}">
                        <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m" data-index="${index}">
                            <i class="fs-16 zmdi zmdi-plus"></i>
                        </div>
                    </div>
                </td>
                <td class="column-5">$${(item.price * item.quantity).toFixed(2)}</td>
            </tr>
        `).join('');

        cartTable.insertAdjacentHTML('beforeend', rows);
        updateTotals();
        attachEventListeners();
    }

    function updateTotals() {
        const subtotal = cart.reduce((sum, item) => sum + item.price * item.quantity, 0);
        cartSubtotal.textContent = `$${subtotal.toFixed(2)}`;
        cartTotal.textContent = `$${subtotal.toFixed(2)}`;
    }

    // Met à jour le compteur d'articles dans le panier
    function updateCartCounter(totalQuantity) {
        const quantity = totalQuantity ?? cart.reduce((sum, item) => sum + item.quantity, 0);

        if (cartCounterDesktop) {
            cartCounterDesktop.setAttribute('data-notify', quantity);
        }

        if (cartCounterMobile) {
            cartCounterMobile.setAttribute('data-notify', quantity);
        }
    }

    function attachEventListeners() {
        document.querySelectorAll('.btn-num-product-down').forEach(btn => {
            btn.addEventListener('click', () => {
                const index = btn.getAttribute('data-index');
                if (cart[index].quantity > 1) {
                    cart[index].quantity--;
                    saveCart();
                }
            });
        });

        document.querySelectorAll('.btn-num-product-up').forEach(btn => {
            btn.addEventListener('click', () => {
                const index = btn.getAttribute('data-index');
                cart[index].quantity++;
                saveCart();
            });
        });

        document.querySelectorAll('.num-product').forEach(input => {
            input.addEventListener('change', () => {
                const index = input.getAttribute('data-index');
                const newQuantity = parseInt(input.value, 10);
                if (newQuantity > 0) {
                    cart[index].quantity = newQuantity;
                    saveCart();
                } else {
                    alert('Invalid quantity.');
                }
            });
        });
    }

    function saveCart() {
        localStorage.setItem('cart', JSON.stringify(cart));
        renderCart();
        updateCartCounter(); // Met à jour le compteur à chaque modification
    }

    proceedToCheckout.addEventListener('click', (e) => {
        e.preventDefault(); // Annule le comportement par défaut du bouton
        if (cart.length === 0) {
            alert('Your cart is empty.');
            return;
        }
        window.location.href = 'checkout';
    });

    // Initialisation
    renderCart();
    updateCartCounter(); // Met à jour le compteur au chargement
});