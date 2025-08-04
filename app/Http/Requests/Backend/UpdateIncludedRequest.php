<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateIncludedRequest extends FormRequest
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
            'trip_detail_id' => [
                'required',
                Rule::unique('includeds', 'trip_detail_id')->ignore($this->include)
            ],
           'includes' => 'required|array|min:3',
           'includes.*' => 'required|string|max:255',
        ];
    }
    public function attributes(): array
    {
        return [
            'trip_detail_id' => 'trip',
        ];
    }
}