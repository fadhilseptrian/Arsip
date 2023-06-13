<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Userseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            'name' => 'fadhil',
            'role' => '0',
            'email' => 'septrianfadhilfadhilseptrian@gamil.com',
            'password' => bcrypt('septrian123')

        ];
         foreach($user as $user){
            surat::create($user);
         }

    }
}
 