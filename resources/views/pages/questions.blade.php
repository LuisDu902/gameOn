@extends('layouts.app')

@section('content')
    <x-sidebar></x-sidebar>

    <div class="headers">
        <button class="open-sidebar">
            <ion-icon name="menu"></ion-icon>
        </button>
        <ul class="breadcrumb">
            <li><a href="{{ route('home') }}">
                <ion-icon name="home-outline"></ion-icon> Home</a>
            </li>
            <li> Questions</li>
        </ul>
    </div>
    <section class="questions-sec">
        <div class="questions-actions">
            <div class="questions-sort">
                <button class="selected" id="recent">Recent</button>
                <button id="popular">Popular</button>
                <button id="unanswered">Unanswered</button>
            </div>
            <a href="{{ route('questions.create') }}" id="newQuestion">Ask Question</a>
        </div>
        <div class="questions-list">
            @include('partials._questions')
        <div>
    </section>
@endsection