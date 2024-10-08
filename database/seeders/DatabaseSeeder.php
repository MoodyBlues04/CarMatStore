<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AdminSeeder::class,
            SettingsSeeder::class,
            ArticleSeeder::class,
            GallerySeeder::class,
            BrandSeeder::class,
            MatTariffSeeder::class,
            MatMaterialSeeder::class,
            ColorSeeder::class,
            AccessorySeeder::class,
            EmblemSeeder::class,
            TemplateInfoSeeder::class,
            MatImageSeeder::class,
        ]);
    }
}
