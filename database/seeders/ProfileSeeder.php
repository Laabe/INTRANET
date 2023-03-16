<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $profiles = [
            'first' => ['Agent', 'Agent', 'Agent'],
            'second' => ['Superviseur', 'Supervisor', 'Leidinggevende'],
            'third' => ['Agent WFM', 'WFM Agent', 'Agent WFM'],
            'Fourth' => ['OPS Manager', 'OPS Manager', 'OPS Manager'],
            "Fifth" => ['Chargé(e) Ressources Humaines', 'Human Resources Officer', 'Personeelsfunctionaris'],
            "sixth" => ['Responsable de département', 'Department manager', 'Afdelingsmanager'],
            "seventh" => ['Responsable de projet', 'Project manager', 'Projectleider'],
        ];

        foreach ($profiles as $profile) {
            Profile::create([
                'name_fr' => $profile[0],
                'name_en' => $profile[1],
                'name_de' => $profile[2],
            ]);
        }
    }
}
