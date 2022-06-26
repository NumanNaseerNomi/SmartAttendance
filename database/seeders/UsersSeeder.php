<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                'name' => 'Admin',
                'userName' => 'admin',
                'about' => 'Admin',
                'cardId' => '00000',
                'password' => Hash::make('admin'),
                'isAdmin' => '1',
                'isBlocked' => '0',
            ]
        );
    }
}
