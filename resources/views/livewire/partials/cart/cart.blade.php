<div>
    <div>
        <h2>Mon Panier</h2>
    
        @if(count($cartItems) > 0)
            <ul>
                @foreach($cartItems as $productId => $item)
                    <li>
                        {{ $item['name'] }} - {{ $item['price'] }}€ x {{ $item['quantity'] }}
                        <button wire:click="removeFromCart({{ $productId }})">Supprimer</button>
                    </li>
                @endforeach
            </ul>
            
            <h3>Total: {{ $totalPrice }}€</h3>
        @else
            <p>Votre panier est vide.</p>
        @endif
    </div>
    
</div>
