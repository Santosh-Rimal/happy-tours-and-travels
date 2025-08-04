<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAboutTripDetail extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function true(): bool
    {
        return false;
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
          Rule::unique('about_trips', 'trip_detail_id')->ignore($this->route('abouttrip')),
          ],
           'trip_description'=>'required|min:20',
           'image'=>'image',
        ];
    }

    public function messages():array
    {
        return[
            'trip_detail_id.unique'=>'The Selected Trip is already been taken',
        ];
    }
    public function attributes(): array
    {
        return [
            'category_id'=>'Category',
            'trip_detail_id' => 'trip',
        ];
    }
}