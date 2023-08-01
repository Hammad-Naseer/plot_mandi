<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GetPackageFeatureResource extends JsonResource
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
                'package_feature_id' => $d->package_feature_id,
                'title' => $d->title,
                'icon' => $d->icon,
                'description' => $d->description,
                'created_at' => $d->created_at,
            ];
        endforeach;
        return $output;
    }
}
