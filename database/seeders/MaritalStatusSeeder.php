<?php

namespace Database\Seeders;

use App\Models\MaritalStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MaritalStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $maritalStatuses = [
            'first' => ['Marié(e)', 'Married', 'Getrouwd'],
            'second' => ['Célibataire', 'Single', 'single'],
            'third' => ['divorcé(e)', 'Divorced', 'scheiding'],
        ];

        foreach ($maritalStatuses as $status) {
            MaritalStatus::create([
                'name_fr' => $status[0],
                'name_en' => $status[1],
                'name_de' => $status[2],
            ]);
        }
    }
}
