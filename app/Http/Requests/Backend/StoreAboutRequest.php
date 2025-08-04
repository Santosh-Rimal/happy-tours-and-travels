<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class StoreAboutRequest extends FormRequest
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
          'page_title' => 'required|string|max:255',
          'page_subtitle' => 'required|string|max:255',
          'sections' => 'required|array',
          'sections.*.section_type' => 'required|in:content,stats',
          'sections.*.section_title' => 'required_if:sections.*.section_type,content|string|max:255',
          'sections.*.section_content' => 'required_if:sections.*.section_type,content|string',
          'sections.*.stat_value' => 'required_if:sections.*.section_type,stats|string|max:100',
          'sections.*.stat_label' => 'required_if:sections.*.section_type,stats|string|max:255',
          'sections.*.order' => 'required|integer|min:1',
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation()
    {
        // Ensure sections is an array even if empty
        $this->merge([
            'sections' => $this->sections ?? [],
        ]);
    }
}