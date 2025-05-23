<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'username'=>'jpgerber',
            'email'=>'jordangerber@gmail.com',
            'pseudonym'=>'JP',
            'password'=>Hash::make('jordan') // Temporary for debugging
        ]);
    }
}
