<?php

namespace Database\Seeders;

use Carbon\Carbon;
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
                    'long_description' => 'Fabriqué en coton de haute qualité, ce t-shirt blanc allie simplicité et confort. Son tissu respirant et doux est idéal pour les journées chaudes ou comme base pour des superpositions. Avec une coupe décontractée et un style intemporel, il convient à toutes les occasions informelles.',
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
                    'long_description' => 'Conçue pour les professionnels et les amateurs de style classique, cette chemise blanche est fabriquée en coton de qualité supérieure pour un confort optimal. Sa coupe ajustée épouse parfaitement le corps pour une allure élégante. Idéale pour le bureau, les réunions ou les événements formels.',
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
                    'long_description' => 'Cette chemise à carreaux bleue pour homme est un mélange parfait de style et de confort. Son design moderne et décontracté convient à diverses occasions, qu\'il s\'agisse d\'une sortie entre amis ou d\'une journée au travail. Le tissu en coton assure une sensation de fraîcheur tout au long de la journée.',
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
                    'image_url' => '/images/product-04.jpg',
                    'rating' => 4.8,
                    'sales_count' => 50,
                    'discount' => 10,
                    'discount_end_date' => Carbon::now()->addDays(10),
                    'added_date' => Carbon::now(),
                    'long_description' => 'Ce manteau long avec col en fausse fourrure est un choix parfait pour les mois d\'hiver. Fabriqué en laine mélangée, il est conçu pour offrir une chaleur optimale tout en ajoutant une touche sophistiquée à votre tenue. Idéal pour les soirées froides ou les événements formels.',
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
                    'image_url' => '/images/product-05.jpg',
                    'rating' => 4.5,
                    'sales_count' => 60,
                    'discount' => 5,
                    'discount_end_date' => Carbon::now()->addDays(7),
                    'added_date' => Carbon::now(),
                    'long_description' => 'Ajoutez une touche moderne à votre garde-robe avec cette chemise en denim pour femme. Confortable et stylée, elle est idéale pour les tenues décontractées. Avec son tissu en denim résistant et ses finitions soignées, elle constitue un élément polyvalent pour toute garde-robe.',
                ],
            ],
            // Ajoutez plus de produits si nécessaire...
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
