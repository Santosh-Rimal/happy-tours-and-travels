<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class StoreAboutTripDetail extends FormRequest
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
            'trip_detail_id'=>'required|unique:about_trips,trip_detail_id',
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
            'trip_detail_id' => 'trip',
        ];
    }
}