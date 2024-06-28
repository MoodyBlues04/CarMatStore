<?php

namespace Database\Seeders;

use App\Repositories\ArticleRepository;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    public function __construct(private readonly ArticleRepository $articleRepository)
    {
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $defaultArticles = [
            [
                'title' => 'ПОШИВ ДЛЯ ЛЮБОГО АВТО',
                'content' => 'Большой выбор цвета и окантовки',
            ],
            [
                'title' => 'ДОСТАВКА ПО УЗБЕКИСТАНУ',
                'content' => 'Доставим в удобное для вас место',
            ],
            [
                'title' => 'ГАРАНТИЯ КАЧЕСТВА',
                'content' => 'Гарантия 1 год',
            ],
        ];

        foreach ($defaultArticles as $articleData) {
            if (!$this->articleRepository->exists($articleData)) {
                $this->articleRepository->create($articleData);
            }
        }
    }
}
