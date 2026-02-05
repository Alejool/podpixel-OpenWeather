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


    public function getWeatherData()
    {
       
    }
}
