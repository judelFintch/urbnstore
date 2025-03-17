<div>

    <body class="bg-gray-100 min-h-screen flex items-center justify-center">

        <div class="max-w-6xl w-full mx-auto px-4 py-8">
          <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
      
            <!-- Formulaire de paiement -->
            <div class="lg:col-span-2 bg-white p-6 rounded-xl shadow-md">
              <h2 class="text-2xl font-semibold mb-6">Informations de paiement</h2>
      
              <form class="space-y-4">
      
                <!-- Email -->
                <div>
                  <label class="block text-sm font-medium mb-1">Adresse e-mail</label>
                  <input type="email" placeholder="votre@email.com"
                    class="w-full border border-gray-300 p-3 rounded-lg focus:ring focus:ring-blue-300" required>
                </div>
      
                <!-- Nom complet -->
                <div>
                  <label class="block text-sm font-medium mb-1">Nom complet</label>
                  <input type="text" placeholder="Jean Dupont"
                    class="w-full border border-gray-300 p-3 rounded-lg focus:ring focus:ring-blue-300" required>
                </div>
      
                <!-- Adresse -->
                <div>
                  <label class="block text-sm font-medium mb-1">Adresse</label>
                  <input type="text" placeholder="123 Rue de Paris"
                    class="w-full border border-gray-300 p-3 rounded-lg focus:ring focus:ring-blue-300" required>
                </div>
      
                <!-- Ville et Code Postal -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                  <div>
                    <label class="block text-sm font-medium mb-1">Ville</label>
                    <input type="text" placeholder="Paris"
                      class="w-full border border-gray-300 p-3 rounded-lg focus:ring focus:ring-blue-300" required>
                  </div>
                  <div>
                    <label class="block text-sm font-medium mb-1">Code Postal</label>
                    <input type="text" placeholder="75000"
                      class="w-full border border-gray-300 p-3 rounded-lg focus:ring focus:ring-blue-300" required>
                  </div>
                </div>
      
                <!-- Détails carte bancaire -->
                <div class="border-t pt-4 mt-4">
                  <h3 class="text-lg font-medium mb-4">Détails de la carte</h3>
      
                  <div>
                    <label class="block text-sm font-medium mb-1">Numéro de carte</label>
                    <input type="text" placeholder="1234 5678 9012 3456"
                      class="w-full border border-gray-300 p-3 rounded-lg focus:ring focus:ring-blue-300" required>
                  </div>
      
                  <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                    <div>
                      <label class="block text-sm font-medium mb-1">Expiration</label>
                      <input type="text" placeholder="MM/AA"
                        class="w-full border border-gray-300 p-3 rounded-lg focus:ring focus:ring-blue-300" required>
                    </div>
                    <div>
                      <label class="block text-sm font-medium mb-1">CVC</label>
                      <input type="text" placeholder="123"
                        class="w-full border border-gray-300 p-3 rounded-lg focus:ring focus:ring-blue-300" required>
                    </div>
                  </div>
                </div>
      
                <!-- Bouton Payer -->
                <button type="submit"
                  class="w-full bg-blue-600 text-white py-3 rounded-lg mt-6 hover:bg-blue-700 transition">Payer
                  maintenant</button>
              </form>
            </div>
      
            <!-- Résumé commande -->
            <div class="bg-white p-6 rounded-xl shadow-md">
              <h3 class="text-xl font-semibold mb-6">Résumé de la commande</h3>
      
              <div class="flex items-center mb-4">
                <img src="https://via.placeholder.com/80" alt="Produit"
                  class="w-20 h-20 object-cover rounded-lg border border-gray-200 mr-4">
                <div>
                  <p class="font-medium">Produit Exemple</p>
                  <p class="text-sm text-gray-500">Quantité : 1</p>
                </div>
                <div class="ml-auto font-semibold">29,99 €</div>
              </div>
      
              <div class="border-t pt-4 space-y-2">
                <div class="flex justify-between">
                  <span>Sous-total</span>
                  <span>29,99 €</span>
                </div>
                <div class="flex justify-between">
                  <span>Livraison</span>
                  <span>Gratuite</span>
                </div>
                <div class="border-t pt-4 flex justify-between font-semibold">
                  <span>Total</span>
                  <span>29,99 €</span>
                </div>
              </div>
            </div>
      
          </div>
        </div>
    <script src="{{asset('js/detailsCart.js')}}" defer></script>
</div>
