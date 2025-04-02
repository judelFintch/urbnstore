<?php

namespace App\Services\Users;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    /**
     * Créer un nouvel utilisateur.
     */
    public static function create(array $data): User
    {
        return User::create([
            'name' => $data['name'] ?? null,
            'email' => $data['email'] ?? null,
            'password' => isset($data['password']) ? Hash::make($data['password']) : null,
        ]);
    }

    /**
     * Mettre à jour les informations d’un utilisateur.
     */
    public static function update(User $user, array $data): User
    {
        $user->update([
            'name' => $data['name'] ?? $user->name,
            'email' => $data['email'] ?? $user->email,
            'password' => isset($data['password']) ? Hash::make($data['password']) : $user->password,
        ]);

        return $user;
    }

    /**
     * Supprimer un utilisateur.
     */
    public static function delete(User $user): bool
    {
        return $user->delete();
    }

    /**
     * Trouver un utilisateur par son ID.
     */
    public static function find(int $id): ?User
    {
        return User::find($id);
    }

    /**
     * Récupérer tous les utilisateurs.
     */
    public static function all()
    {
        return User::all();
    }

    public static function paginated($perPage = 10)
{
    return User::paginate($perPage);
}
}
