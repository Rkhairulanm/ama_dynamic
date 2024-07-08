<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LokasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = [
            ['name' => 'Aceh'],
            ['name' => 'Sumatera Utara'],
            ['name' => 'Sumatera Barat'],
            ['name' => 'Riau'],
            ['name' => 'Jambi'],
            ['name' => 'Sumatera Selatan'],
            ['name' => 'Bengkulu'],
            ['name' => 'Lampung'],
            ['name' => 'Kepulauan Bangka Belitung'],
            ['name' => 'Kepulauan Riau'],
            ['name' => 'DKI Jakarta'],
            ['name' => 'Jawa Barat'],
            ['name' => 'Jawa Tengah'],
            ['name' => 'DI Yogyakarta'],
            ['name' => 'Jawa Timur'],
            ['name' => 'Banten'],
            ['name' => 'Bali'],
            ['name' => 'Nusa Tenggara Barat'],
            ['name' => 'Nusa Tenggara Timur'],
            ['name' => 'Kalimantan Barat'],
            ['name' => 'Kalimantan Tengah'],
            ['name' => 'Kalimantan Selatan'],
            ['name' => 'Kalimantan Timur'],
            ['name' => 'Sulawesi Utara'],
            ['name' => 'Sulawesi Tengah'],
            ['name' => 'Sulawesi Selatan'],
            ['name' => 'Sulawesi Tenggara'],
            ['name' => 'Gorontalo'],
            ['name' => 'Sulawesi Barat'],
            ['name' => 'Maluku'],
            ['name' => 'Maluku Utara'],
            ['name' => 'Papua Barat'],
            ['name' => 'Papua']
        ];



        DB::table('lokasis')->insert($cities);
    }
}