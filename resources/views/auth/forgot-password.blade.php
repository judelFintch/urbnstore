<x-app-layout>
    <section class="bg-light mb-5 py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card shadow border-0 rounded-3">
                        <div class="card-body p-4">
                            <!-- Header Section -->
                            <div class="text-center mb-4">
                                <h5 class="text-primary">Réinitialisation du mot de passe</h5>
                                <p class="text-muted">Vous avez oublié votre mot de passe ? Pas de problème. Entrez votre adresse email et nous vous enverrons un lien pour le réinitialiser.</p>
                            </div>

                            <!-- Session Status -->
                            @if (session('status'))
                                <div class="alert alert-success text-center">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <!-- Reset Password Form -->
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf

                                <!-- Adresse Email -->
                                <div class="form-floating mb-3">
                                    <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                           value="{{ old('email') }}" placeholder="Entrez votre adresse e-mail" required autofocus>
                                    <label for="email">Adresse e-mail</label>
                                    @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Submit Button -->
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary w-100">Envoyer le lien de réinitialisation</button>
                                </div>
                            </form>

                            <!-- Back to Login -->
                            <div class="text-center mt-3">
                                <p class="mb-0">Vous vous souvenez de votre mot de passe ? <a href="{{ route('login') }}" class="text-primary">Connectez-vous ici</a></p>
                            </div>
                        </div>

                        <!-- Footer Section -->
                        <div class="card-footer bg-light text-center py-3">
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item"><a href="#" class="text-muted">Conditions d'utilisation</a></li>
                                <li class="list-inline-item"><a href="#" class="text-muted">Politique de confidentialité</a></li>
                                <li class="list-inline-item"><a href="#" class="text-muted">Aide</a></li>
                            </ul>
                            <p class="mt-3 text-muted mb-0">&copy; {{ date('Y') }} UrbanStore. Tous droits réservés.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
