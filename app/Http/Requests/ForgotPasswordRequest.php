<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class ForgotPasswordRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email'     => 'required|email',
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
            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please enter a valid email address.',
        ];
    }
}
