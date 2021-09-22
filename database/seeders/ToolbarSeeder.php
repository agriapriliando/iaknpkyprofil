<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ToolbarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('toolbars')->insert([
            [
                'jenis' => 'email',
                'isi' => 'stakn.palangkaraya2010@gmail.com',
            ],
            [
                'jenis' => 'alamat',
                'isi' => 'Jalan Tampung Penyang RTA Milono Km. 6, Palangka Raya, 73112',
            ],
            [
                'jenis' => 'facebook',
                'isi' => 'https://www.facebook.com/iaknpky',
            ],
            [
                'jenis' => 'instagram',
                'isi' => 'https://www.instagram.com/humas_iaknpky/',
            ],
            [
                'jenis' => 'twitter',
                'isi' => 'https://twitter.com/iaknpky',
            ],
            [
                'jenis' => 'youtube',
                'isi' => 'https://www.youtube.com/channel/UCHrYeHQTokJMAGzp_SDws1Q',
            ]
        ]);
    }
}
