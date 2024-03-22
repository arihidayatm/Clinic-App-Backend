<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doctor>
 */
class DoctorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'doctor_name' => fake()->name(),
            'doctor_birthday' => fake()->date(),
            'doctor_email' => fake()->safeEmail(),
            'doctor_phone' => fake()->phoneNumber(),
            'doctor_address' => fake()->address(),
            'doctor_sip' => fake()->numberBetween(1000, 9999),
            'doctor_specialist' => fake()->word(),
            'doctor_photo' => fake()->imageUrl(640, 480),
        ];
    }
}
