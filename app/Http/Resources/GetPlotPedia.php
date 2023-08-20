<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GetPlotPedia extends JsonResource
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
                'post_id' => $d->plot_pedias_id,
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
