<?php

namespace Database\Seeders;

use App\Models\RecrutmentPlatforme;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RecrutmentPlatformeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $recrutmentPlatforms = ['ANAPC', 'Adecco', 'Manpower', 'Marocannonces', 'LinkedIn', 'Indeed',];

        foreach ($recrutmentPlatforms as $platforme) {
            RecrutmentPlatforme::create([
                'name' => $platforme,
            ]);
        }
    }
}
