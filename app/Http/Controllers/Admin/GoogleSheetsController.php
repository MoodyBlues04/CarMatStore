<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GoogleSheetsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function loadSheetsData(): void
    {
//        TODO
        echo 'not implemented yet';
    }
}
