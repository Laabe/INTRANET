<?php

namespace Database\Seeders;

use App\Models\IdentityDocument;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IdentityDocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $identityDocuments = [
            ["Carte d'identité nationale", "National Identity Card", "Nationale Identiteitskaart"],
            ["Passport", "Passport", "paspoort"],
            ["Carte de séjour", "Residence permit", "verblijfsvergunning"],
        ];

        foreach ($identityDocuments as $document) {
            IdentityDocument::create([
                'name_fr' => $document[0],
                'name_en' => $document[1],
                'name_de' => $document[2],
            ]);
        }
    }
}
