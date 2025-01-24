<x-app-layout>
    <section class="bg-light mb-5 py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card shadow border-0 rounded-3">
                        <div class="card-body p-4">
                            <!-- Logo Section -->
                            <div class="text-center mb-4">
                                <a href="{{ url('/') }}">
                                    <img src="{{ asset('images/logo/circle_favicon.svg') }}" alt="Logo"
                                        class="img-fluid mb-3" style="max-height: 50px;">
                                </a>
                                <h5 class="text-primary">Connexion</h5>
                                <p class="text-muted">Accédez à votre compte avec votre email et mot de passe.</p>
                            </div>

                            <!-- Login Form -->
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <!-- Email or Username -->
                                <div class="form-floating mb-3">
                                    <input type="text" id="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email') }}" placeholder="Entrez votre email ou nom d'utilisateur"
                                        required>
                                    <label for="email">Email ou Nom d'utilisateur</label>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Password -->
                                <div class="form-floating mb-3">
                                    <input type="password" id="password" name="password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        placeholder="Entrez votre mot de passe" required>
                                    <label for="password">Mot de passe</label>
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="text-end mt-2">
                                        <a href="{{ route('password.request') }}"
                                            class="text-decoration-none text-muted">Mot de passe oublié ?</a>
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary w-100">Se connecter</button>
                                </div>
                            </form>

                            <!-- Register Link -->
                            <div class="text-center mt-3">
                                <p class="mb-0">Nouveau sur notre plateforme ? <a href="{{ route('register') }}"
                                        class="text-primary">Créer un compte</a></p>
                            </div>

                            <!-- Divider -->
                            <div class="text-center py-3">
                                <h6 class="overline-title"><span>OU</span></h6>
                            </div>

                            <!-- Social Media Links -->
                            <div class="d-flex justify-content-center">
                                <a href="#" class="btn btn-outline-primary me-2">Facebook</a>
                                <a href="#" class="btn btn-outline-danger">Google</a>
                            </div>
                        </div>
                        <!-- Footer Section -->
                        <div class="card-footer bg-light text-center py-3">
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item"><a href="{{route('terms-and-conditions')}}" class="text-muted">Conditions d'utilisation</a>
                                </li>
                                <li class="list-inline-item"><a href="{{route('privacy-policy')}}" class="text-muted">Politique de
                                        confidentialité</a></li>
                               
                            </ul>
                            <p class="mt-3 text-muted mb-0">&copy; {{ date('Y') }} UrbanStore. Tous droits réservés.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>