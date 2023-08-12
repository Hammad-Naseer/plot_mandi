<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class ResetPasswordRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'reset_code' => 'required|max:4',
            'password'  => 'required',
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
            'reset_code.required' => 'Please enter your reset code.',
            'password.required' => 'Please enter your password.',
        ];
    }
}
