<?php

namespace App\Http\Controllers\api;

use App\Models\Info;
use Validator;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\Info as InfoResource;
use App\Http\Controllers\api\BaseController as BaseController;
class InfoController extends BaseController
{
    public function getInfo(){

        $info = DB::table('berita')->orderby('tanggal','desc')->get();
        return $this->sendResponse(InfoResource::collection($info), 'Info retrieved successfully.');

    }
}
