<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCityRequest extends FormRequest
{
    // reglas de validacion actualizar ciudad
    public function rules(): array
    {
        return [
            'nombre' => 'required|string|max:255|unique:cities,nombre,' . $this->route('city')->id,
            'latitud' => 'required|numeric|between:-90,90',
            'longitud' => 'required|numeric|between:-180,180',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ];
    }
}
