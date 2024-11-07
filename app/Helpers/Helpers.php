<?php
namespace App\Helpers;

class Helpers 
{
    // Définir une constante pour la catégorie "ALL"
    const DEFAULT_CATEGORY = 'all_categories';
    const DEFAULT_URL_PROUDCT = 'all_products';

    public function __construct() {}

    /**
     * Exemple de méthode qui pourrait utiliser cette constante
     * pour obtenir une catégorie par défaut.
     */
    public static function getDefaultCategory()
    {
        return self::DEFAULT_CATEGORY;
    }


    public static function getDefaultUrlProduct(){
       
        return self:: DEFAULT_URL_PROUDCT;
    }
}
