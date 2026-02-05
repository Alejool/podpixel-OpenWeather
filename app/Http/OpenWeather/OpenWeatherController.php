<?php
namespace App\Http\OpenWeather;

class OpenWeatherController
{
    private $openWeatherService;
    public function __construct($openWeatherService)
    {
        $this->openWeatherService = $openWeatherService;
    }
    public function index()
    {
        $weatherData = $this->openWeatherService->getWeatherData();
        return view('open-weather.index', compact('weatherData'));
    }
}
