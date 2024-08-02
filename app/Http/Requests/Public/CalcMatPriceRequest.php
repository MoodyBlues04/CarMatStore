<?php

namespace App\Http\Requests\Public;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CalcMatPriceRequest extends FormRequest
{
    public const SALOON = 'saloon';
    public const BAG = 'bag';
    public const PREFIXES = [
        self::SALOON => 'салон',
        self::BAG => 'багажник',
    ];

    public function query($key = null, $default = null)
    {
        $keyItems = explode('.', $key);
        $res = parent::query();
        foreach ($keyItems as $keyItem) {
            $res = $res[$keyItem] ?? null;
            if (is_null($res)) {
                return $default;
            }
        }
        return $res;
    }

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
        $rules = [
            'tariff' => 'nullable|string|' . Rule::exists('mat_tariffs', 'name'),
            'material' => 'nullable|string',
            'accessory' => 'nullable|array',
            'places' => 'nullable|array',
            'emblem' => 'nullable|string',
            'color' => 'nullable|string',
            'border_color' => 'nullable|string',
        ];
        $res = [];
        foreach (self::PREFIXES as $prefix => $label) {
            $res += $this->withPrefix($rules, "$prefix.");
        }
        return $res;
    }

    private function withPrefix(array $rules, string $prefix): array
    {
        $res = [];
        foreach ($rules as $key => $value) {
            $res[$prefix . $key] = $value;
        }
        return $res;
    }
}
