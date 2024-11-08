<?php

namespace App\Helpers;

/**
 * La classe Helpers contient des méthodes statiques qui aident à gérer des valeurs par défaut 
 * et des constantes dans l'application.
 * L'objectif de cette classe est de centraliser la gestion des constantes et 
 * des valeurs par défaut utilisées à plusieurs endroits dans l'application.
 * 
 * Auteur : judel Fintch judfintch@gmail.com (à personnaliser selon l'auteur du code)
 */
class Helpers 
{
    // Définir une constante pour la catégorie par défaut "ALL"
    const DEFAULT_CATEGORY = 'all_categories'; 
    
    // Définir une constante pour l'URL du produit par défaut
    const DEFAULT_URL_PRODUCT = 'all_products';  // Correction de la faute de frappe dans l'URL produit

    /**
     * Méthode statique pour obtenir la catégorie par défaut.
     *
     * Cette méthode renvoie la constante qui contient la valeur de la catégorie par défaut
     * utilisée lorsqu'aucune catégorie spécifique n'est spécifiée dans l'application.
     *
     * @return string La catégorie par défaut.
     */
    public static function getDefaultCategory()
    {
        return self::DEFAULT_CATEGORY;
    }

    /**
     * Méthode statique pour obtenir l'URL du produit par défaut.
     *
     * Cette méthode renvoie la constante qui contient l'URL par défaut pour les produits
     * lorsque aucun produit spécifique n'est fourni dans l'application.
     *
     * @return string L'URL du produit par défaut.
     */
    public static function getDefaultUrlProduct()
    {
        return self::DEFAULT_URL_PRODUCT;
    }
    
    /**
     * Cette méthode peut être utilisée pour récupérer d'autres valeurs ou constantes par défaut
     * dans le futur si nécessaire.
     * 
     * Exemple : 
     * public static function getDefaultValue() { return self::DEFAULT_VALUE; }
     */
}

