<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class KontenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kontens')->insert([
            [
                'judul' => 'Visi dan Misi',
                'isi' => 'Isi Visi dan Misi',
                'user_id' => '1',
                'menusub_id' => '1',
                'slug' => Str::slug('Visi dan Misi'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'judul' => 'Sejarah dan Lambang',
                'isi' => 'Isi Sejarah',
                'user_id' => '1',
                'menusub_id' => '2',
                'slug' => Str::slug('Sejarah dan Lambang'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'judul' => 'Peta Kampus',
                'isi' => 'Isi Peta Kampus',
                'user_id' => '1',
                'menusub_id' => '3',
                'slug' => Str::slug('Peta Kampus'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'judul' => 'Statistik',
                'isi' => 'Isi Statistik',
                'user_id' => '1',
                'menusub_id' => '4',
                'slug' => Str::slug('Statistik'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'judul' => 'Hymne dan Mars',
                'isi' => 'Isi Hymne dan Mars',
                'user_id' => '1',
                'menusub_id' => '5',
                'slug' => Str::slug('Hymne dan Mars'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'judul' => 'Fakultas',
                'isi' => 'Isi Fakultas',
                'user_id' => '1',
                'menusub_id' => '6',
                'slug' => Str::slug('Fakultas'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'judul' => 'Program Studi',
                'isi' => 'Isi Program Studi',
                'user_id' => '1',
                'menusub_id' => '7',
                'slug' => Str::slug('Program Studi'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'judul' => 'Pascasarjana',
                'isi' => 'ISi Pascasarjana',
                'user_id' => '1',
                'menusub_id' => '8',
                'slug' => Str::slug('Pascasarjana'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'judul' => 'Seleksi Nasional PTKKN',
                'isi' => 'Isi Seleksi Nasional PTKKN',
                'user_id' => '1',
                'menusub_id' => '9',
                'slug' => Str::slug('Seleksi Nasional PTKKN'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'judul' => 'Seleksi Mandiri',
                'isi' => 'Isi Seleksi Mandiri',
                'user_id' => '1',
                'menusub_id' => '10',
                'slug' => Str::slug('Seleksi Mandiri'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ]);
    }
}
