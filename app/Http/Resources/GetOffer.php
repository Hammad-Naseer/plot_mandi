<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GetOffer extends JsonResource
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
                'offer_id' => $d->offer_id,
                'title' => $d->title,
                'description' => $d->description,
                'image' => $d->image,
                'created_by' => $d->created_by,
                'created_at' => $d->created_at,
            ];
        endforeach;
        return $output;
    }
}
