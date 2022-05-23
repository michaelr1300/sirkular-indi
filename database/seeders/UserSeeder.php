<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
            'name' => 'Admin Indi',
            'email' => 'admin@mail.com',
            'password' => Hash::make('superadmin'),
            'is_admin' => 1,
            'phone_number' => '123',
            'address' => 'Jogja',
        ]);
        User::create([
            'name' => 'Pembeli',
            'email' => 'pembeli@mail.com',
            'password' => Hash::make('pembeli'),
            'is_admin' => 0,
        ]);
    }
}
