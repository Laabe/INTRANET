<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $genders = $this->call(GenderSeeder::class);
        $languages = $this->call(LanguageSeeder::class);
        $languageLevels = $this->call(LanguageLevelSeeder::class);
        $identityDocuments = $this->call(IdentityDocumentSeeder::class);
        $maritalStatuses = $this->call(MaritalStatusSeeder::class);
        $profiles = $this->call(ProfileSeeder::class);
        $departments = $this->call(DepartmentSeeder::class);
        $sourcing = $this->call(SourcingTypeSeeder::class);
        $platforms = $this->call(RecrutmentPlatformeSeeder::class);
        $users = $this->call(UserSeeder::class);
    }
}
