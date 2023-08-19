<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GetPosts extends JsonResource
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
                'post_id' => $d->post_id,
                'title' => $d->title,
                'type' => $d->type,
                'status' => $d->status,
                'created_by' => $d->created_by,
                'created_at' => $d->created_at,
            ];
        endforeach;
        return $output;
    }
}
