<?php

namespace Database\Seeders;

use App\Models\LeaveType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LeaveTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            ['Paid leave', 'Congé Payé', 'bla bla bla', true],
            ['Non paid leave', 'Congé sans solde', 'bla bla bla', false],
            ['Special leave', 'Congé special', 'bla bla bla', false],
        ];

        foreach ($types as $type) {
            LeaveType::create([
                'name_fr' => $type[1],
                'name_en' => $type[0],
                'name_de' => $type[2],
                'deductable' => $type[3],
            ]);
        }
    }
}
