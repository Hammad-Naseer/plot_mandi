<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class PostRequest extends FormRequest
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
            'title' => 'required|string',
            'type' => 'required|integer',
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
            'title.required' => 'Please enter your post title.',
            'type.required' => 'Please enter post type.',
        ];
    }
}
