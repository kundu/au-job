<?php


namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;


class BaseController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendResponse(int $code = 200, $status = true, $data = [], string $message = "")
    {
    	$response = [
            'success' => $status,
            'message' => $message,
            'data'    => $data,
        ];

        return response()->json($response, $code);
    }
}
