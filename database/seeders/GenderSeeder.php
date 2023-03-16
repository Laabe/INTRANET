<?php

namespace Database\Seeders;

use App\Models\Gender;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genders = [
            '+' => ['Homme', 'Male', 'mannelijk'],
            '-' => ['Femme', 'Female', 'vrouwelijk'],
        ];

        foreach ($genders as $gender) {
            Gender::create([
                'name_fr' => $gender[0],
                'name_en' => $gender[1],
                'name_de' => $gender[2],
            ]);
        }
    }
}
