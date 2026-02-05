<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Services\OpenWeatherService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

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

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'nombre' => 'required|string|max:255|unique:cities,nombre',
                'latitud' => 'required|numeric|between:-90,90',
                'longitud' => 'required|numeric|between:-180,180',
                'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
            ]);

            if ($request->hasFile('imagen')) {
                $path = $request->file('imagen')->store('cities', 'public');
                $validated['imagen'] = $path;
            }

            City::create($validated);

            return redirect()->route('cities.index')->with('success', 'Ciudad creada exitosamente.');
        } catch (ValidationException $e) {
            return back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return back()->with('error', 'Error al crear la ciudad: ' . $e->getMessage())->withInput();
        }
    }

    public function edit(City $city)
    {
        return view('cities.edit', compact('city'));
    }

    public function update(Request $request, City $city)
    {
        try {
            $validated = $request->validate([
                'nombre' => 'required|string|max:255|unique:cities,nombre,' . $city->id,
                'latitud' => 'required|numeric|between:-90,90',
                'longitud' => 'required|numeric|between:-180,180',
                'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            ]);

            if ($request->hasFile('imagen')) {
                $path = $request->file('imagen')->store('cities', 'public');
                $validated['imagen'] = $path;
            }

            $city->update($validated);

            return redirect()->route('cities.index')->with('success', 'Ciudad actualizada exitosamente.');
        } catch (ValidationException $e) {
            return back()->withErrors($e->errors())->withInput();
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
