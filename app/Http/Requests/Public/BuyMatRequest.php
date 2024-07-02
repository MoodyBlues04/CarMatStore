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
            'tariff' => 'required|string|' . Rule::exists('mat_tariffs', 'name'),
            'material' => 'required|string', // name
            'accessory' => 'required|array',
            'places' => 'required|array', // names
            'emblem' => 'nullable|string',
            'color' => 'nullable|string',
            'border_color' => 'nullable|string',

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
