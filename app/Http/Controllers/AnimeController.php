<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class AnimeController extends Controller
{
    public function index()
    {
        $recommendations = $this->getRecommendations();
        $topAnime = $this->getTopAnime();
        $seasonalAnime = $this->getSeasonalAnime(date('Y'), 'spring'); // untuk musim semi tahun ini

        return view('index', [
            'recommendations' => $recommendations,
            'topAnime' => $topAnime,
            'seasonalAnime' => $seasonalAnime
        ]);
    }



    private function getSeasonalAnime($year, $season)
    {
        $client = new Client();
        $baseUrl = config('services.jikan.base_url');
        $url = "{$baseUrl}/seasons/{$year}/{$season}";

        try {
            $response = $client->request('GET', $url);
            $statusCode = $response->getStatusCode();
            $data = json_decode($response->getBody(), true);

            if ($statusCode == 200) {
                // Ambil hanya 8 potong data anime musiman
                $seasonalAnime = array_slice($data['data'], 0, 12);
                return $seasonalAnime;
            } else {
                return [];
            }
        } catch (\Exception $e) {
            return [];
        }
    }


    private function getRecommendations()
    {
        $client = new Client();
        $baseUrl = config('services.jikan.base_url');
        $randomAnimeId = rand(1, 1000);
        $url = "{$baseUrl}/anime/{$randomAnimeId}/recommendations";

        try {
            $response = $client->request('GET', $url);
            $statusCode = $response->getStatusCode();
            $data = json_decode($response->getBody(), true);

            if ($statusCode == 200) {
                $recommendations = array_slice($data['data'], 0, 4);
                $recommendations = array_map(function ($item) {
                    return $item['entry'];
                }, $recommendations);
                return $recommendations;
            } else {
                return [];
            }
        } catch (\Exception $e) {
            return [];
        }
    }

    private function getTopAnime()
    {
        $client = new Client();
        $baseUrl = config('services.jikan.base_url');
        $url = "{$baseUrl}/top/anime";

        try {
            $response = $client->request('GET', $url);
            $statusCode = $response->getStatusCode();
            $data = json_decode($response->getBody(), true);

            if ($statusCode == 200) {
                // Ambil hanya 8 potong data top anime
                $topAnime = array_slice($data['data'], 0, 4);
                return $topAnime;
            } else {
                return [];
            }
        } catch (\Exception $e) {
            return [];
        }
    }
    public function show($id)
    {
        $client = new Client();
        $baseUrl = config('services.jikan.base_url');
        $url = "{$baseUrl}/anime/{$id}";

        try {
            $response = $client->request('GET', $url);
            $statusCode = $response->getStatusCode();
            $data = json_decode($response->getBody(), true);

            if ($statusCode == 200) {
                $anime = $data['data'];
                return view('anime.show', ['anime' => $anime]);
            } else {
                return response()->json(['error' => 'API tidak memberikan respon yang diharapkan'], $statusCode);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Terjadi kesalahan saat memanggil API: ' . $e->getMessage()], 500);
        }
    }


}

