<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Contoh data untuk diisi ke dalam tabel 'content'
        $contents = [
            [
                'content' => 'AMA Bandung',
                'type' => 'Hero Title',
            ],
            [
                'content' => 'Asosiasi Management Indonesia',
                'type' => 'Hero Description',
            ],
            [
                'content' => 'Tentang Kami',
                'type' => 'House Card Title',
            ],
            [
                'content' => 'ASOSIASI MANAJEMEN INDONESIA disingkat AMA-INDONESIA. AMA-INDONESIA berkedudukan di Ibukota Negara dan mendirikan cabang-cabangnya di seluruh wilayah Indonesia dan di Luar Negeri. AMA-INDONESIA didirikan pada tanggal 1 Okto',
                'type' => 'House Card Description',
            ],
            [
                'content' => 'Acara Sebelumnya Seminar AMA Bandung',
                'type' => 'LightBlub Card Title',
            ],
            [
                'content' => 'Kekuatan kunci perusahaan kita untuk untuk terus bertumbuh adalah Pemimpin & Kepemimpinan yang Handal namun tetap memiliki dedikasi yang baik pada perusahaan nya.   AMA Bandung, bekerja sama dengan Dale Carnegie Training, yang memiliki',
                'type' => 'LightBlub Card Description',
            ],
            [
                'content' => 'Hubungi Kami Contact Details',
                'type' => 'Gears Card Title',
            ],
            [
                'content' => 'Office address : Jl. RE. Martadinata No. 93-95 Bandung, West Java-Indonesia Website : ama-bandung.org Email : amabandung456@gmail.com Telp : 089691417135',
                'type' => 'Gears Card Description',
            ],
            [
                'content' => 'AMA Bandung',
                'type' => 'Tentang Title',
            ],
            [
                'content' => 'ASOSIASI MANAJEMEN INDONESIA disingkat AMA-INDONESIA. AMA-INDONESIA berkedudukan di Ibukota Negara dan mendirikan cabang-cabangnya di seluruh wilayah Indonesia dan di Luar Negeri. AMA-INDONESIA didirikan pada tanggal 1 Oktober 1989 di Jakarta, untuk jangka waktu yang tidak ditentukan.',
                'type' => 'Tentang',
            ],
            [
                'content' => 'Menjadi organisasi masyarakat manajemen Indonesia yang terkemuka, profesional dan beretika serta mampu berkompetisi di tingkat global.',
                'type' => 'Visi',
            ],
            [
                'content' => 'Mengembangkan profesionalisme masyarakat manajemen Indonesia melalui peningkatan kompetensi manajemen dan kewirausahaan yang mencakup pengetahuan, ketrampilan dan sikap',
                'type' => 'Misi',
            ],
            [
                'content' => 'Jl. Soekarno Hatta No.456 Batununggal, Kec. Bandung Kidul, Kota Bandung (Kampus Institut Digital Ekonomi LPKIA)',
                'type' => 'Location',
            ],
            [
                'content' => 'amabandung456@gmail.com',
                'type' => 'Email',
            ],
            [   
                'content' => '082115495884',
                'type' => 'Phone',
            ],
            [
                'content' => 'https://web.facebook.com/AMAbandung?_rdc=1&_rdr',
                'type' => 'facebook',
            ],
            [
                'content' => 'https://www.instagram.com/amabandung',
                'type' => 'instagram',
            ],
            // Tambahkan data lain sesuai kebutuhan
        ];

        // Memasukkan data ke dalam tabel 'content'
        DB::table('contents')->insert($contents);
    }
}
