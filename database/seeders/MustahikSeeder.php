<?php

namespace Database\Seeders;

use App\Models\Mustahik;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MustahikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seeder Mustahik
            Mustahik::create([
                'unique_number' => '9887812674231234',
                'name' => 'RIDO RIVALDO',
                'slug' => 'rido-rivaldo',
                'tl' => '2002-12-12',
                't_lahir' => 'Pekanbaru',
                'alamat' => 'Jalan Sekutum',
                'no_hpM' => '081371237612',
                'surat_pengantar' => '',
                'f_kk' => '',
                'f_ktp' => '',
                'masjid' => '1',
                'ket' => 'b-v',
                    // belum verifikasi
                    // sudah verifikasi
                    // belum survei
                    // sudah survei
                    // selesai
                'created_by' => '1',
            ]);
        //
        // Seeder Mustahik
            Mustahik::create([
                'unique_number' => '782342348676776',
                'name' => 'Togi Pratama',
                'slug' => 'togi-pratama',
                'tl' => '2002-12-12',
                't_lahir' => 'Pekanbaru',
                'alamat' => 'Jalan Melati 2',
                'no_hpM' => '0899123781871',
                'surat_pengantar' => '',
                'f_kk' => '',
                'f_ktp' => '',
                'masjid' => '1',
                'ket' => 'v',
                    // belum verifikasi   bv
                    // sudah verifikasi   v
                    // sudah survei       s
                    // tolak              t
                'created_by' => '1',
            ]);
        //
        // Seeder Mustahik
            Mustahik::create([
                'unique_number' => '24324234234',
                'name' => 'Yeha Liman',
                'slug' => 'Yeha-Liman',
                'tl' => '2002-12-12',
                't_lahir' => 'Pekanbaru',
                'alamat' => 'Jalan Sempit',
                'no_hpM' => '897256239479',
                'surat_pengantar' => '',
                'f_kk' => '',
                'f_ktp' => '',
                'masjid' => '1',
                'ket' => 't',
                    // belum verifikasi
                    // sudah verifikasi
                    // belum survei
                    // sudah survei
                    // selesai
                'created_by' => '1',
            ]);
        //
        // Seeder Mustahik
            Mustahik::create([
                'unique_number' => '12312312312312311',
                'name' => 'Jajar Setiawan',
                'slug' => 'jajar-setiawan',
                'tl' => '2002-12-12',
                't_lahir' => 'Pekanbaru',
                'alamat' => 'Jalan Mawar',
                'no_hpM' => '766102391829123',
                'surat_pengantar' => '',
                'f_kk' => '',
                'f_ktp' => '',
                'masjid' => '1',
                'ket' => 's',
                    // belum verifikasi
                    // sudah verifikasi
                    // belum survei
                    // sudah survei
                    // selesai
                'created_by' => '1',
            ]);
        //
    }
}
