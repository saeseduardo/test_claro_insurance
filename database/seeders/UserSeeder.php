<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => "Administrador del sistema",
            'email' => "admin@admin.com",
            'password' => bcrypt('administrador'),
            'identification_card' => '18308112',
            'date_of_birth' => '1986-01-28',
            'city_code' => '0',
        ])->assignRole($roleAdmin);
    }
}
