<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GetUserActivityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        //return parent::toArray($request);
        return $this->formatArrayData($this->resource);
    }

    private function formatArrayData($data)
    {
        $output = array();
        foreach($data as $d):
            $output[] = [
                'user_id' => $d->user_id,
                'activity_json_data' => $d->activity_json_data,
                'user_agent_json' => $d->user_agent_json,
                'table' => $d->table,
                'action' => $d->action,
                'action_id' => $d->action_id,
                'log_type' => $d->log_type,
                'datetime' => $d->datetime,
            ];
        endforeach;
        return $output;
    }
}
