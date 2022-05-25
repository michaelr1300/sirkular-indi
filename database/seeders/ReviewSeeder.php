<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    public function run()
    {
        Review::create([
            'reviewer_name' => '',
            'content' => 'Pengerjaannya sangat rapi',
        ]);
        Review::create([
            'reviewer_name' => '',
            'content' => 'Warnanya sangat bagus dan natural',
        ]);
        Review::create([
            'reviewer_name' => '',
            'content' => 'Proses pengerjaan cepat
            Hasil sangat memuaskan',
        ]);
        Review::create([
            'reviewer_name' => '',
            'content' => 'Hasilnya rapi, sangat memuaskan. Beda dari yang lain',
        ]);
        Review::create([
            'reviewer_name' => '',
            'content' => 'Sangat memuaskan
            Pemilihan warna dan pola nya sangat bagus',
        ]);
        Review::create([
            'reviewer_name' => 'Prof. Dr. Ir. Edia Rahayuningsih, M.S.',
            'content' => 'Proses pengerjaan cepat, hasil memuaskan.
            Bahan pewarna alami tidak membuat alergi atau gatal.',
        ]);
        Review::create([
            'reviewer_name' => 'Chandra Wahyu Purnomo, S.T., M.E., M.Eng., D.Eng.',
            'content' => 'Hasil pengerjaan sangat bagus
            Pola dibatik dengan sangat rapi
            Tidak kalah dengan membeli baju baru',
        ]);
    }
}
