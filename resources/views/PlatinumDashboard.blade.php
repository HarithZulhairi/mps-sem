@extends('layouts.masterPlatinum')

@section('content')

<style>
.container {
    position: relative;
    text-align: center;
    padding-top: 2rem;
}

.image-row {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 0;
    margin-bottom: 1rem;
}

.home-image {
    position: relative;
    width: 33.33%;
    height: 25vh;
    overflow: hidden;
}

.home-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}

.home-image .overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
}

.container h1 {
    margin-top: 1rem;
}

.container h2 {
    margin-top: 0.5rem;
}
</style>

<div class="container">
    <div class="image-row">
        <div class="home-image">
            <div class="overlay"></div>
            <img src="{{ asset('uploads/seminar.jpg') }}" alt="Seminar Image">
        </div>
        <div class="home-image">
            <div class="overlay"></div>
            <img src="{{ asset('uploads/seminar.jpg') }}" alt="Seminar Image">
        </div>
        <div class="home-image">
            <div class="overlay"></div>
            <img src="{{ asset('uploads/seminar.jpg') }}" alt="Seminar Image">
        </div>
    </div>
    <h1>Welcome to MPScholar,</h1>
    <h3>{{ Auth::user()->name }}</h3>
</div>

@endsection