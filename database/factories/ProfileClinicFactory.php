<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProfileClinic>
 */
class ProfileClinicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            // 'description' => fake()->text(500),
            'address' => fake()->address(),
            'phone' => fake()->phoneNumber(),
            'email' => fake()->safeEmail(),
            'logo' => null,
            'doctor_name' => fake()->name(),
            'clinic_code' => fake()->text(10),
        ];
    }

}
