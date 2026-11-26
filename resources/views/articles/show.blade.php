@extends('layouts.app')

@section('title', $article->title . ' - GameZone')

@section('content')
<p><a href="{{ route('articles.index') }}">← Retour aux actualités</a></p>

<div class="article">
    <h1>{{ $article->title }}</h1>
    <p class="info">{{ $article->category?->name ?? 'Gaming' }} - Publié le {{ $article->published_at?->format('d/m/Y à H:i') }}</p>
    <p class="excerpt">{{ $article->excerpt }}</p>

    @if($article->image_url)
        <img src="{{ $article->image_url }}" alt="{{ $article->title }}">
    @endif

    <div class="content">{!! nl2br(e($article->content)) !!}</div>
</div>

@if($related->isNotEmpty())
    <h2>À lire aussi</h2>
    <ul>
        @foreach($related as $item)
            <li><a href="{{ route('articles.show', $item->slug) }}">{{ $item->title }}</a></li>
        @endforeach
    </ul>
@endif
@endsection
