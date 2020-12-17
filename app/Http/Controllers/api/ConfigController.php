<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\Config;
use App\Http\Resources\Config as ConfigResource;
use App\Http\Controllers\api\BaseController as BaseController;


class ConfigController extends BaseController
{
    public function getConfig(Request $request){
        $input = $request->all();

        $config = Config::where('id_config', $input)->first();
        if($config == null){

            $res['success'] = "false";
            $res['value'] = "data tidak ditemukan"; 
            return response($res);

        }else{
            $res['success'] = "true";
            $res["value"] =  $config->isi;
            $res["message"] = "berhasil";
            return response($res);
            
        }
    }
}
