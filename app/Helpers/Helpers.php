<?php

// Check if the function 'cleanImageUrl' does not already exist to avoid redeclaration errors
if (! function_exists('cleanImageUrl')) {
    /**
     * Cleans a product image URL by removing special characters
     * that might cause display issues.
     *
     * Problem: When saving a product image, special characters like brackets `[" "]`
     * and backslashes `\` are sometimes inserted into the URL, making the image path invalid.
     *
     * Solution: This function detects and removes these unwanted characters, ensuring
     * the URL is properly formatted and readable.
     *
     * Author: Judel Fincht
     *
     * @param  string  $url  The image URL to be cleaned.
     * @return string The cleaned URL.
     */
    function cleanImageUrl($url)
    {
        // Check if the URL contains unwanted brackets or backslashes
        if (str_contains($url, '["') || str_contains($url, '"]') || str_contains($url, '\\')) {
            // Remove the unwanted characters and return the cleaned URL
            return str_replace(['["', '"]', '\\'], '', $url);
        }

        // If the URL is already clean, return it as is
        return $url;
    }
}
