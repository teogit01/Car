<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Exception;
use Illuminate\Support\Facedes\Validation;
use App\Http\Controllers\Base\BaseResponseweb;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    const SUCCESS = 'SUCCESS';
    const ERROR = 'ERROR';

    public $request;
    public $model = null;
    public $response;
    public $only_code = true;
    public $key = 'data';
    public $data =[];

    public function __construct(){
    	
    	$this->response = new BaseResponseweb();
    }

    public function config($option){
    	isset($option['request']) ? $this->request = $option['request'] : '';
    	isset($option['model']) ? $this->model = $option['model'] : '';
    }
    public function response(){
        if ($this->only_code) {

            return $this->response::response();
        }

        return $this->response::response($this->key, $this->data);
    }
}
