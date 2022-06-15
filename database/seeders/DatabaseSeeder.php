<?php

namespace Database\Seeders;

use App\Models\District;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        
        $this->call(LaratrustSeeder::class);
        
        $this->call(DistrictSeeder::class);
        
        $this->call(MosqueSeeder::class);

        $this->call(MustahikSeeder::class);


        //Seeder Users
            $user = User::create([
                'unique_number' => '11950111676',
                'name' => 'Arlan',
                'email' => '11950111676@students.uin-suska.ac.id',
                'password' => bcrypt('123123123'),
                'no_hp' => '6281371469331',
                'status' => 1,
            ]);
            $role = 1;
            $user->attachRole($role);
        //
        //Seeder Users
            $user = User::create([
                'unique_number' => '1471100607660001',
                'name' => 'H. Endar Muda, S.H., M.H.',
                'email' => 'hj.endarmuda@gmail.com',
                'password' => bcrypt('123123123'),
                'no_hp' => '6281537409778',
                'status' => 1,
            ]);
            $role = 2;
            $user->attachRole($role);
        //
        //Seeder Users
            $user = User::create([
                'unique_number' => '1482347642348765',
                'name' => 'Dika',
                'email' => 'dika@gmail.com',
                'password' => bcrypt('123123123'),
                'no_hp' => '6248374239',
                'status' => 1,
            ]);
            $role = 4;
            $user->attachRole($role);
        //
        //Seeder Users
            $user = User::create([
                'unique_number' => '1847345788762137',
                'name' => 'Azmi',
                'email' => 'azmi@gmail.com',
                'password' => bcrypt('123123123'),
                'no_hp' => '628247327867',
                'status' => 1,
            ]);
            $role = 3;
            $user->attachRole($role);
        //
        //Seeder Users
            $user = User::create([
                'unique_number' => '1762239487296792',
                'name' => 'Bu Yulfiazartu',
                'email' => 'yulfiazartu@gmail.com',
                'password' => bcrypt('123123123'),
                'no_hp' => '628345823666',
                'status' => 1,
            ]);
            $role = 5;
            $user->attachRole($role);
        //
    }
}
