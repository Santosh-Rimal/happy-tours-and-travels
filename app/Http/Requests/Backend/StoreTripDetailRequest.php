<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreTripDetailRequest extends FormRequest
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
            'category_id'=>'required|string',
            'trip_name' => 'required|unique:trip_details,trip_name|string|max:255',
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
            
            // // Highlights
            // 'highlights' => 'required|array|min:3',
            // 'highlights.*' => 'required|string|max:255',
            
            // // Hero Imageo
            // 'hero_image' => 'required|image|mimes:jpeg,png,jpg|max:5120'
        ];
    }
    public function messages()
    {
        return [
            'trip_style.in' => 'Please select a valid trip style from the options',
            'trip_difficulty.in' => 'Please choose a difficulty level from the provided options',
            'highlights.min' => 'Please add at least :min key highlights',
            'hero_image.image' => 'Only image files are allowed (JPEG, PNG, JPG)',
            'hero_image.max' => 'Image size must be less than 5MB',
            'trip_price.numeric' => 'Price must be a valid number',
        ];
    }

    public function attributes()
    {
        return [
            'category_id'=>'Category',
            'trip_detail_id' => 'trip',
            'trip_name' => 'trip name',
            'trip_style' => 'trip style',
            'trip_duration' => 'duration',
            'trip_price' => 'price',
            'max_elevation' => 'maximum elevation',
            'hero_image' => 'featured image'
        ];
    }
}