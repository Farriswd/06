<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ServerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'auth_ip' => $this->auth_ip,
            'auth_port' => $this->auth_port,
            'image' => isset($this->image) ? url('/storage/'. $this->image) : '',
            'game_ip' => $this->game_ip,
            'game_port' => $this->game_port,
        ];
    }
}
