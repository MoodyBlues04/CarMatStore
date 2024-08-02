<?php

namespace App\Http\Requests\Public;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BuyMatRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'saloon.tariff' => 'required|string|' . Rule::exists('mat_tariffs', 'name'),
            'saloon.material' => 'required|string', // name
            'saloon.accessory' => 'required|array',
            'saloon.places' => 'required|array', // names
            'saloon.emblem' => 'nullable|string',
            'saloon.color' => 'nullable|string',
            'saloon.border_color' => 'nullable|string',
            'bag.tariff' => 'nullable|string|' . Rule::exists('mat_tariffs', 'name'),
            'bag.material' => 'nullable|string', // name
            'bag.accessory' => 'nullable|array',
            'bag.places' => 'nullable|array', // names
            'bag.emblem' => 'nullable|string',
            'bag.color' => 'nullable|string',
            'bag.border_color' => 'nullable|string',

            'delivery' => 'required',
            'delivery.type' => 'required|string|' . Rule::in(['delivery', 'self_delivery']),
            'delivery.where' => 'nullable|string',

            'client_data' => 'required',
            'client_data.name' => 'required|string',
            'client_data.surname' => 'required|string',
            'client_data.phone' => 'required|string',
            'client_data.email' => 'required|email',
            'client_data.address' => 'required|string',
            'client_data.geo' => 'nullable|string',
            'client_data.comment' => 'nullable|string',
        ];
    }
}
