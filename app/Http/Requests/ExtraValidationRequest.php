<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

abstract class ExtraValidationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function validator(): \Illuminate\Validation\Validator
    {
        $validator = Validator::make($this->input(), $this->rules(), $this->messages(), $this->attributes());
        $validator->after(fn ($validator) => $this->extraValidation($validator));
        return $validator;
    }

    public function rules(): array
    {
        return [];
    }

    /**
     * Does extra validation after main validation rules processed
     * @param \Illuminate\Validation\Validator $validator
     * @return void
     */
    public function extraValidation(\Illuminate\Validation\Validator $validator): void
    {
    }
}
