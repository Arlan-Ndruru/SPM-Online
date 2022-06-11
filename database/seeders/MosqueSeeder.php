<?php

namespace Database\Seeders;

use App\Models\Mosque;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MosqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seeder Mosque
            Mosque::create([
                'name' => 'Masjid Raya Ar-Rahman',
                'slug' => 'masjid-raya-ar-rahman',
                'name_ketua' => 'Prof. Dr. KH. Ilyas Husti, MA',
                'alamat' => 'Jl. Rawamangun No.17A, Tengkerang Labuai, Kec. Bukit Raya, Kota Pekanbaru, Riau 28125',
                'jtMasjid' => 'Masjid Raya',
                'rtMasjid' => '9',
                'rwMasjid' => '9',
                'kecm' => 1,
                'no_hpMasjid' => '76147075',
                'ket' => 'Perlu Informasi Singkron',
            ]);
            Mosque::create([
                'name' => 'Masjid Nurul Iman',
                'slug' => 'Masjid-Nurul-Iman',
                'name_ketua' => 'Perlu Data',
                'alamat' => 'Jl. Hangtuah Ujung No.190, Rejosari, Kec. Tenayan Raya, Kota Pekanbaru, Riau 28112',
                'jtMasjid' => 'Masjid Publik',
                'rtMasjid' => '7',
                'rwMasjid' => '7',
                'kecm' => 2,
                'no_hpMasjid' => '76147075',
                'ket' => 'Perlu Informasi Singkron',
            ]);
            Mosque::create([
                'name' => 'Masjid Raya An-Nur Provinsi Riau',
                'slug' => 'Masjid-Raya-An-Nur-Provinsi-Riau',
                'name_ketua' => 'perlu data',
                'alamat' => 'Jl. Hangtuah Ujung, Sumahilang, Kec. Pekanbaru Kota, Kota Pekanbaru, Riau 28156',
                'jtMasjid' => 'Masjid Raya',
                'rtMasjid' => '3',
                'rwMasjid' => '1',
                'kecm' => 3,
                'no_hpMasjid' => '76147075',
                'ket' => 'Perlu Informasi Singkron',
            ]);
            Mosque::create([
                'name' => 'Masjid Nurul Yaqin',
                'slug' => 'Masjid-Nurul-Yaqin',
                'name_ketua' => 'perlu data',
                'alamat' => ']Jl. Hangtuah Ujung No.2, Rejosari, Kec. Tenayan Raya, Kota Pekanbaru, Riau 28111',
                'jtMasjid' => 'Masjid Publik',
                'rtMasjid' => '3',
                'rwMasjid' => '2',
                'kecm' => 4,
                'no_hpMasjid' => '77316273',
                'ket' => 'Perlu Informasi Singkron',
            ]);
        // End
    }
}
