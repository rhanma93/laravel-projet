<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'GameZone')</title>
    <meta name="description" content="Les actualités du jeu vidéo.">
    <link rel="stylesheet" href="{{ asset('css/gamezone.css') }}">
</head>
<body>

<header>
    <div class="container">
        <a class="logo" href="{{ route('home') }}">GameZone</a>
        <nav>
            <a href="{{ route('home') }}">Accueil</a>
            <a href="{{ route('articles.index') }}">Actualités</a>
        </nav>
    </div>
</header>

<main class="container">
    @yield('content')
</main>

<footer>
    <div class="container">
        <p>© {{ date('Y') }} GameZone</p>
    </div>
</footer>

</body>
</html>
