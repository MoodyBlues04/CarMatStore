<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\CreateRequest;
use App\Http\Requests\UpdateRequest;
use Illuminate\Foundation\Http\FormRequest;

class CreateArticleRequest extends FormRequest implements CreateRequest, UpdateRequest
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
            'title' => 'required|string',
            'content' => 'required|string',
        ];
    }

    public function getDataToCreate(): array
    {
        return $this->validated();
    }

    public function getDataToUpdate(): array
    {
        return $this->validated();
    }
}
