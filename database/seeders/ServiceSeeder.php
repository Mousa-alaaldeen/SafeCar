<?php
namespace Database\Seeders;

use App\Models\Services;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            ['name' => 'Car Wash', 'price' => 100],
            ['name' => 'Oil Change', 'price' => 150],
            ['name' => 'Tire Replacement', 'price' => 200],
            ['name' => 'Engine Maintenance', 'price' => 300],
            ['name' => 'Battery Check', 'price' => 50],
            ['name' => 'Brake Service', 'price' => 120],
        ];

        foreach ($services as $service) {
            Services::create($service);
        }
    }
}
