@extends('layouts.app')

@section('title', 'Xem bài viết')

@section('content')
    <h2>Bài viết #{{ $article->id }}</h2>
    <h3>{{ $article->title }}</h3>
    <p>{{ $article->body }}</p>
@endsection
