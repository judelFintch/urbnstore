document.addEventListener('DOMContentLoaded', () => {
    console.log('Chargement du script detailsCart.js...');
    
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    const cartTable = document.querySelector('.table-shopping-cart');
    const cartSubtotal = document.querySelector('.cart-subtotal');
    const cartTotal = document.querySelector('.cart-total');
    const proceedToCheckout = document.querySelector('.proceed-to-checkout');
    const cartCounterDesktop = document.querySelector('.icon-header-noti');
    const cartCounterMobile = document.querySelector('.icon-header-noti-mobile');

    // Vérification de l'existence des éléments avant d'ajouter des écouteurs d'événements
    if (proceedToCheckout) {
        proceedToCheckout.addEventListener('click', (e) => {
            e.preventDefault();
            if (cart.length === 0) {
                alert('Your cart is empty.');
                return;
            }
            window.location.href = 'checkout';
        });
    } else {
        console.warn("⚠️ Bouton checkout introuvable !");
    }

    function renderOrderDetails() {
        const productDetailsContainer = document.querySelector('.flex-w.flex-t.bor12.p-b-13');
        const totalElement = document.querySelector('.flex-w.flex-t.p-t-15.p-b-30 .mtext-110');
        
        if (!productDetailsContainer || !totalElement) {
            console.warn("⚠️ Impossible d'afficher les détails de la commande. Élément manquant.");
            return;
        }

        productDetailsContainer.innerHTML = '';
        if (cart.length === 0) {
            productDetailsContainer.innerHTML = '<p>Your order is empty.</p>';
            totalElement.textContent = '$0.00';
            return;
        }

        let total = 0;
        cart.forEach(item => {
            const itemTotal = item.price * item.quantity;
            total += itemTotal;
            
            const productHTML = `
                <div class="flex-w flex-t p-b-13">
                    <div class="size-208">
                        <span class="stext-110 cl2">${item.name} (x${item.quantity})</span>
                    </div>
                    <div class="size-209">
                        <span class="mtext-110 cl2">$${itemTotal.toFixed(2)}</span>
                    </div>
                </div>
            `;
            productDetailsContainer.insertAdjacentHTML('beforeend', productHTML);
        });
        totalElement.textContent = `$${total.toFixed(2)}`;
    }

    function renderCart() {
        if (!cartTable) return;
        cartTable.querySelectorAll('.table_row').forEach(row => row.remove());
        
        if (cart.length === 0) {
            cartTable.insertAdjacentHTML('beforeend', '<tr><td colspan="5">Your cart is empty.</td></tr>');
            cartSubtotal.textContent = '$0.00';
            cartTotal.textContent = '$0.00';
            updateCartCounter(0);
            return;
        }

        let subtotal = 0;
        const rows = cart.map((item, index) => {
            const itemTotal = item.price * item.quantity;
            subtotal += itemTotal;
            return `
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
                    <td class="column-5">$${itemTotal.toFixed(2)}</td>
                </tr>
            `;
        }).join('');

        cartTable.insertAdjacentHTML('beforeend', rows);
        cartSubtotal.textContent = `$${subtotal.toFixed(2)}`;
        cartTotal.textContent = `$${subtotal.toFixed(2)}`;
        updateCartCounter();
        if (typeof attachEventListeners === 'function') {
            attachEventListeners();
        } else {
            console.warn("⚠️ attachEventListeners n'est pas défini.");
        }
    }

    function updateCartCounter() {
        const quantity = cart.reduce((sum, item) => sum + item.quantity, 0);
        if (cartCounterDesktop) cartCounterDesktop.setAttribute('data-notify', quantity);
        if (cartCounterMobile) cartCounterMobile.setAttribute('data-notify', quantity);
    }

    function saveCart() {
        localStorage.setItem('cart', JSON.stringify(cart));
        renderCart();
        updateCartCounter();
    }
    

    // Initialisation
    renderCart();
    updateCartCounter();
    renderOrderDetails();
});
