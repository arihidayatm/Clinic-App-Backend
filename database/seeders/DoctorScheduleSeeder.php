<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DoctorScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //create doctor schedule
        \App\Models\DoctorSchedule::create([
            'doctor_id' => 1,
            'day' => 'monday',
            'start_time' => '09:00:00',
            'end_time' => '17:00:00',
            'status' => 1

        ]);

        //auto generate doctor schedule
        \App\Models\Doctor::all()->each(function ($doctor) {
            \App\Models\DoctorSchedule::factory(10)->create([
                'doctor_id' => $doctor->id
            ]);
        });
    }
}
