<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
     public function returnResponse($flag,$message = null,$code=null,$data = null)
    {
        return response()->json([
            'flag' => $flag,
            'message' => $message,
            'code' => $code,
            'data' => $data
        ]);
    }
}
