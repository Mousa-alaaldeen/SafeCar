<?php

namespace Database\Seeders;

use App\Models\Services;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services=
        [ 
        'Car Wash',
        'Oil Change',
        'Tire Replacement',
        'Engine Maintenance',
        'Battery Check',
        'Brake Service'
    ];
        foreach ($services as $service){
            Services::create(['name'=>$service]);
        }
    }
}
