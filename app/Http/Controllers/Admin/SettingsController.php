<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Settings\UpdateRequest;
use App\Models\Settings;
use App\Repositories\SettingsRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class SettingsController extends Controller
{
    public function __construct(private readonly SettingsRepository $settingsRepository)
    {
        $this->middleware('admin');
    }

    public function index(): View|string
    {
        $settings = $this->settingsRepository->getNotHidden();
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Settings $settings, UpdateRequest $request): \Illuminate\Http\RedirectResponse
    {
        if (!$this->settingsRepository->updateFromRequest($request, $settings)) {
            throw new \Exception('Cannot update setting');
        }
        return redirect()->route('admin.settings.index')->with('success', 'updated');
    }
}
