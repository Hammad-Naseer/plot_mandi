<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class PermissionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title'     => 'required',
            'code'      => 'required',
            'is_active' => 'required',
        ];
    }

    public function failedValidation(Validator $validator): array
    {
        throw new HttpResponseException(response()->json([
            'success'   => true,
            'code'      => 403,
            'message'   => 'Validation errors',
            'data'      => $validator->errors()
        ]));
    }

    

    public function messages(): array
    {
        return [
            'title.required' => 'Please enter permission title.',
            'code.required' => 'Please enter permission code.',
            'is_active.required' => 'Please select status.',
        ];
    }
}
