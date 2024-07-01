<?php

namespace App\Http\Requests\Public;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CalcMatPriceRequest extends FormRequest
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
            'material' => 'required|string',
            'accessory' => 'required|array',
            'places' => 'required|array',
            'emblem' => 'nullable|string',
            'color' => 'nullable|string',
            'border_color' => 'nullable|string',
        ];
    }
}
