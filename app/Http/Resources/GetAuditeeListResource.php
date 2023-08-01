<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GetAuditeeListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return $this->formatArrayData($this->resource);
    }

    private function formatArrayData($data)
    {
        $output = array();
        foreach($data as $d):
            $output[] = [
                'company_id' => $d->companyID,
                'company_name' => $d->company_name,
                'name' => $d->name,
                'name' => $d->company_phone,
                'email' => $d->email,
                'email_verification' => $d->email_verified_at,
                'package' => $d->package_id,
                'payment_status' => $d->payment_status,
                'subscribe' => $d->assigned_at,
                'expire' => $d->expiration_at,
                'is_active' => $d->companyStatus,
            ];
        endforeach;
        return $output;
    }
}
