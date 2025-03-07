<?php

if (!function_exists('cleanImageUrl')) {
    function cleanImageUrl($url)
    {
        // Vérifier si l'URL contient des crochets ou des antislashs
        if (str_contains($url, '["') || str_contains($url, '"]') || str_contains($url, '\\')) {
            // Nettoyer l'URL en supprimant les crochets et les antislashs
            return str_replace(['["', '"]', '\\'], '', $url);
        }

        // Si l'URL est déjà propre, on la retourne telle quelle
        return $url;
    }
}

