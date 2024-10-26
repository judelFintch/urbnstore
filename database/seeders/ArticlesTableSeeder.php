<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
        [
            'title' => 'T-shirt Basique Blanc',
            'slug' => ' T-shirt-Basique-Blanc',
            'description' => 'Ce t-shirt blanc est un incontournable de toute garde-robe. Fabriqué en coton doux et respirant, il offre un confort optimal tout au long de la journée. Sa coupe décontractée et son design minimaliste en font le choix parfait pour un look simple et épuré. À porter seul ou sous une veste pour un style décontracté et chic..',
            'price' => 19.99,
            'stock' => 50,
            'is_active' => true,
            'category_id' => 1, // ID de la catégorie "Homme"
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'title' => 'Robe Fleurie Femme',
            'slug' => 'robe-fleurie-femme',
            'description' => 'Robe légère et élégante avec motif fleuri pour femme.',
            'price' => 49.99,
            'stock' => 20,
            'is_active' => true,
            'category_id' => 2, // ID de la catégorie "Femme"
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'title' => 'Jeans Slim Enfant',
            'slug' => 'jeans-slim-enfant',
            'description' => 'Jeans slim confortable pour enfant, disponible en plusieurs tailles.',
            'price' => 29.99,
            'stock' => 30,
            'is_active' => true,
            'category_id' => 3, // ID de la catégorie "Enfant"
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'title' => 'Baskets Sport Femme',
            'slug' => 'baskets-sport-femme',
            'description' => 'Baskets légères et respirantes pour les activités sportives.',
            'price' => 59.99,
            'stock' => 15,
            'is_active' => true,
            'category_id' => 4, // ID de la catégorie "Chaussures"
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'title' => 'Sac à Dos Mode Homme',
            'slug' => 'sac-a-dos-mode-homme',
            'description' => 'Sac à dos en cuir pour homme, élégant et pratique.',
            'price' => 79.99,
            'stock' => 10,
            'is_active' => true,
            'category_id' => 5, // ID de la catégorie "Accessoires"
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'title' => 'Pull en Laine Femme',
            'slug' => 'pull-en-laine-femme',
            'description' => 'Pull chaud en laine, idéal pour l\'hiver.',
            'price' => 39.99,
            'stock' => 25,
            'is_active' => true,
            'category_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'title' => 'Chaussures de Sport Homme',
            'slug' => 'chaussures-de-sport-homme',
            'description' => 'Chaussures de sport confortables pour homme.',
            'price' => 69.99,
            'stock' => 18,
            'is_active' => true,
            'category_id' => 4,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'title' => 'Short de Bain Enfant',
            'slug' => 'short-de-bain-enfant',
            'description' => 'Short de bain coloré pour enfant, parfait pour la plage.',
            'price' => 24.99,
            'stock' => 40,
            'is_active' => true,
            'category_id' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'title' => 'Manteau d\'Hiver Femme',
            'slug' => 'manteau-hiver-femme',
            'description' => 'Manteau chaud et élégant pour l\'hiver.',
            'price' => 89.99,
            'stock' => 12,
            'is_active' => true,
            'category_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ],
       
        [
            'title' => 'Montre Élégante Homme',
            'slug' => 'montre-elegante-homme',
            'description' => 'Montre en acier inoxydable, élégante et moderne.',
            'price' => 99.99,
            'stock' => 8,
            'is_active' => true,
            'category_id' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'title' => 'Bottes de Pluie Femme',
            'slug' => 'bottes-de-pluie-femme',
            'description' => 'Bottes imperméables pour affronter la pluie avec style.',
            'price' => 39.99,
            'stock' => 20,
            'is_active' => true,
            'category_id' => 4,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'title' => 'Sweat-shirt à Capuche Enfant',
            'slug' => 'sweat-shirt-capuche-enfant',
            'description' => 'Sweat-shirt douillet avec capuche pour enfant.',
            'price' => 34.99,
            'stock' => 35,
            'is_active' => true,
            'category_id' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        ]);
    }
}
