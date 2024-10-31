<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Liste des produits avec leurs détails
        $products = [
            [
                'product' => [
                    'title' => 'T-shirt Basique Blanc',
                    'slug' => 't-shirt-basique-blanc',
                    'description' => 'Un t-shirt blanc en coton doux et respirant, parfait pour un look décontracté.',
                    'price' => 19.99,
                    'stock' => 50,
                    'is_active' => true,
                    'category_id' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                    
                ],
                'details' => [
                    'color' => 'Blanc',
                    'material' => 'Coton',
                    'sleeve_type' => 'Manches courtes',
                    'collar_type' => 'Col rond',
                    'fit' => 'Décontracté',
                    'size_available' => 'S,M,L,XL',
                    'care_instructions' => 'Laver en machine à 30°C',
                    'tags' => 't-shirt, basique, blanc, casual',
                    'image_url' => '/images/product-01.jpg',
                    'rating' => 4.5,
                    'sales_count' => 120,
                    'discount' => 0,
                    'discount_end_date' => null,
                    'added_date' => Carbon::now(),
                    'isNew' => true,
                ],
            ],
            [
                'product' => [
                    'title' => 'Chemise Blanche Élégante',
                    'slug' => 'chemise-blanche-elegante',
                    'description' => 'Une chemise blanche élégante et ajustée, idéale pour le travail ou les occasions formelles.',
                    'price' => 39.99,
                    'stock' => 35,
                    'is_active' => true,
                    'category_id' => 2,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                'details' => [
                    'color' => 'Blanc',
                    'material' => 'Coton',
                    'sleeve_type' => 'Manches longues',
                    'collar_type' => 'Col classique',
                    'fit' => 'Ajusté',
                    'size_available' => 'S,M,L,XL',
                    'care_instructions' => 'Laver en machine à 30°C',
                    'tags' => 'chemise, blanc, élégant, formel',
                    'image_url' => '/images/product-02.jpg',
                    'rating' => 4.7,
                    'sales_count' => 60,
                    'discount' => 0,
                    'discount_end_date' => null,
                    'added_date' => Carbon::now(),
                    'isNew' => true,
                ],
            ],
            [
                'product' => [
                    'title' => 'Chemise à Carreaux Homme',
                    'slug' => 'chemise-a-carreaux-homme',
                    'description' => 'Chemise à carreaux pour homme, idéale pour un look casual et tendance.',
                    'price' => 29.99,
                    'stock' => 40,
                    'is_active' => true,
                    'category_id' => 3,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                'details' => [
                    'color' => 'Bleu',
                    'material' => 'Coton',
                    'sleeve_type' => 'Manches courtes',
                    'collar_type' => 'Col boutonné',
                    'fit' => 'Classique',
                    'size_available' => 'S,M,L,XL',
                    'care_instructions' => 'Laver en machine à 30°C',
                    'tags' => 'chemise, carreaux, bleu, casual',
                    'image_url' => '/images/product-03.jpg',
                    'rating' => 4.6,
                    'sales_count' => 85,
                    'discount' => 0,
                    'discount_end_date' => null,
                    'added_date' => Carbon::now(),
                ],
                
            ],
            [
                'product' => [
                    'title' => 'Manteau Long avec Col en Fourrure',
                    'slug' => 'manteau-long-col-fourrure',
                    'description' => 'Manteau long pour femme avec ceinture et col en fausse fourrure, parfait pour un look élégant et chaleureux en hiver.',
                    'price' => 99.99,
                    'stock' => 20,
                    'is_active' => true,
                    'category_id' => 2,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                'details' => [
                    'color' => 'Vert olive',
                    'material' => 'Laine mélangée',
                    'sleeve_type' => 'Manches longues',
                    'collar_type' => 'Col châle en fourrure',
                    'fit' => 'Ajusté',
                    'size_available' => 'S,M,L,XL',
                    'care_instructions' => 'Nettoyage à sec uniquement',
                    'tags' => 'manteau, hiver, fourrure, vert olive, élégant',
                    'image_url' => '/mnt/data/product-04.jpg',
                    'rating' => 4.8,
                    'sales_count' => 50,
                    'discount' => 10,
                    'discount_end_date' => Carbon::now()->addDays(10),
                    'added_date' => Carbon::now(),
                ],
            ],
            [
                'product' => [
                    'title' => 'Chemise en Denim pour Femme',
                    'slug' => 'chemise-denim-femme',
                    'description' => 'Chemise en denim pour femme, idéale pour un style décontracté avec une touche moderne.',
                    'price' => 39.99,
                    'stock' => 35,
                    'is_active' => true,
                    'category_id' => 3,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                'details' => [
                    'color' => 'Gris',
                    'material' => 'Denim',
                    'sleeve_type' => 'Manches longues',
                    'collar_type' => 'Col classique',
                    'fit' => 'Décontracté',
                    'size_available' => 'S,M,L,XL',
                    'care_instructions' => 'Laver en machine à 40°C',
                    'tags' => 'chemise, denim, gris, décontracté, tendance',
                    'image_url' => '/mnt/data/product-05.jpg',
                    'rating' => 4.5,
                    'sales_count' => 60,
                    'discount' => 5,
                    'discount_end_date' => Carbon::now()->addDays(7),
                    'added_date' => Carbon::now(),
                ],
            ],
            [
                'product' => [
                    'title' => 'Blazer Carreaux Femme',
                    'slug' => 'blazer-carreaux-femme',
                    'description' => 'Blazer à carreaux pour femme, un indispensable pour un style professionnel ou chic-casual.',
                    'price' => 69.99,
                    'stock' => 25,
                    'is_active' => true,
                    'category_id' => 3,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                'details' => [
                    'color' => 'Gris à carreaux',
                    'material' => 'Polyester et laine',
                    'sleeve_type' => 'Manches longues',
                    'collar_type' => 'Col cranté',
                    'fit' => 'Slim',
                    'size_available' => 'S,M,L,XL',
                    'care_instructions' => 'Laver à la main ou nettoyage à sec',
                    'tags' => 'blazer, carreaux, gris, chic, professionnel',
                    'image_url' => '/mnt/data/product-07.jpg',
                    'rating' => 4.7,
                    'sales_count' => 40,
                    'discount' => 15,
                    'long_description' => "",
                    'discount_end_date' => Carbon::now()->addDays(5),
                    'added_date' => Carbon::now(),
                ],
            ],
            
        ];

        // Insérer les produits et leurs détails dans la base de données
        foreach ($products as $productData) {
            $productId = DB::table('products')->insertGetId($productData['product']);

            DB::table('product_details')->insert(array_merge($productData['details'], [
                'product_id' => $productId,
            ]));
        }
    }
}
