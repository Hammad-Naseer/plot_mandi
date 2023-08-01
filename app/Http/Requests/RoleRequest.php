<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class RoleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'role_title'     => 'required',
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
            'role_title.required' => 'Please enter role title.',
        ];
    }
}
