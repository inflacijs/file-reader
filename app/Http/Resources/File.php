<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class file extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        
        return asset($this->file);
    }
    
    
}