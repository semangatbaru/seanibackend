<?php

namespace App\Http\Controllers\api;

use App\Models\Transaksi;
use App\Models\Detail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use DB;
use App\Http\Resources\Transaksi as TransaksiResource;
use App\Http\Resources\Detail as DetailResource;
use App\Http\Controllers\api\BaseController as BaseController;


class TransaksiController extends BaseController
{
    public function getTransaksi(){
        $alat = DB::table('sewa')->orderby('id_sewa','desc')->get();
        return $this->sendResponse(TransaksiResource::collection($alat), 'Products retrieved successfully.');
    }

    public function prosesTransaksi(){
        $alat = DB::table('sewa')->where('status','diproses')->orderby('id_sewa','desc')->get();
        return $this->sendResponse(TransaksiResource::collection($alat), 'Products retrieved successfully.');
    }
    public function juTransaksi(){
        $alat = DB::table('sewa')->where('status','ju')->orderby('id_sewa','desc')->get();
        return $this->sendResponse(TransaksiResource::collection($alat), 'Products retrieved successfully.');
    }
    public function setujuTransaksi(){
        $alat = DB::table('sewa')->where('status','disetujui')->orderby('id_sewa','desc')->get();
        return $this->sendResponse(TransaksiResource::collection($alat), 'Products retrieved successfully.');
    }
    
    public function store(Request $request){

        $validator = Validator::make($request->all(), [

            
            
            'tgl_sewa' => 'required',
            'total' => 'required',
            'id_user' => 'required',
            'bayar' => 'required',
            'status' => 'required',
            'lahan' => 'required',
            

        ]);

   

        if($validator->fails()){

            return $this->sendError('Validation Error.', $validator->errors());       

        }

   

        $input = $request->all();

        date_default_timezone_set("asia/Jakarta");
        $tgl = date('dmy');
        
        $id = Transaksi::count();
        if($id < 1){
            $id_sewa = 'Tr-'.$tgl."-1"; 
        }else{
            
            
            $idbaru = $id+1;
            $id_sewa = 'Tr-'.$tgl."-".$idbaru;
        }
        // 

        $input['id_sewa'] = $id_sewa;
        $alats = $input['alats'];

        $transaksi = Transaksi::create($input);
        foreach ($alats as $alat){
            $alat['id_sewa'] = $id_sewa;
            $detailtransaksi = Detail::create($alat);
            
        }
        
        return $this->sendResponse(new TransaksiResource($transaksi), 'Transaksi created successfully.');
        

    }

}
