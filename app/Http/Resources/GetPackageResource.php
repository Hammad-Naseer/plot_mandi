<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GetPackageResource extends JsonResource
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
                'package_id' => $d->package_id,
                'package_title' => $d->package_title,
                'package_description' => $d->package_description,
                'package_for' => $d->package_for,
                'currency' => $d->currency,
                'plan_price' => $d->plan_price,
                'max_locations' => $d->max_locations,
                'max_users' => $d->max_users,
                'max_users_per_location' => $d->max_users_per_location,
                'maximum_standards' => $d->maximum_standards,
                'on_board_auditors' => $d->on_board_auditors,
                'storage' => $d->storage,
                'features' => $d->features,
                'created_at' => $d->created_at,
            ];
        endforeach;
        return $output;
    }
}
