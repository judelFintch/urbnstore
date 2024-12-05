<x-login-layout>
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main">
            <!-- wrap @s -->
            <div class="nk-wrap nk-wrap-nosidebar">
                <!-- content @s -->
                <div class="nk-content">
                    <div class="nk-split nk-split-page nk-split-lg">
                        <div class="nk-split-content nk-block-area nk-block-area-column nk-auth-container bg-white">
                            <div class="absolute-top-right d-lg-none p-3 p-sm-5">
                                <a href="#" class="toggle btn-white btn btn-icon btn-light"
                                    data-target="athPromo"><em class="icon ni ni-info"></em></a>
                            </div>
                            <div class="nk-block nk-block-middle nk-auth-body">
                                <!-- Logo Section -->
                                <div class="brand-logo pb-5">
                                    <a href="{{ url('/') }}" class="logo-link">
                                        <img class="logo-light logo-img logo-img-lg"
                                            src="{{ asset('images/logo/circle_favicon.svg') }}"
                                            srcset="{{ asset('images/icons/lg.png') }} 2x" alt="logo">
                                        <img class="logo-dark logo-img logo-img-lg"
                                            src="{{ asset('images/icons/lg.png') }}"
                                            srcset="{{ asset('images/icons/lg.png') }} 2x" alt="logo-dark">
                                    </a>
                                </div>
                                <!-- Header Section -->
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h5 class="nk-block-title">Connexion</h5>
                                        <div class="nk-block-des">
                                            <p>Accédez au tableau de bord en utilisant votre email et votre mot de
                                                passe.</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Login Form -->
                                <form method="POST" action="{{ route('login') }}" class="form-validate is-alter"
                                    autocomplete="off">
                                    @csrf
                                    <!-- Email or Username -->
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="email">Email ou Nom d'utilisateur</label>
                                            <a class="link link-primary link-sm" tabindex="-1" href="#">Besoin
                                                d'aide ?</a>
                                        </div>
                                        <div class="form-control-wrap">
                                            <input autocomplete="off" type="text"
                                                class="form-control form-control-lg" required id="email"
                                                name="email" value="{{ old('email') }}"
                                                placeholder="Entrez votre email ou nom d'utilisateur">
                                            @error('email')
                                                <div class="text-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div><!-- .form-group -->

                                    <!-- Password -->
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="password">Mot de passe</label>
                                            <a class="link link-primary link-sm" tabindex="-1"
                                                href="{{ route('password.request') }}">Mot de passe oublié ?</a>
                                        </div>
                                        <div class="form-control-wrap">
                                            <a tabindex="-1" href="#"
                                                class="form-icon form-icon-right passcode-switch lg"
                                                data-target="password">
                                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                            </a>
                                            <input autocomplete="new-password" type="password"
                                                class="form-control form-control-lg" required id="password"
                                                name="password" placeholder="Entrez votre mot de passe">
                                            @error('password')
                                                <div class="text-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div><!-- .form-group -->

                                    <!-- Submit Button -->
                                    <div class="form-group">
                                        <button class="btn btn-lg btn-primary btn-block">Se connecter</button>
                                    </div>
                                </form>

                                <!-- Register Link -->
                                <div class="form-note-s2 pt-4"> Nouveau sur notre plateforme ? <a
                                        href="{{ route('register') }}">Créez un compte</a></div>

                                <!-- OR Section -->
                                <div class="text-center pt-4 pb-3">
                                    <h6 class="overline-title overline-title-sap"><span>OU</span></h6>
                                </div>

                                <!-- Social Media Links -->
                                <ul class="nav justify-center gx-4">
                                    <li class="nav-item"><a class="nav-link" href="#">Facebook</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#">Google</a></li>
                                </ul>

                                <!-- Free Trial Section -->
                               
                            </div><!-- .nk-block -->

                            <!-- Footer Section -->
                            <div class="nk-block nk-auth-footer">
                                <div class="nk-block-between">
                                    <ul class="nav nav-sm">
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Conditions d'utilisation</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Politique de confidentialité</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Aide</a>
                                        </li>
                                    </ul><!-- .nav -->
                                </div>
                                <div class="mt-3">
                                    <p>&copy; {{ date('Y') }} DashLite. Tous droits réservés.</p>
                                </div>
                            </div><!-- .nk-block -->
                        </div><!-- .nk-split-content -->

                        <!-- Promo Section (Optional) -->
                        <div class="nk-split-content nk-split-stretch bg-lighter d-flex toggle-break-lg toggle-slide toggle-slide-right"
                            data-toggle-body="true" data-content="athPromo" data-toggle-screen="lg"
                            data-toggle-overlay="true">
                            <div class="slider-wrap w-100 w-max-550px p-3 p-sm-5 m-auto">
                                <div class="slider-init" data-slick='{"dots":true, "arrows":false}'>
                                    <div class="slider-item">
                                        <div class="nk-feature nk-feature-center">
                                            <div class="nk-feature-img">
                                                <img class="round" src="{{ asset('images/slide.jpg') }}"
                                                    srcset="{{ asset('images/slides/promo-a2x.png') }} 2x"
                                                    alt="">
                                            </div>
                                            <div class="nk-feature-content py-4 p-sm-5">
                                                <h4>URBAN</h4>
                                                <p>Nous croyons que la mode est plus qu’un simple vêtement. C’est un
                                                    moyen de raconter son histoire, d’affirmer son identité et de
                                                    célébrer la culture. Alors, "Find Your Style" et rejoignez-nous dans
                                                    ce mouvement qui mélange modernité et authenticité</p>
                                            </div>
                                        </div>
                                    </div><!-- .slider-item -->
                                </div><!-- .slider-init -->
                                <div class="slider-dots"></div>
                                <div class="slider-arrows"></div>
                            </div><!-- .slider-wrap -->
                        </div><!-- .nk-split-content -->
                    </div><!-- .nk-split -->
                </div><!-- .nk-content -->
                <!-- wrap @e -->
            </div><!-- .nk-wrap -->
        </div><!-- main @e -->
    </div><!-- app-root @e -->
</x-app-layout>
