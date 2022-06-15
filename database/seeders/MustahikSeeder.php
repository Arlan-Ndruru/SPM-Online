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
                'no_hpM' => 6281371237612,
                'surat_pengantar' => 'null',
                'f_foto' => 'null',
                'f_kk' => 'null',
                'f_ktp' => 'null',
                'masjid' => '1',
                'ket' => 1,
                    // belum verifikasi 1
                    // sudah verifikasi 2
                    // sudah survei 3
                    // Tolak 4
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
                'no_hpM' => 62899123781871,
                'surat_pengantar' => 'null',
                'f_foto' => 'null',
                'f_kk' => 'null',
                'f_ktp' => 'null',
                'masjid' => '1',
                'ket' => 2,
                    // belum verifikasi 1
                    // sudah verifikasi 2
                    // sudah survei 3
                    // Tolak 4
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
                'no_hpM' => 6297256239479,
                'surat_pengantar' => 'null',
                'f_foto' => 'null',
                'f_kk' => 'null',
                'f_ktp' => 'null',
                'masjid' => '1',
                'ket' => 3,
                    // belum verifikasi 1
                    // sudah verifikasi 2
                    // sudah survei 3
                    // Tolak 4
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
                'no_hpM' => 6266102391829123,
                'surat_pengantar' => 'null',
                'f_foto' => 'null',
                'f_kk' => 'null',
                'f_ktp' => 'null',
                'masjid' => '1',
                'ket' => 4,
                    // belum verifikasi 1
                    // sudah verifikasi 2
                    // sudah survei 3
                    // Tolak 4
                'created_by' => '1',
            ]);
        //
    }
}
