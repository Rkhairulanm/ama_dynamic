<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KeywordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $keyword = [
            [
                'keyword' => 'Hero Title',
                'page' => 'Beranda',

            ],
            [
                'keyword' => 'Hero Description',
                'page' => 'Beranda',

            ],
            [
                'keyword' => 'House Card Title',
                'page' => 'Beranda',

            ],
            [
                'keyword' => 'House Card Description',
                'page' => 'Beranda',

            ],
            [
                'keyword' => 'LightBlub Card Title',
                'page' => 'Beranda',

            ],
            [
                'keyword' => 'LightBlub Card Description',
                'page' => 'Beranda',

            ],
            [
                'keyword' => 'Gears Card Title',
                'page' => 'Beranda',

            ],
            [
                'keyword' => 'Gears Card Description',
                'page' => 'Beranda',

            ],
        ];
        $keywordTentang = [
            [
                'keyword' => 'AMA Bandung',
                'page' => 'Tentang',

            ],
            [
                'keyword' => 'ASOSIASI MANAJEMEN INDONESIA',
                'page' => 'Tentang',

            ],
            [
                'keyword' => 'AMA-INDONESIA',
                'page' => 'Tentang',

            ],
            [
                'keyword' => '1 Oktober 1989',
                'page' => 'Tentang',

            ],
            [
                'keyword' => 'Jakarta',
                'page' => 'Tentang',

            ],
            [
                'keyword' => 'organisasi masyarakat manajemen Indonesia',
                'page' => 'Tentang',

            ],
        ];

        DB::table('keywords')->insert($keywordTentang);
    }
}
