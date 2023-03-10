<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class FaqResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'details' => strip_tags($this->details)
        ];
    }
}
