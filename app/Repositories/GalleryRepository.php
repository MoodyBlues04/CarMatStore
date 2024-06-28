<?php

namespace App\Repositories;

use App\Models\Gallery;

class GalleryRepository extends Repository
{
    public function __construct()
    {
        parent::__construct(Gallery::class);
    }
}
