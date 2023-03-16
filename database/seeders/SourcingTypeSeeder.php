<?php

namespace Database\Seeders;

use App\Models\SourcingType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SourcingTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sourcingTypes = [
            'first' => ['Sourcing gratuit', 'Free sourcing', 'Gratis sourcing'],
            'second' => ['Sourcing payant', 'Paid sourcing', 'Betaalde sourcing'],
        ];

        foreach ($sourcingTypes as $type) {
            SourcingType::create([
                'name_fr' => $type[0],
                'name_en' => $type[1],
                'name_de' => $type[2],
            ]);
        }
    }
}
