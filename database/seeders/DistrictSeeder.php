<?php

namespace Database\Seeders;

use App\Models\District;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seeder Districts
            District::create([
                'name' => 'Bandar Raya',
                'slug' => 'bandar-raya',
                'kota' => 'Kota Pekanbaru',
                'ket' => 'Kecamatan Daerah Kota Pekanbaru',
            ]);
        // End
        // Seeder Districts
            District::create([
                'name' => 'Tampan',
                'slug' => 'tampan',
                'kota' => 'Kota Pekanbaru',
                'ket' => 'Kecamatan Daerah Kota Pekanbaru',
            ]);
        // End
        // Seeder Districts
            District::create([
                'name' => 'Tenayan Raya',
                'slug' => 'tenatan-raya',
                'kota' => 'Kota Pekanbaru',
                'ket' => 'Kecamatan Daerah Kota Pekanbaru',
            ]);
        // End
        // Seeder Districts
            District::create([
                'name' => 'Payung Sekaki',
                'slug' => 'payung-sekaki',
                'kota' => 'Kota Pekanbaru',
                'ket' => 'Kecamatan Daerah Kota Pekanbaru',
            ]);
        // End
    }
}
