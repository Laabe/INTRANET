<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $languages = [
            'first' => ['French', 'Français', 'Frans'],
            'second' => ['English', 'Anglais', 'Engels'],
            'third' => ['Dutch', 'Néerlandais', 'Nederlandse']
        ];

        foreach ($languages as $language) {
            Language::create([
                'name_en' => $language[0],
                'name_fr' => $language[1],
                'name_de' => $language[2],
            ]);
        }
    }
}
