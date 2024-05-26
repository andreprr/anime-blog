@extends('layouts.app')

@section('sidebar')
<div class="mb-4">
    <h2 class="text-2xl font-bold">Informasi Halaman</h2>
    <ul>
        <li><a href="#top-anime" class="text-blue-500">Top Anime</a></li>
        <li><a href="#recommendations" class="text-blue-500">Rekomendasi Anime</a></li>
        <li><a href="#on-going" class="text-blue-500">On-Going Anime</a></li>
    </ul>
</div>
@endsection

@section('seasons')
<div id="on-going">
    <h1 class="text-3xl font-bold mb-4">On-Going Anime</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        @foreach ($seasonalAnime as $anime)
            <div class="rounded-lg shadow-md p-4 transform transition duration-500 hover:scale-105 hover:shadow-xl ease-in-out hover:bg-gray-700">
                <img src="{{ $anime['images']['jpg']['image_url'] }}" alt="{{ $anime['title'] }}" class="w-full mb-4 h-62 object-cover">
                <h2 class="text-xl font-bold mb-2">{{ $anime['title'] }}</h2>
                <p>{{ $anime['type'] }} | {{ $anime['episodes'] }} Episodes</p>
                <p>{{ $anime['season'] }}</p>
                <a href="{{ route('anime.show', ['id' => $anime['mal_id']]) }}" class="text-blue-500 mt-2 inline-block">Lihat detail</a>
            </div>
        @endforeach
    </div>
</div>
@endsection


@section('recom')
    <div id="recommendations">
        <h1 class="text-3xl font-bold mb-4">Rekomendasi Anime</h1>
        @if ($recommendations)
            <ul class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 ">
                @foreach ($recommendations as $recommendation)
                    <li class="rounded-lg shadow-md p-4 transform transition duration-500 hover:scale-105 hover:shadow-xl ease-in-out hover:bg-gray-700">
                        <img src="{{ $recommendation['images']['jpg']['image_url'] }}" alt="{{ $recommendation['title'] }}" class="w-full mb-4 h-62 object-cover">
                        <h2 class="text-xl font-bold mb-2">{{ $recommendation['title'] }}</h2>
                        <a href="{{ $recommendation['url'] }}" target="_blank" class="text-blue-500">Lihat detail</a>
                    </li>
                @endforeach
            </ul>
        @else
            <p class="text-xl">Tidak ada rekomendasi anime yang tersedia.</p>
        @endif
    </div>
@endsection

@section('top')
<div id="top-anime">
    @if ($topAnime)
    <div class="container mx-auto my-8 px-4">
        <h1 class="text-3xl font-bold mb-4">Top Anime</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach ($topAnime as $anime)
                <div class="rounded-lg shadow-md p-4 transform transition duration-500 hover:scale-105 hover:shadow-xl ease-in-out hover:bg-gray-700">
                    <img src="{{ $anime['images']['jpg']['image_url'] }}" alt="{{ $anime['title'] }}" class="w-full h-62 mb-4">
                    <h2 class="text-xl font-bold mb-2">{{ $anime['title'] }}</h2>
                    <p>{{ $anime['type'] }} | {{ $anime['episodes'] }} Episodes</p>
                    <p> Score : {{ $anime['score']}}</p>
                    <a href="{{ route('anime.show', $anime['mal_id']) }}" class="text-blue-500">Lihat detail</a>
                </div>
            @endforeach
        </div>
    </div>
    @endif
</div>
@endsection


