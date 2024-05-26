@extends('layouts.app')

@section('title', $anime['title'])

@section('detail')

<div class="container mx-auto my-8 px-4">
    <a href="{{ url('/') }}" class="mt-2 mb-8 inline-block bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700">
        <span class="material-symbols-outlined">
            home
        </span>
    </a>
    <div class="flex flex-col justify-center items-center">
        <h1 class="text-3xl font-bold mb-4">{{ $anime['title'] }}</h1>
        <img src="{{ $anime['images']['jpg']['image_url'] }}" alt="{{ $anime['title'] }}" class="mb-4 h-84 w-auto">
    </div>
    <div class="text-2xl mt-6">
        <p><strong>Tipe:</strong> {{ $anime['type'] }}</p>
        <p><strong>Status:</strong> {{ $anime['status'] }}</p>
        <p><strong>Episode:</strong> {{ $anime['episodes'] }}</p>
        <p><strong>Skor:</strong> {{ $anime['score'] }}</p>
        <p><strong>Durasi:</strong> {{ $anime['duration'] }}</p>
        <p><strong>Sinopsis:</strong> {{ $anime['synopsis'] }}</p>
    </div>


</div>

<div class="flex justify-center mt-4">
    <a href="{{ $anime['url'] }}" target="_blank" class="text-blue-500 hover:text-blue-700 font-semibold py-2 px-4 border border-blue-500 rounded transition duration-300 ease-in-out">
        Tonton Sekarang?
    </a>
</div>

@endsection


