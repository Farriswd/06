<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NewsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'title' => $this->title,
            'content' => $this->content,
            'preview_image' => url('/storage/'.$this->preview_image),
            'event_image' => url('/storage/'.$this->event_image),
            'date' => $this->created_at->format('m.d'),
            'category' => $this->category->title
        ];
    }
}
