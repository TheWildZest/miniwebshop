<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //Create 'Admin' user
        DB::table('users')->insert([
            'name' => 'Pepita',
            'email' => 'pepita@pepita.hu',
            'password' => Hash::make('pepita'),
            'is_admin' => true,
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        //Create 'non-admin' users
        DB::table('users')->insert([
            [
                'name' => 'test',
                'email' => 'test@test',
                'password' => Hash::make('test'),
                'is_admin' => false,
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'test1',
                'email' => 'test1@test1',
                'password' => Hash::make('test1'),
                'is_admin' => false,
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);

        User::factory(30)->create();
    }
}
