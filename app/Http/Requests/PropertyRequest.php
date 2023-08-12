<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class PropertyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'property_title' => 'required|string|max:255',
            'property_description' => 'required|string',
            'property_status' => 'required|string',
            'property_type' => 'required|string',
            'property_rooms' => 'required|integer',
            'property_price' => 'required|numeric',
            'property_area' => 'required|numeric',
            'property_address' => 'required|string',
            'property_city' => 'required|string',
            'property_state' => 'required|string',
            'property_country' => 'required|string',
            'property_latitude' => 'nullable|numeric',
            'property_longitude' => 'nullable|numeric',
            'property_kitchens' => 'required|integer',
            'property_bathrooms' => 'required|integer',
            'property_features' => 'nullable|string',
            'property_contact_name' => 'required|string',
            'property_contact_email' => 'required|email',
            'property_contact_phone' => 'required|string',
        ];
    }

    public function failedValidation(Validator $validator): array
    {
        $completeRoutePath = $this->url();
        if (strpos($completeRoutePath, '/api/') !== false) {
            throw new HttpResponseException(response()->json([
                'success'   => false,
                'code'      => 403,
                'message'   => 'Validation errors',
                'data'      => $validator->errors()
            ], 403));
        }else{
            parent::failedValidation($validator);
        }
    }

    

    public function messages(): array
    {
        return [
            'property_title.required' => 'Please enter your property title.',
            'property_description.required' => 'Please enter your property description.',
            'property_status.required' => 'Please enter your property status.',
            'property_type.required' => 'Please enter your property type.',
            'property_rooms.required' => 'Please enter your property rooms.',
            'property_price.required' => 'Please enter your property price.',
            'property_area.required' => 'Please enter your property area.',
            'property_address.required' => 'Please enter your property address.',
            'property_state.required' => 'Please enter your property state.',
            'property_city.required' => 'Please enter your property city.',
            'property_country.required' => 'Please enter your property country.',
            'property_latitude.required' => 'Please enter your property latitude.',
            'property_longitude.required' => 'Please enter your property longitude.',
            'property_kitchens.required' => 'Please enter your property kitchens.',
            'property_bathrooms.required' => 'Please enter your property bathrooms.',
            'property features.required' => 'Please enter your property features.',
            'property_contact_name.required' => 'Please enter your contact name.',
            'property_contact_email.required' => 'Please enter your contact email.',
            'property_contact_phone.required' => 'Please enter your contact email.',
        ];
    }
}
