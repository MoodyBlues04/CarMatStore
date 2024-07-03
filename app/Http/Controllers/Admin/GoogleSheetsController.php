<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use App\Services\GoogleSheetsService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class GoogleSheetsController extends Controller
{
    public function __construct(private readonly GoogleSheetsService $googleSheetsService)
    {
        $this->middleware('admin');
    }

    public function loadSheetsData(): RedirectResponse
    {
        $this->googleSheetsService->loadMatsFromSheet(Settings::get(Settings::GSHEETS_ID));
        return redirect()->route('admin.index');
    }
}
