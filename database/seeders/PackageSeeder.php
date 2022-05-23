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
            'name' => 'Celup',
            'price' => 50000,
            'description' => 'Celup pakaian dengan pewarna alami dari Indi. Cocok untuk pakaian berwarna cerah. Warna yang tersedia: Biru, Merah, Hijau.',
        ]);
        Package::create([
            'name' => 'Ikat',
            'price' => 75000,
            'description' => 'Pakaian diikat kemudian dicelup dengan pewarna alami. Memunculkan pola-pola batik ikat yang indah.',
        ]);
        Package::create([
            'name' => 'Batik Ulang',
            'price' => 200000,
            'description' => 'Pakaian dibatik ulang menggunakan pewarna alami Indi. Tuliskan pola/motif dan warna yang diinginkan pada kolom keterangan saat memesan.',
        ]);
    }
}
