<?php

use Illuminate\Support\Str;

if (!function_exists('getCityImage')) {
    /**
     * url cuando la imagen es guardada en storage
     */
    function getCityImage($image)
    {
        if (!$image) {
            return asset('images/default-city.webp');
        }

        return Str::startsWith($image, 'http') ? $image : asset('storage/' . $image);
    }

}

if (!function_exists('getCityLatLong')) {
    /**
     * fromatear latitud y longitud
     */
    function getCityLatLong($lat, $long)
    {
        return "Lat: " . number_format($lat, 2) . ", Lon: " . number_format($long, 2);
    }
}
