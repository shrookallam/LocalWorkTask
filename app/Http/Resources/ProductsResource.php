<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $Products = array();
        foreach ($this->resource as $product) {

            $products[] = array(
                'ProductID' => $product->id,
                'ProductName' => $product->name,
                'ProductQuantity' => $product->quantity,
                'UnitPrice' => $product->unitPrice,

            );
        }
        return $products;
    }
}
