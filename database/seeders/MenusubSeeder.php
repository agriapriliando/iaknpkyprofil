<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MenusubSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menusubs')->insert([
            [
                'menu_id' => '2',
                'judul' => 'Visi dan Misi',
                'menusublink' => Str::slug('Visi dan Misi'),
                // submenu 1
            ],
            [
                'menu_id' => '2',
                'judul' => 'Sejarah dan Lambang',
                'menusublink' => Str::slug('Sejarah dan Lambang'),
                // submenu 2
            ],
            [
                'menu_id' => '2',
                'judul' => 'Peta Kampus',
                'menusublink' => Str::slug('Peta Kampus'),
                // submenu 3
            ],
            [
                'menu_id' => '2',
                'judul' => 'Statistik',
                'menusublink' => Str::slug('Statistik'),
                // submenu 4
            ],
            [
                'menu_id' => '2',
                'judul' => 'Hymne dan Mars',
                'menusublink' => Str::slug('Hymne dan Mars'),
                // submenu 5
            ],
            [
                'menu_id' => '3',
                'judul' => 'Fakultas',
                'menusublink' => Str::slug('Fakultas'),
                // submenu 6
            ],
            [
                'menu_id' => '3',
                'judul' => 'Program Studi',
                'menusublink' => Str::slug('Program Studi'),
                // submenu 7
            ],
            [
                'menu_id' => '3',
                'judul' => 'Pascasarjana',
                'menusublink' => Str::slug('Pascasarjana'),
                // submenu 8
            ],
            [
                'menu_id' => '5',
                'judul' => 'Seleksi Nasional PTKKN',
                'menusublink' => Str::slug('Seleksi Nasional PTKKN'),
                // submenu 9
            ],
            [
                'menu_id' => '5',
                'judul' => 'Seleksi Mandiri',
                'menusublink' => Str::slug('Seleksi Mandiri'),
                // submenu 10
            ]

        ]);
    }
}
