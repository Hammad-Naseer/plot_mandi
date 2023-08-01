<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class RolePermissionRequest extends FormRequest
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
        $rules = [
            'role_id'     => 'required',
            'permission_id'  => 'required',
            'is_active'  => 'required',
        ];
        // if ($this->->method()) {
        //     $rules['is_active'] = 'required';
        // }

        return $rules;
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
            'role_id.required' => 'Please select role.',
            'permission_id.required' => 'Please select permission.',
            'is_active.required' => 'Please select status.',
        ];
    }
}
