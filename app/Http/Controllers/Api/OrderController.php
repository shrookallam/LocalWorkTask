<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CustomerOrderResource;
use App\Http\Resources\OrderResource;
use App\Http\Resources\ProductResource;
use App\Models\Order;
use App\Models\order_details;
use App\Models\Product;
use App\Traits\ApiResponseOrderTrait;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    use ApiResponseOrderTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getOrder(Request $request)
    {
        $order =new CustomerOrderResource(Order::with('customers')->where('id',$request->id)->get());

       if(!($order->isEmpty())){
        return $this->apiResponse($order,'Bill has been created', 200);
       }else{
        return $this->apiResponseerror('This order Not Found', 401);

       }
    }

    public function customerReport(Request $request ){
        $ordersOfCustomer= Order::where('customer_id',$request->id)->pluck('id')->toArray();

         if(sizeof($ordersOfCustomer)){
            $productsQuantity= order_details::whereIn('order_id',$ordersOfCustomer)->pluck('quantity')->toArray();
            $products= order_details::whereIn('order_id',$ordersOfCustomer)->pluck('product_id')->toArray();
            $productsDetails=new ProductResource(Product::whereIn('id',$products)->with('orders')->get());
            $totalPayments=Order::whereIn('id',$ordersOfCustomer)->sum('total');
            $countOfProducts=array_sum($productsQuantity);
            $orderDetail= new OrderResource(Order::whereIn('id',$ordersOfCustomer)->with('products','customers')->get());
            $productsDetails=new ProductResource(Product::whereIn('id',$products)->with('orders')->get());

            return $this->apiOrderResponse($countOfProducts,$totalPayments,$orderDetail,$productsDetails,'Done',200);
       }else{
            return $this->apiResponseerror('This customer Not have any orders yet', 401);

       }

    }


}
