<?php

namespace Database\Factories;

use App\Models\Gender;
use App\Models\IdentityDocument;
use App\Models\Language;
use App\Models\LanguageLevel;
use App\Models\MaritalStatus;
use App\Models\Profile;
use App\Models\RecrutmentPlatforme;
use App\Models\SourcingType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'phone' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'date_of_birth' => fake()->date(),
            'integration_date' => fake()->date(),
            'recrutment_platforme_id' => RecrutmentPlatforme::all()->random(),
            'sourcing_type_id' => SourcingType::all()->random(),
            'gender_id' => Gender::all()->random(),
            'identity_document_id' => IdentityDocument::all()->random(),
            'language_id' => Language::all()->random(),
            'language_level_id' => LanguageLevel::all()->random(),
            'marital_status_id' => MaritalStatus::all()->random(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'profile_id' => Profile::all()->random(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
