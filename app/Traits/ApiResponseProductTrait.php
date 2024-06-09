<?php
namespace App\Traits;

use Illuminate\Http\Request;

trait ApiResponseProductTrait {

    /**
     * @param Request $request
     * @return $this|false|string
     */
    public function apiReportResponses($total=null,$data=null,$message=null, $error = null, $code = 200)
     {
         $array = [
             'status' => in_array($code, $this->successCodes())? true : false,
             'TotalOfProducts' => $total,
             'Details'=>$data,
             'message' => $message,
         ];
         return response($array, $code);
     }
   
     public function apiResponses($message=null, $error = null, $code = 200)
     {
         $array = [
             'status' => in_array($code, $this->successCodes())? true : false,
             'message' => $message,
         ];
         return response($array, $code);
     }

     public function apiResponseerrors($message=null, $error = null, $code =404)
    {
        $array = [
            'status' => in_array($code, $this->successCodes()) ? true : false,
            'message' => $message,
        ];
        return response($array, $code);
    }


    public function successCodes()
    {
        return [200, 201, 202];
    }
    public function notFoundResponds()
    {
        return $this->apiResponse(null, 'not found!!', 400);
    }
}
