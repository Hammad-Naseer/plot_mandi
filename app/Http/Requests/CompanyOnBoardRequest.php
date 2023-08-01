<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class CompanyOnBoardRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $companyFields = [
            'company_name'      => 'required',
            'company_website'   => 'required',
            'company_phone'     => 'required',
            'company_email'     => 'required',
            'focal_name'        => 'required',
            'location_type'     => 'required',
            'secret_key'        => 'required',
        ];
        if ($this->input("company_account_type" == '1')) {
            dd("Request");
        //     $companyFields['is_active'] = 'required';
        }
        return $companyFields;
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
            'company_name.required' => 'Please enter company name.',
            'company_website.required' => 'Please enter company website.',
            'company_phone.required' => 'Please enter company phone.',
            'company_email.required' => 'Please enter company email.',
            'focal_name.required' => 'Please enter focal name.',
            'location_type.required' => 'Please enter location type.',
            'secret_key.required' => 'secret key is required.',
        ];
    }
}
