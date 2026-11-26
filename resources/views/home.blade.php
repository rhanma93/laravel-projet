@extends('layouts.app')

@section('title', 'GameZone - Accueil')

@section('content')
<h1>Bienvenue sur GameZone !</h1>
<p>Retrouvez les dernières actualités du jeu vidéo.</p>

<h2>Derniers articles</h2>

<div class="articles">
    @forelse($articles as $article)
        <div class="card">
            @if($article->image_url)
                <img src="{{ $article->image_url }}" alt="{{ $article->title }}">
            @endif
            <div class="card-body">
                <p class="info">{{ $article->category?->name ?? 'Gaming' }} - {{ $article->published_at?->format('d/m/Y') }}</p>
                <h3><a href="{{ route('articles.show', $article->slug) }}">{{ $article->title }}</a></h3>
                <p>{{ $article->excerpt }}</p>
                <a href="{{ route('articles.show', $article->slug) }}">Lire la suite</a>
            </div>
        </div>
    @empty
        <p>Aucun article pour le moment.</p>
    @endforelse
</div>

<p><a href="{{ route('articles.index') }}">Voir tous les articles</a></p>
@endsection
