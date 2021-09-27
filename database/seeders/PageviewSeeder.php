<?php

namespace Database\Seeders;

use App\Models\Artikel;
use App\Models\Konten;
use App\Models\Pageview;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class PageviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // boosting viewer beranda dan list artikel page
        Pageview::factory()->count(7812)->create(); // beranda viewer
        Pageview::factory()->count(818)->create([
            'page' => 'Artikel'
        ]); // list artikel viewer

        // konten viewer
        $konten_id = []; // membuat array kosong
        $jmlhKonten = Konten::all()->count(); // jumlah record konten
        // $rangeViewer = rand(10,40); // (rand(min,max))
        $min = 80;
        $max = 150;
        for ($i = 1; $i <= $jmlhKonten; $i++) {
            $konten_id[] = 'id_konten_'.$i;
        } // membuat array sesuai jumlah record untuk dimasukan ke kolom page T_pageviews
        for ($x = 0; $x < $jmlhKonten; $x++) {
            Pageview::factory()->count(rand($min,$max))->create([
                'page' => $konten_id[$x],
            ]);
        }

        // booster artikel viewer
        $artikel_id = []; // membuat array kosong
        $jmlhArtikel = Artikel::all()->count(); // jumlah record artikel
        // $rangeViewer = rand(10,40); // (rand(min,max))
        $min = 150;
        $max = 200;
        for ($i = 1; $i <= $jmlhArtikel; $i++) {
            $artikel_id[] = 'id_artikel_'.$i;
        } // membuat array sesuai jumlah record untuk dimasukan ke kolom page T_pageviews
        for ($x = 0; $x < $jmlhArtikel; $x++) {
            Pageview::factory()->count(rand($min,$max))->create([
                'page' => $artikel_id[$x],
            ]);
        }

        
    }
}
