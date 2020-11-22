<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseRoutingController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class BaseController extends BaseRoutingController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $response = [
        'results' => null,
        'meta' => [
            'code' => 200,
            'status' => 'success',
            'message' => null
        ],
    ];

    public function success($data = null, $message = null){
        $this->response['meta']['message'] = $message;
        $this->response['results'] = $data;

        return response()->json($this->response, $this->response['meta']['code']);
    }

    public function error($data = null, $message = null, $code = 400){
        $this->response['meta']['status'] = 'error';
        $this->response['meta']['code'] = $code;
        $this->response['meta']['message'] = $message;
        $this->response['results'] = $data;

        return response()->json($this->response, $this->response['meta']['code']);
    }
}

