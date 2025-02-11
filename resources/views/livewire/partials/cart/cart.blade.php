<div>
    <div>
        <h2>Mon Panier</h2>

        @if(count($cartItems) > 0)
            <ul>
                @foreach($cartItems as $productId => $item)
                    <li>
                        {{ $item['name'] }} - {{ number_format($item['price'], 2, ',', ' ') }}€ x {{ $item['quantity'] }}
                        <button wire:click="removeFromCart({{ $productId }})">Supprimer</button>
                    </li>
                @endforeach
            </ul>

            <h3>Total : {{ number_format($totalPrice, 2, ',', ' ') }}€</h3>
        @else
            <p>Votre panier est vide.</p>
        @endif
    </div>
</div>