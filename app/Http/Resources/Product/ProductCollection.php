<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\Resource;

class ProductCollection extends Resource
{
    
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'toalPrice' => round($this->price - ($this->price * $this->discount/100),2),
            'rating' => $this->reviews->count() > 0 ? round($this->reviews->sum('star')/$this->reviews->count(),2) : 'No rating yet',//reviews di ambil dari model product
            'discount' => $this->discount, 
            'href' => [
                'link' => route('products.show',$this->id)
            ]
        ];
    }
}
