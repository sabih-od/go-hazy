<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class ContactinfoResource extends Resource
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
            'site' => $this->site,
            'email' => $this->email,
            'address' => $this->address,
            'phone' => $this->phone,
            'fax' => $this->fax,
        ];
    }
}
