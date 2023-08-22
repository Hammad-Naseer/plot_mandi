<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class PropertyBidingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'property_id' => 'required|integer',
            'proposal_description' => 'required',
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
            'property_id.required' => 'Property Id is Missing.',
            'proposal_description.required' => 'Please enter proposal description.',
        ];
    }
}
