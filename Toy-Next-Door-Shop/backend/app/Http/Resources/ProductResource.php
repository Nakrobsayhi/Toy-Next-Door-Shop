<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->product_id, // Adjust if you use 'id' as primary key
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'image' => $this->image,
            'category' => $this->whenLoaded('cat', function () {
                return $this->cat->name;
            }),
        ];
    }
}
