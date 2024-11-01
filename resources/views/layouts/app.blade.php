<!DOCTYPE html>
<html lang="en">

<head>
    <title>Urban Store</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="images/icons/favicon.png" />
    <meta name="description" content="Urban Store - La meilleure boutique pour des produits urbains">
    <link rel="stylesheet" href="{{asset('admin/assets/css/dashlite.css?ver=3.1.2')}}">
    <link id="skin-default" rel="{{asset('stylesheet" href="admin/assets/css/theme.css?ver=3.1.2')}}">
</head>
<body class="animsition">
    <main>
        {{ $slot }}
    </main>

    <script src="{{asset('admin/assets/js/bundle.js?ver=3.1.2')}}"></script>
    <script src="{{asset('admin/assets/js/scripts.js?ver=3.1.2')}}"></script>
    <script src="{{asset('admin/assets/js/charts/chart-ecommerce.js?ver=3.1.2')}}"></script>

</body>

</html>
