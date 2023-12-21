<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Tambahkan data dummy ke tabel users
        DB::table('users')->insert([
            'name' => 'Samara',
            'username' => 'Sap-Samara',
            'email' => 'Samara@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('Samara123'), // Anda dapat mengganti 'password123' dengan password yang diinginkan
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Tambahkan data dummy lainnya jika diperlukan
    }
}
