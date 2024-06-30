<?php

namespace Database\Seeders;

use App\Repositories\ColorRepository;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    public function __construct(private readonly ColorRepository $colorRepository)
    {
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        echo 'not done yet';
    }
}
