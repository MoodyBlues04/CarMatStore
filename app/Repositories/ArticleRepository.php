<?php

namespace App\Repositories;

use App\Models\Article;

class ArticleRepository extends Repository
{
    public function __construct()
    {
        parent::__construct(Article::class);
    }
}
