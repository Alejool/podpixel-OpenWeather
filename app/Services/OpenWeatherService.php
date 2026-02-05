<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class OpenWeatherService
{
    private $apiKey;
    private $baseUrl;
    private $city;

    public function __construct()
    {
        $this->apiKey = config('services.openweathermap.api_key');
        $this->baseUrl = config('services.openweathermap.base_url');
        $this->city = config('services.openweathermap.city');
    }


    public function getWeatherData($lat, $lon)
    {
        $apiKey = $this->apiKey;
        $baseUrl = $this->baseUrl;

        $response = Http::get("{$baseUrl}", [
            'lat' => $lat,
            'lon' => $lon,
            'appid' => $apiKey,
            'units' => 'metric',
            'lang' => 'es'
        ]);

        if ($response->failed()) {
            $error = $response->json()['message'] ?? 'Error desconocido en la API de clima';
            throw new \Exception($error);
        }

        return $response->json();
    }
}
