<?php
/*
IMPORTANT: 
YOU ARE NOT ALLOWED TO REMOVE THIS COMMENT AND NO MODIFICATION TO THE CODE SHOULD BE MADE WITHOUT THE CONSENT OF THE AUTHORS
 
DISCLAIMER:
This code is provided 'as is' after proper verifications and reviews to the Development Team. 
he author to this file shall not be held liable for any damages, including any lost profits 
or other incidental or consequential damages arising out of or in connection with the use or inability to use this code.
 
[Details]
[Date: 2023-06-26]
[© Copyright Hammad Ali,Zeeshan Arain & Naseem]
[File: GetUserResource]
*/
namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GetUserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return $this->formatArrayData($this->resource);
    }

    private function formatArrayData($data)
    {
        $output = array();
        foreach($data as $d):
            $output[] = [
                'id' => $d->user_id,
                'name' => $d->name,
                'email' => $d->email,
                'email_verified_at' => $d->email_verified_at,
                // 'two_factor_confirmed_at' => $d->two_factor_confirmed_at,
                'auth_type' => $d->auth_type,
                'created_at' => $d->created_at,
            ];
        endforeach;
        return $output;
    }
}

