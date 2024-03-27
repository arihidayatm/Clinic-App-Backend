<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //otomatis tambah dummy data
        \App\Models\User::factory(5)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        //manual tambah data user
        \App\Models\User::factory()->create([
            'name' => 'Admin User',
            'email' => 'mah@fic15.com',
            'role' => 'admin',
            'password' => Hash::make('123456'),
            'phone' => '085274149119',
        ]);

        //manual tambah data profile clinic
        \App\Models\ProfileClinic::factory()->create([
            'name' => 'MAH CLINIC',
            'address' => 'Jalan Kesehatan adalah keinginan kita semua',
            'phone' => '085274149119',
            'email' => 'muhamadarihidayat@gmail.com',
            'doctor_name' => 'Muhamad Ari Hidayat',
            'clinic_code' => ('280789'),
        ]);

        //call
        $this->call([
            DoctorSeeder::class,
        ]);
    }
}
