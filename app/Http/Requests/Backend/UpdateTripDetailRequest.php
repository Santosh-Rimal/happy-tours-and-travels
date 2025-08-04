<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTripDetailRequest extends FormRequest
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
             // Trip Details
             'trip_name' => [
             'required',
             Rule::unique('trip_details', 'trip_name')->ignore($this->route('tripdetail')),
             'string',
             'max:255'
             ],
             'category_id' => 'required|string|max:255',
             'destination' => 'required|string|max:255',
             'trip_style' => [
             'required',
             Rule::in(['Trekking', 'Peak Climbing', 'Tour', 'Expedition'])
             ],
             'trip_duration' => 'required|string|max:50',

             // Inclusions
             'food' => 'required|string|max:255',
             'transportation' => 'required|string|max:255',
             'accommodation' => 'required|string|max:255',

             // Attributes
             'group_size' => 'required|string|max:50',
             'trip_difficulty' => [
             'required',
             Rule::in(['Easy', 'Moderate', 'Challenging', 'Difficult'])
             ],
             'trip_price' => 'required|numeric|min:0',
             'max_elevation' => 'required|string|max:50',

             // Description
             'trip_description' => 'required|string',
        ];
    }
   
}