<x-guest-layout>
    <section class="bg-light mb-5"> <!-- Ajout de mb-5 pour ajouter de l'espace en bas -->
        <div class="container mt-5">
            <!-- Session Status -->
            @if (session('status'))
                <div class="alert alert-success mb-4">
                    {{ session('status') }}
                </div>
            @endif

            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h4 class="card-title text-center mb-4">Connexion</h4>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <!-- Email Address -->
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus>
                                    @error('email')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Password -->
                                <div class="mb-3">
                                    <label for="password" class="form-label">Mot de passe</label>
                                    <input type="password" id="password" name="password" class="form-control" required>
                                    @error('password')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Remember Me -->
                                <div class="form-check mb-4">
                                    <input type="checkbox" class="form-check-input" id="remember_me" name="remember">
                                    <label class="form-check-label" for="remember_me">Se souvenir de moi</label>
                                </div>

                                <!-- Actions -->
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}" class="text-decoration-none">Mot de passe oublié ?</a>
                                    @endif

                                    <button type="submit" class="btn btn-primary">Se connecter</button>
                                </div>
                            </form>

                            <div class="mt-3 text-center">
                                <p>Pas encore de compte ? <a href="{{ route('register') }}" class="text-decoration-none">Inscrivez-vous</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
