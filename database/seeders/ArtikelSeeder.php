<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ArtikelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('artikels')->insert([
            [
                'judul' => 'Wisuda IAKN Palangka Raya digelar secara daring',
                'isi' => 'Wisuda IAKN Palangka Raya digelar secara daring di Aula IAKN Palangka Raya. Wisuda IAKN Palangka Raya digelar secara daring di Aula IAKN Palangka Raya',
                'user_id' => 1,
                'kategori_id' => 2,
                'slug' => Str::slug('Wisuda IAKN Palangka Raya digelar secara daring'),
                'img' => 'berita1.jpg',
                'img_judul' => 'Mahasiswa sedang mengikuti prosesi Wisuda',
                'img_owner' => 'Humas @iaknpky',
                'dilihat' => 40,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'judul' => 'Syukuran HAB Kemenag ke 75 dan penyerahan Ortaker IAKN Palangka Raya',
                'isi' => 'IAKN Palangka Raya - Direktorat Jenderal Bimbingan Masyarakat (Bimas) Kristen menyelenggarakan acara Syukuran Hari Amal Bakti Kementerian Agama ke-75.',
                'user_id' => 1,
                'kategori_id' => 1,
                'slug' => Str::slug('Syukuran HAB Kemenag ke 75 dan penyerahan Ortaker IAKN Palangka Raya'),
                'img' => 'berita2.jpg',
                'img_judul' => 'Foto Rektor menerima Ortaker',
                'img_owner' => 'Humas @iaknpky',
                'dilihat' => 59,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'judul' => 'Senat Mahasiswa IAKN Palangka Raya serahkan bantuan kepada Mahasiswa asal Papua',
                'isi' => 'IAKN Palangka Raya bersama Senat Mahasiswa menyerahkan bantuan sembako dan alat kesehatan untuk Mahasiswa Papua yang saat ini berkuliah di IAKN Palangka Raya pada Jumat (27/11/2020) pagi.',
                'user_id' => 1,
                'kategori_id' => 3,
                'slug' => Str::slug('Senat Mahasiswa IAKN Palangka Raya serahkan bantuan kepada Mahasiswa asal Papua'),
                'img' => 'berita3.jpg',
                'img_judul' => 'Senat Mahasiswa menyerahkan bantuan',
                'img_owner' => 'Humas @iaknpky',
                'dilihat' => 51,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'judul' => 'Rektor IAKN Palangka Raya Hadiri Serah Terima Jabatan Kemenag Kalteng',
                'isi' => 'Palangka Raya, IAKN- Rektor Institut Agama Kristen Negeri (IAKN) Palangka Raya Telhalia menghadiri acara serah terima jabatan (Sertijab) Kepala kantor Wilayah Kementerian Agama atau Kemenag Provinsi Kalteng.',
                'user_id' => 1,
                'kategori_id' => 1,
                'slug' => Str::slug('Rektor IAKN Palangka Raya Hadiri Serah Terima Jabatan Kemenag Kalteng'),
                'img' => 'berita4.jpg',
                'img_judul' => 'Foto bersama pejabat Kemenag dan Pimpinan PTKKN',
                'img_owner' => 'Humas @iaknpky',
                'dilihat' => 63,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'judul' => 'Jurusan Teologi Kristen Gelar Kegiatan Penyusunan Panduan Perangkat Pengembangan Pembelajaran KKNI',
                'isi' => 'Palangka Raya, Luwansa Hotel – Institut  Agama Kristen Negeri (IAKN) Palangka Raya, mengadakan Kegiatan Penyusunan Panduan Perangkat Pengembangan Pembelajaran Kerangka Kualifikasi Nasional Indonesia (KKNI) Program Studi Teologi Kristen IAKN Palangka Raya Tahun 2020. Hari Sabtu, 21 November 2020, jam 07.30 hingga 16.00 WIB, bertempat di Hotel Luwansa Palangka Raya.',
                'user_id' => 1,
                'kategori_id' => 5,
                'slug' => Str::slug('Jurusan Teologi Kristen Gelar Kegiatan Penyusunan Panduan Perangkat Pengembangan Pembelajaran KKNI'),
                'img' => 'berita5.jpg',
                'img_judul' => 'Foto bersama Pimpinan dan Dosen',
                'img_owner' => 'Humas @iaknpky',
                'dilihat' => 97,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ]);
    }
}
