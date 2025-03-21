<div>
    <section class="bg-white min-h-screen" role="main" aria-label="Section de paiement">
        <div class="max-w-[1200px] mx-auto p-6 grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Colonne gauche - Formulaire de commande -->
            <div class="lg:max-w-[550px] bg-white p-6 rounded-lg border border-gray-200 shadow-sm" role="form"
                aria-label="Formulaire de commande">
                <!-- Paiement express -->
                <div class="mb-8 max-w-4xl mx-auto text-center">
                    <h2 class="text-lg font-medium mb-4">Paiement express</h2>
                    <img src="{{ asset('imgs/logo.jpeg') }}" alt="Max Cash Paiement Express" class="mx-auto" />
                </div>

                <!-- Connexion -->
                @guest
                    @php
                        session(['url.intended' => url()->current()]);
                    @endphp
                    <div class="bg-yellow-50 border-l-4 border-yellow-400 text-yellow-800 p-4 rounded-md">
                        <p>
                            Vous avez déjà un compte ?
                            <a href="{{ route('login') }}" class="text-blue-600 underline">Connectez-vous ici</a>
                            pour suivre votre commande et accélérer le paiement.
                        </p>
                    </div>
                @endguest

                <!-- Livraison -->
                <div class="mb-8">
                    @auth
                        <h2 class="text-lg font-medium mb-4">Adresse de facturation</h2>
                        <div class="space-y-4">
                            <label for="country" class="sr-only">Pays</label>
                            <select id="country" name="country"
                                class="w-full px-4 py-3 border border-gray-300 rounded-md bg-white" required>
                                <option value="">Sélectionnez un pays</option>
                                <option value="cd">Congo Kinshasa</option>
                            </select>

                            <div class="grid grid-cols-2 gap-4">
                                <input type="text" name="first_name" placeholder="Prénom" required
                                    class="px-4 py-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500" />
                                <input type="text" name="last_name" placeholder="Nom" required
                                    class="px-4 py-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500" />
                            </div>

                            <input type="text" name="company" placeholder="Société (optionnel)"
                                class="w-full px-4 py-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500" />
                            <input type="text" name="address" placeholder="Adresse" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500" />
                        </div>

                        <fieldset class="mt-8 border border-gray-200 rounded-lg p-4 space-y-4">
                            
                            <!-- Paiement connecté -->
                            <form action="" method="POST" id="payment-form-auth">
                                @csrf
                                <input type="hidden" name="total" value="6800">
                                <button type="submit"
                                    class="w-full bg-green-600 text-white py-3 rounded-md hover:bg-blue-700 transition-all">
                                    Payer maintenant (connecté) - {{ auth()->user()->name }}
                                </button>
                            </form>

                        </fieldset>
                    @endauth
                </div>
            </div>

            <!-- Colonne droite - Résumé de la commande -->
            <div class="bg-gray-50 p-6 rounded-lg border border-gray-200 shadow-sm" role="region"
                aria-label="Résumé de commande">
                <div class="mb-6 space-y-4" id="order-summary-products">
                    <!-- Produits dynamiques injectés ici -->
                </div>

                <div class="border-t border-gray-200 pt-4 gap-4">
                    <div class="recpaImage flex items-center gap-4">
                        <div class="relative">
                            <img src="https://placehold.co/80x80" alt="Image produit" class="rounded">
                            <span
                                class="absolute -top-2 -right-2 bg-gray-500 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs">1</span>
                        </div>
                        <div class="flex-grow">
                            <h3 class="font-semibold">T-shirt MARINA ANGLING - SABLE</h3>
                            <p class="text-gray-500">Taille S</p>
                        </div>
                        <div class="font-semibold">68,00 $</div>
                    </div>

                    <div class="flex items-center gap-4 mb-4 mt-8">
                        <input type="text" name="discount_code" placeholder="Code promo ou carte cadeau"
                            class="flex-1 px-4 py-3 border border-gray-300 rounded-md" />
                        <button
                            class="px-6 py-3 bg-gray-100 text-gray-600 rounded-md hover:bg-gray-200">Appliquer</button>
                    </div>

                    <div class="space-y-2 text-sm mb-4">
                        <div class="flex justify-between">
                            <span>Sous-total</span>
                            <span id="order-subtotal">0,00 $</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Livraison</span>
                            <span id="order-shipping">14,00 $</span>
                        </div>
                    </div>

                    <div class="flex justify-between items-center border-t border-gray-200 pt-4">
                        <span class="text-lg font-medium cartSubtotal">Total</span>
                        <div class="text-right">
                            <span class="text-sm text-gray-500">USD</span>
                            <span id="order-total" class="text-2xl font-medium ml-1">0,00 $</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="{{ asset('js/checkout.js') }}"></script>
</div>
