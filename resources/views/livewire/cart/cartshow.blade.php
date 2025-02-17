<!-- Panier d'achat -->
<div>
    @csrf
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                <div class="m-l-25 m-r--38 m-lr-0-xl">
                    <div class="wrap-table-shopping-cart">
                        <table class="table-shopping-cart">
                            <tr class="table_head">
                                <th class="column-1">Produit</th>
                                <th class="column-2"></th>
                                <th class="column-3">Prix</th>
                                <th class="column-4">Quantité</th>
                                <th class="column-5">Total</th>
                            </tr>
                            <!-- Les lignes de produits seront ajoutées dynamiquement -->
                        </table>
                    </div>

                    <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
                    
                    </div>
                </div>
            </div>

            <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                    <h4 class="mtext-109 cl2 p-b-30">Totaux du panier</h4>

                    <div class="flex-w flex-t bor12 p-b-13">
                        <div class="size-208">
                            <span class="stext-110 cl2">Sous-total :</span>
                        </div>
                        <div class="size-209">
                            <span class="mtext-110 cl2 cart-subtotal">$0.00</span>
                        </div>
                    </div>

                    <div class="flex-w flex-t bor12 p-t-15 p-b-30">
                        <div class="size-208 w-full-ssm">
                            <span class="stext-110 cl2">Livraison :</span>
                        </div>
                        <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
                            <p class="stext-111 cl6 p-t-2">
                                Il n'y a pas de méthodes de livraison disponibles. Veuillez vérifier votre adresse, ou contactez-nous si vous avez besoin d'aide.
                            </p>
                            <div class="p-t-15">
                                <span class="stext-112 cl8">Calculer la livraison</span>
                                <div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
                                    <select class="js-select2" name="time" id="country-select">
                                        <option>Sélectionnez un pays...</option>
                                    </select>
                                    <div class="dropDownSelect2"></div>
                                </div>
                                <div class="bor8 bg0 m-b-12">
                                    <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="state" placeholder="État / pays">
                                </div>
                                <div class="bor8 bg0 m-b-22">
                                    <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="postcode" placeholder="Code postal / Zip">
                                </div>
                                
                            </div>
                        </div>
                    </div>

                    <div class="flex-w flex-t p-t-27 p-b-33">
                        <div class="size-208">
                            <span class="mtext-101 cl2">Total :</span>
                        </div>
                        <div class="size-209 p-t-1">
                            <span class="mtext-110 cl2 cart-total">$0.00</span>
                        </div>
                    </div>

                    <button type="button" onclick="window.location='{{ route('order.confirm') }}'" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 ">
                        Finaliser la commande
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>


<script src="{{ asset('js/detailsCart.js') }}"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const countrySelect = document.getElementById('country-select');

        fetch('https://restcountries.com/v3.1/all')
            .then(response => response.json())
            .then(data => {
                data.sort((a, b) => a.name.common.localeCompare(b.name.common)); // Tri alphabétique des pays
                data.forEach(country => {
                    const option = document.createElement('option');
                    option.value = country.cca2; // Code du pays
                    option.textContent = country.name.common; // Nom du pays
                    countrySelect.appendChild(option);
                });
            })
            .catch(error => console.error('Erreur lors de la récupération des données des pays:', error));
    });
</script>

</div>

