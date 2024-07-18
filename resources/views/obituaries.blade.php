@extends('layouts.app')

@section('head')
    <title>{{ $obituary->name }}</title>
    @section('meta')
        <meta name="title" content="{{ $obituary->name }}">
        <meta name="description" content="{{ Str::limit($obituary->content, 155) }}">
        <meta name="keywords" content="{{ $obituary->name. ', '. $obituary->author }}">
    @endsection
    @section('og')
        <meta property="og:title" content="{{ $obituary->name }}">
        <meta property="og:description" content="{{ Str::limit($obituary->content, 155) }}">
        <meta property="og:image" content="{{ asset('images/image.png') }}">
    @endsection
    @section('canonical')
        <link rel="canonical" href="{{ url()->current() }}">
    @endsection
@endsection

@section('content')
    <h1>{{ $obituary->name }}</h1>
    <div itemscope itemtype="http://schema.org/Obituary">
        <p itemprop="dateOfBirth">{{ $obituary->date_of_birth }}</p>
        <p itemprop="dateOfDeath">{{ $obituary->date_of_death }}</p>
        <div itemprop="content">{{ $obituary->content }}</div>
        <p itemprop="author">{{ $obituary->author }}</p>
    </div>
    <div class="social-share">
        <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" target="_blank">
            <i class="fab fa-facebook-f"></i>
        </a>
        <a href="https://twitter.com/intent/tweet?url={{ url()->current() }}&text={{ $obituary->name }}" target="_blank">
            <i class="fab fa-twitter"></i>
        </a>
        <a href="https://www.linkedin.com/shareArticle?url={{ url()->current() }}&title={{ $obituary->name }}" target="_blank">
            <i class="fab fa-linkedin-in"></i>
        </a>
    </div>
@endsection