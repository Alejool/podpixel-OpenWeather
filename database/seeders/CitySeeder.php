<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


use App\Models\City;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = [
            [
                'nombre' => 'Bogotá',
                'latitud' => 4.7110,
                'longitud' => -74.0721,
                'imagen' => 'https://images.contentstack.io/v3/assets/blt06f605a34f1194ff/bltece25065ca32d32e/6849c943dd62102313eba0ca/victor-rosario-pk0TD7xmvXE-unsplash-_Header_Mobile.jpg?fit=crop&disable=upscale&auto=webp&quality=60&crop=smart'
            ],
            [
                'nombre' => 'Medellín',
                'latitud' => 6.2442,
                'longitud' => -75.5812,
                'imagen' => 'https://images.contentstack.io/v3/assets/blt06f605a34f1194ff/blt6e4661eb36e506d1/680e26ce77bfb6af094b59dc/iStock-1023022966-_Header_Mobile.jpg?fit=crop&disable=upscale&auto=webp&quality=60&crop=smart'
            ],
            [
                'nombre' => 'Cali',
                'latitud' => 3.4516,
                'longitud' => -76.5320,
                'imagen' => 'https://img2.rtve.es/n/1603280?w=1600'
            ],
            [
                'nombre' => 'Cartagena',
                'latitud' => 10.3910,
                'longitud' => -75.4794,
                'imagen' => 'https://ca-times.brightspotcdn.com/dims4/default/694d0d7/2147483647/strip/false/crop/1515x1000+0+0/resize/1486x981!/quality/75/?url=https%3A%2F%2Fcalifornia-times-brightspot.s3.amazonaws.com%2Fec%2F48%2F75fb9d684e1b9673520e911a8a3c%2Fun-destino-para-gozar-958578.JPG'
            ],
            [
                'nombre' => 'Barranquilla',
                'latitud' => 10.9685,
                'longitud' => -74.7813,
                'imagen' => 'https://content.r9cdn.net/rimg/dimg/e6/f7/f9de243a-city-30628-17260b0f7cb.jpg?width=1366&height=768&xhint=2531&yhint=1900&crop=true'
            ]
        ];

        foreach ($cities as $city) {
            City::create($city);
        }
    }
}
