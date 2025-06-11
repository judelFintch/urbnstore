<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'max:100',
                'regex:/^[a-zA-ZÀ-ÿ\s\'\-]+$/u', // Lettres, accents, espaces, apostrophes, tirets
                function ($attribute, $value, $fail) {
                    if (preg_match('/\.(com|net|store|org|fr|io|biz|link)/i', $value)) {
                        $fail('Le nom ne doit pas contenir de domaine ou d’URL.');
                    }

                    if (str_word_count($value) < 2) {
                        $fail('Veuillez entrer un nom complet (prénom + nom).');
                    }

                    if (strlen($value) > 50 && !str_contains($value, ' ')) {
                        $fail('Ce nom semble incohérent. Veuillez saisir un nom valide.');
                    }
                },
            ],
            'email' => [
                'required',
                'string',
                'email:rfc,dns',
                'max:255',
                'lowercase',
                'unique:' . User::class,
                function ($attribute, $value, $fail) {
                    $blacklist = [
                        'yopmail.com',
                        'mailinator.com',
                        'tempmail.com',
                        '10minutemail.com',
                        'guerrillamail.com',
                        'trashmail.com',
                        'fakeinbox.com'
                    ];

                    $domain = substr(strrchr($value, "@"), 1);

                    if (in_array(strtolower($domain), $blacklist)) {
                        $fail("L'adresse email semble provenir d'un service temporaire. Veuillez utiliser une adresse valide.");
                    }
                },
            ],

            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);
        session()->flash('success', 'Bienvenue sur Urbn ! Votre compte a bien été créé.');
        return redirect(session()->pull('url.intended', route('dashboard')) . $request->query('redirect', ''));
    }
}
