@extends('layouts.app')

@section('title', 'Actualités - GameZone')

@section('content')
<h1>Actualités</h1>
<p>Tous les articles publiés sur le site.</p>

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
        <p>Aucun article publié pour le moment.</p>
    @endforelse
</div>

@if($articles->hasPages())
    <div class="pagination">
        @if($articles->onFirstPage())
            <span class="disabled">« Précédent</span>
        @else
            <a href="{{ $articles->previousPageUrl() }}">« Précédent</a>
        @endif

        <span>Page {{ $articles->currentPage() }} sur {{ $articles->lastPage() }}</span>

        @if($articles->hasMorePages())
            <a href="{{ $articles->nextPageUrl() }}">Suivant »</a>
        @else
            <span class="disabled">Suivant »</span>
        @endif
    </div>
@endif
@endsection
