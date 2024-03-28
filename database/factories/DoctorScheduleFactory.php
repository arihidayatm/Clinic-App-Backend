<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DoctorSchedule>
 */
class DoctorScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'doctor_id' => \App\Models\Doctor::all()->random()->id,
            //day [monday, tuesday, wednesday, thursday, friday, saturday, sunday]
            'day' => $this->faker->randomElement(['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday']),
            'start_time' => $this->faker->time(),
            'end_time' => $this->faker->time(),
            'status' => $this->faker->randomElement(['active', 'inactive']),
            'note' => $this->faker->sentence(),

        ];
    }
}
