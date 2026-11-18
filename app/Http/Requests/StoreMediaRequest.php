<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreMediaRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255', Rule::unique('media', 'title')],
            'genre' => ['required', 'string', 'max:100'],
            'release_year' => ['required', 'integer', 'min:1888', 'max:2100'],
            'duration_minutes' => ['required', 'integer', 'min:1'],
        ];
    }
}
