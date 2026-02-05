<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Services\OpenWeatherService;
use App\Http\Requests\StoreCityRequest;
use App\Http\Requests\UpdateCityRequest;

class CityController extends Controller
{
    protected $weatherService;

    public function __construct(OpenWeatherService $weatherService)
    {
        $this->weatherService = $weatherService;
    }

    public function index()
    {
        $cities = City::all();
        return view('cities.index', compact('cities'));
    }

    public function create()
    {
        return view('cities.create');
    }

    public function store(StoreCityRequest $request)
    {
        try {
            $validated = $request->validated();

            if ($request->hasFile('imagen')) {
                $path = $request->file('imagen')->store('cities', 'public');
                $validated['imagen'] = $path;
            }

            City::create($validated);

            return redirect()->route('cities.index')->with('success', 'Ciudad creada exitosamente.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error al crear la ciudad: ' . $e->getMessage())->withInput();
        }
    }

    public function edit(City $city)
    {
        return view('cities.edit', compact('city'));
    }

    public function update(UpdateCityRequest $request, City $city)
    {
        try {
            $validated = $request->validated();

            if ($request->hasFile('imagen')) {
                $path = $request->file('imagen')->store('cities', 'public');
                $validated['imagen'] = $path;
            }

            $city->update($validated);

            return redirect()->route('cities.index')->with('success', 'Ciudad actualizada exitosamente.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error al actualizar la ciudad: ' . $e->getMessage())->withInput();
        }
    }

    public function getWeather(City $city)
    {
        try {
            $weatherData = $this->weatherService->getWeatherData($city->latitud, $city->longitud);
            return response()->json($weatherData);
        } catch (\Exception $e) {
            return response()->json([
                'error' => true,
                'message' => 'Error de la API: ' . $e->getMessage()
            ], 500);
        }
    }
}
