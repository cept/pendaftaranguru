<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Kriteria;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'nama' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'is_admin' => 1,
        ]);

        Kriteria::create([
            'pendidikan' => 30,
            'ipk' => 25,
            'pengalaman_kerja' => 30,
            'usia' => 15,
        ]);
        
    }
}
