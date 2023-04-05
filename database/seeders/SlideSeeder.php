<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SlideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('slides')->insert([
            [
                'nameimg' => "slide7.jpg",
                'urutan' => 7,
            ],
            [
                'nameimg' => "slide8.jpg",
                'urutan' => 8,
            ],
            [
                'nameimg' => "slide9.jpg",
                'urutan' => 9,
            ],
            [
                'nameimg' => "slide10.jpg",
                'urutan' => 10,
            ],
        ]);
    }
}
