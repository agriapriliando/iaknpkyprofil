<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'role' => 'admin',
                'name' => 'Administrator',
                'email' => 'admin@iaknpky.ac.id',
                'password' => Hash::make('admin'),
            ],
            [
                'role' => 'editor',
                'name' => 'Editor',
                'email' => 'editor@iaknpky.ac.id',
                'password' => Hash::make('editor'),
            ]
        ]);
    }
}
