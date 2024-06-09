<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $Orders = array();
        foreach ($this->resource as $order) {

            $Orders[] = array(
                'BillNo' => $order->id,
                'Date' => $order->date,
                'Total' => $order->total,
                'customer Data'=>[

                    'ID : '=> $order->customers->id,
                    'Name : '=>$order->customers->name,
                    'Email : '=> $order->customers->email,
                    'Phone : '=>$order->customers->phone,
                ],

            );
        }
        return $Orders;
        }


}
