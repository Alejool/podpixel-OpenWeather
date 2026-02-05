<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCityRequest extends FormRequest
{
    // reglas de validacion crear ciudad
    public function rules(): array
    {
        return [
            'nombre' => 'required|string|max:255|unique:cities,nombre',
            'latitud' => 'required|numeric|between:-90,90',
            'longitud' => 'required|numeric|between:-180,180',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
        ];
    }
}
