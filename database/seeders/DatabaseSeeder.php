<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            ToolbarSeeder::class,
            MenuSeeder::class,
            MenusubSeeder::class,
            KontenSeeder::class,
            KategoriSeeder::class,
            ArtikelSeeder::class,
        ]);
    }
}
