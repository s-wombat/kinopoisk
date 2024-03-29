<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

class FilmUpdateRequest extends FormRequest
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
            'name' => ['string', 'max:255'],
            'description' => ['string'],
            'date_release' => ['date'],
            'preview' => [
                'nullable',
                File::image()
                    ->min(20)
                    ->max(12 * 1024)
                    ->dimensions(Rule::dimensions()->maxWidth(1000)->maxHeight(500)),
            ],
            'poster' => [
                'nullable',
                File::image()
                    ->min(20)
                    ->max(12 * 1024)
                    ->dimensions(Rule::dimensions()->maxWidth(3000)->maxHeight(3000)),
            ],
            'categories' => ['array']
        ];
    }
}
