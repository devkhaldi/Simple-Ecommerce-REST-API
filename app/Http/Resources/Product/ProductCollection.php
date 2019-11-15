<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\Resource;

class ProductCollection extends Resource
{
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'totalPrice'=> round((1-($this->discount/100))*$this->price,2),
            'rating' => $this->reviews->count() > 0 ?
                            round($this->reviews->sum('start')/$this->reviews->count(),2) 
                            : 'No reviews',
            'href' => [
                'link' => route('products.show',$this->id)
            ]
        ];
    }
}
