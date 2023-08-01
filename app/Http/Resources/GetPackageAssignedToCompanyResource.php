<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GetPackageAssignedToCompanyResource extends JsonResource
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
                // Package Assign Company
                'package_assign_company_id' => $d->package_assign_company_id,
                'package_id' => $d->package_id,
                'company_id' => $d->company_id,
                'payment_cycle' => $d->payment_cycle,
                'total_amount' => $d->total_amount,
                'discount_value' => $d->discount_value,
                'grand_amount' => $d->grand_amount,
                'assigned_at' => $d->assigned_at,
                'expiration_at' => $d->expiration_at,
                'package_activated' => $d->package_activated,
                'carry_forward' => $d->carry_forward,
                // Package Payment Details
                'carry_forward' => $d->due_amount,
                'paid_amount' => $d->paid_amount,
                'payment_status' => $d->payment_status,
                'payment_details' => $d->payment_details,
                'recieved_at' => $d->recieved_at,
                'recieved_by' => $d->recieved_by,

            ];
        endforeach;
        return $output;
    }
}
