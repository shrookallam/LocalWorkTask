<?php

namespace App\Traits;


trait ApiResponseOrderTrait
{

    public function apiOrderResponse($TolatPro = null,$totalPay=null,$orderData=null,$ProductsDetails=null,$message=null, $code = 200)
    {
        $array = [
            'status' => $code,
            'CountOfProducts' =>$TolatPro,
            'TotalPayments' =>$totalPay,
            'Details of orders' =>$orderData,
            'DetailsOfProoducts' =>$ProductsDetails,
            'message' => $message,
        ];
        return response($array, $code);
    }

    public function apiResponse($data = null,$message=null, $code = 200)
    {
        $array = [
            'status' => $code,
            'Data' =>$data,
            'message' => $message,
        ];
        return response($array, $code);
    }
    public function apiResponseerror($message=null, $error = null, $code =404)
    {
        $array = [
            'status' => $code,
            'message' => $message,
        ];
        return response($array, $code);
    }



    public function successCode()
    {
        return [200, 201, 202];
    }
    public function notFoundRespond()
    {
        return $this->apiResponse(null, 'not found!!', 400);
    }




}
