<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SettingsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'title' => $this->title ?? 'No Title',
            'header_logo' => isset($this->header_logo) ? url('storage/' .$this->header_logo ) : '',
            'main_logo' => isset($this->main_logo) ? url('storage/' .$this->main_logo ) : '',
            'footer_logo' => isset($this->footer_logo) ? url('storage/' .$this->footer_logo ) : '',
            'copyright_text' => $this->copyright_text ?? 'No copyright text',
            'facebook_link' => $this->facebook_link ?? '',
            'discord_link' => $this->discord_link ?? ''
        ];
    }
}
