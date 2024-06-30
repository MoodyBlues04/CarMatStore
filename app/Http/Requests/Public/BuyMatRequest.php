<?php

namespace App\Http\Requests\Public;

use Illuminate\Foundation\Http\FormRequest;

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
            'accessories' => 'required|array', // id, count
            'material' => 'required|int', // id
            'mat_places' => 'required|array', // id
            'delivery' => 'required|string',
            'client_data' => 'required',
            'client_data.name' => 'required|string',
            'client_data.surname' => 'required|string',
            'client_data.phone' => 'required|string',
            'client_data.email' => 'required|email',
            'client_data.address' => 'required|string',
            'client_data.geo' => 'required|string',
            'client_data.comment' => 'nullable|string',
        ];
    }
}
