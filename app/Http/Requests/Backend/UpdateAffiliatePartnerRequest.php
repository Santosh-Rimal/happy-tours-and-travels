<?php

namespace App\Http\Requests\Backend;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateAffiliatePartnerRequest extends FormRequest
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
            'name' => [
                'required',
                Rule::unique('affiliate_partners', 'name')->ignore($this->route('affiliatedpartner')),
            ],
            'image' => 'nullable|image', // Not required during update
            'description' => 'nullable|string',
            'status' => 'nullable|in:active,inactive',
        ];
    }
}