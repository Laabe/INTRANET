<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = [
            'first' => ['Ressources Humaines', 'Human ressources', 'Personeelszaken'],
            'Second' => ['IT', 'IT', 'IT'],
            'Third' => ['Production', 'Production', 'Productie'],
        ];

        foreach ($departments as $department) {
            Department::create([
                'name_fr' => $department[0],
                'name_en' => $department[1],
                'name_de' => $department[2],
            ]);
        }
    }
}
