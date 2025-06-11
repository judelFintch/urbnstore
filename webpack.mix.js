const mix = require('laravel-mix');

mix
    // CSS: Combine et minifie tous les fichiers CSS
    .styles([
        'resources/css/vendor/bootstrap.min.css',
        'resources/css/vendor/font-awesome.min.css',
        'resources/css/vendor/animate.css',
        'resources/css/vendor/hamburgers.min.css',
        'resources/css/vendor/animsition.min.css',
        'resources/css/vendor/select2.min.css',
        'resources/css/vendor/daterangepicker.css',
        'resources/css/vendor/slick.css',
        'resources/css/vendor/magnific-popup.css',
        'resources/css/vendor/perfect-scrollbar.css',
        'resources/css/util.css',
        'resources/css/main.css',
    ], 'public/css/app.css')

    // JS: Combine et minifie tous les fichiers JS
    .scripts([
        'resources/js/vendor/jquery.min.js',
        'resources/js/vendor/animsition.min.js',
        'resources/js/vendor/popper.js',
        'resources/js/vendor/bootstrap.min.js',
        'resources/js/vendor/select2.min.js',
        'resources/js/vendor/moment.min.js',
        'resources/js/vendor/daterangepicker.js',
        'resources/js/vendor/slick.min.js',
        'resources/js/vendor/parallax100.js',
        'resources/js/vendor/magnific-popup.min.js',
        'resources/js/vendor/isotope.pkgd.min.js',
        'resources/js/vendor/sweetalert.min.js',
        'resources/js/vendor/perfect-scrollbar.min.js',
        'resources/js/slick-custom.js',
        'resources/js/gallerylb.js',
        'resources/js/addwish.js',
        'resources/js/pscroll.js',
        'resources/js/main.js',
    ], 'public/js/app.js')

    // Fichiers du slider produit
    .postCss('resources/css/slide-product.css', 'public/css/slide-product.css')
    .js('resources/js/slide-product.js', 'public/js/slide-product.js')

    // Ajout de version pour éviter les problèmes de cache
    .version();
d