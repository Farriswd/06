<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CharactersResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'sid' => $this->sid,
            'name' => $this->name,
            'lv' => $this->lv,
            'job' => url('/jobs/'.$this->job.'.jpg'),
            'race' => $this->RaceName
        ];
    }
}
