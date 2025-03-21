<div>
    <section class="bg-white min-h-screen" role="main" aria-label="Section de paiement">
        <div class="max-w-[1200px] mx-auto p-6 grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Colonne gauche - Formulaire de commande -->
            <div class="lg:max-w-[550px] bg-white p-6 rounded-lg border border-gray-200 shadow-sm" role="form" aria-label="Formulaire de commande">
                <!-- Paiement express -->
                <div class="mb-8 max-w-4xl mx-auto text-center">
                    <h2 class="text-lg font-medium mb-4">Paiement express</h2>
                    <img src="{{ asset('imgs/logo.jpeg') }}" alt="Max Cash Paiement Express" class="mx-auto" />
                </div>

                <!-- Connexion -->
                <div class="mb-8">
                    <div class="flex justify-between items-center mb-4">
                        <a href="{{route('login')}}">
                            <button class="text-blue-600 text-sm" aria-label="Connexion Urbn">J’ai déjà un compte Urbn</button>
                        </a>
                    </div>
                </div>

                <!-- Livraison -->
                <div class="mb-8">
                    <h2 class="text-lg font-medium mb-4">Acheter sans compte</h2>
                    <div class="space-y-4">
                        <label for="country" class="sr-only">Pays</label>
                        <select id="country" name="country" class="w-full px-4 py-3 border border-gray-300 rounded-md bg-white" required>
                            <option value="">Sélectionnez un pays</option>
                            <option value="cd">Congo Kinshasa</option>
                        </select>

                        <div class="grid grid-cols-2 gap-4">
                            <input type="text" name="first_name" placeholder="Prénom" required
                                class="px-4 py-3 border border-gray-300 rounded-md" />
                            <input type="text" name="last_name" placeholder="Nom" required
                                class="px-4 py-3 border border-gray-300 rounded-md" />
                        </div>

                        <input type="text" name="company" placeholder="Société (optionnel)"
                            class="w-full px-4 py-3 border border-gray-300 rounded-md" />
                        <input type="text" name="address" placeholder="Adresse" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-md" />
                    </div>
                </div>
            </div>

            <!-- Colonne droite - Résumé de la commande -->
            <div class="bg-gray-50 p-6 rounded-lg border border-gray-200 shadow-sm" role="region" aria-label="Résumé de commande">
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
                        <button class="px-6 py-3 bg-gray-100 text-gray-600 rounded-md hover:bg-gray-200">Appliquer</button>
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
