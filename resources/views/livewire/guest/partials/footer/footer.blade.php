<div>
    <footer class="bg3 p-t-75 p-b-32">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-3 p-b-50">
                    <h4 class="stext-301 cl0 p-b-30">
                        Catégories
                    </h4>
                    <ul>
                        @if ($categories->isNotEmpty())
                            @foreach ($categories as $category)
                                <li class="p-b-10">
                                    <a href="{{ route('home.shop', ['id' => $category->id, 'slug' => $category->slug]) }}"
                                        class="stext-107 cl7 hov-cl1 trans-04">
                                        {{ $category->name }}
                                    </a>
                                </li>
                            @endforeach
                        @else
                            <p>Aucune catégorie disponible.</p>
                        @endif
                    </ul>
                </div>

                <div class="col-sm-6 col-lg-3 p-b-50">
                    <h4 class="stext-301 cl0 p-b-30">
                        Assistance
                    </h4>

                    <ul class="help-menu">
                        <li class="p-b-10">
                            <a href="{{route('privacy-policy')}}" class="stext-107 cl7 hov-cl1 trans-04">
                                Politique de confidentialité
                            </a>
                        </li>
                        <li class="p-b-10">
                            <a href="{{route('terms-and-conditions')}}" class="stext-107 cl7 hov-cl1 trans-04">
                                Termes & Conditions
                            </a>
                        </li>
                        <li class="p-b-10">
                            <a href="{{route('privacy-policy')}}" class="stext-107 cl7 hov-cl1 trans-04">
                                Tableau Taille
                            </a>
                        </li>

                        <li class="p-b-10">
                            <a href="{{route('home.contact')}}" class="stext-107 cl7 hov-cl1 trans-04">
                                Contact
                            </a>
                        </li>

                    </ul>
                </div>
                <div class="col-sm-6 col-lg-3 p-b-50">
                    <h4 class="stext-301 cl0 p-b-30">
                        Contactez-nous
                    </h4>
                    <p class="stext-107 cl7 size-201">

                        Téléphone : (+243) 99 99 907 56<br>
                        Email :support@urbanbrands.store.com<br>
                    </p>

                    <div class="p-t-27">
                        <a href="https://www.facebook.com/share/3nycvD3WEvUSQYbB/?mibextid=LQQJ4d"
                            class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                            <i class="fa fa-facebook"></i>
                        </a>
                        <a href="https://www.instagram.com/urbn_store.01?igsh=OGlrcnBkeGdpeWVu&utm_source=qr"
                            class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                            <i class="fa fa-instagram"></i>
                        </a>
                        <a href="https://www.tiktok.com/@urbn_store?_t=8qeIyZzivnp&_r=1"
                            class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                            <i class="fa fa-tiktok"></i>
                        </a>
                        <a href="https://wa.me/243999990756?text=Bonjour,%20je%20viens%20du%20site%20UrbanStore%20et%20j%27aimerais%20obtenir%20plus%20d%27informations."
                            class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                            <i class="fa fa-whatsapp"></i>
                        </a>

                    </div>
                </div>
                <div class="col-sm-6 col-lg-3 p-b-50">
                    @livewire('partials.newsletter.newsletter')
                </div>

                <div class="p-t-40">
                    <div class="flex-c-m flex-w p-b-18">
                        <a href="#" class="m-all-1">
                            <img src="{{ asset('images/icons/icon-pay-01.png') }}" alt="Paiement sécurisé">
                        </a>
                        <a href="#" class="m-all-1">
                            <img src="{{ asset('images/icons/icon-pay-02.png') }}" alt="Paiement sécurisé">
                        </a>
                        <a href="#" class="m-all-1">
                            <img src="{{ asset('images/icons/icon-pay-03.png') }}" alt="Paiement sécurisé">
                        </a>
                        <a href="#" class="m-all-1">
                            <img src="{{ asset('images/icons/icon-pay-04.png') }}" alt="Paiement sécurisé">
                        </a>
                        <a href="#" class="m-all-1">
                            <img src="{{ asset('images/icons/icon-pay-05.png') }}" alt="Paiement sécurisé">
                        </a>
                    </div>
                    <p class="stext-107 cl6 txt-center">
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script>
                        Tous droits réservés | Réalisé par Urban Store
                    </p>
                </div>
            </div>
    </footer>
</div>