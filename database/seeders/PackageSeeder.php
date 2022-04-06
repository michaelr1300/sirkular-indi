<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Package::create([
            'name' => 'Package 1',
            'price' => 100000,
            'description' => 'Lorem Ipsum dolor sit amet',
        ]);
        Package::create([
            'name' => 'Package 2',
            'price' => 200000,
            'description' => 'Lorem Ipsum dolor sit amet',
        ]);
    }
}
