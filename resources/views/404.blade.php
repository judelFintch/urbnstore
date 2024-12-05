<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Introuvable</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f6f6f6;
            text-align: center;
            padding: 50px;
        }
        .container {
            max-width: 600px;
            margin: auto;
        }
        h1 {
            font-size: 48px;
            color: #ff6600;
        }
        p {
            font-size: 18px;
            color: #555;
        }
        a {
            color: #ff6600;
            text-decoration: none;
            font-weight: bold;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Oops! Page introuvable.</h1>
        <p>Il semble que la page que vous recherchez n'existe pas ou a été déplacée.</p>
        <p><a href="{{ route('home.index') }}">Retourner à l'accueil</a></p>
    </div>
</body>
</html>
