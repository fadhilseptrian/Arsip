<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Hapus data sebelumya jika ada (opsional)
        DB::table('users')->truncate();

        // Data pengguna
        DB::table('users')->insert([
            'name' => 'fadhil',
            'role' => '0',
            'email' => 'septrianfadhilfadhilseptrian@gamil.com',
            'email_verified_at' => now(),
            'password' => Hash::make('septrian123'),
            'created_at' => now(),
            'update_at' => now(),
        ]);
        DB::table('users')->insert([
            'name' => 'admin',
            'role' => '1',
            'email' => 'admin@gamil.com',
            'email_verified_at' => now(),
            'password' => Hash::make('user12345'),
            'created_at' => now(),
            'update_at' => now(),
        ]);
        DB::table('users')->insert([
            'name' => 'users',
            'role' => '2',
            'email' => 'admin@gamil.com',
            'email_verified_at' => now(),
            'password' => Hash::make('user12345'),
            'created_at' => now(),
            'update_at' => now(),
        ]);
    }
}
