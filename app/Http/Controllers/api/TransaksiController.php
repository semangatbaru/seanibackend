<?php

namespace App\Http\Controllers\api;

use App\Models\Transaksi;
use App\Models\Detail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use DB;
use Carbon\Carbon as time;
use App\Http\Resources\Transaksi as TransaksiResource;
use App\Http\Resources\Detail as DetailResource;
use App\Http\Controllers\api\BaseController as BaseController;


class TransaksiController extends BaseController
{
    public function lgetTransaksi(Request $request){
        $input = $request->all();
        $alat = DB::table('sewa')->orderby('id_sewa','desc')
        ->join('user', 'user.id_user', '=', 'sewa.id_user')
        ->get(['sewa.*', 'user.*']);;
            
        $res['success'] = "true";
        $res['data'] = $alat;
        return response($res);
    }

    public function lprosesTransaksi(Request $request){
        $input = $request->all();
        $alat = DB::table('sewa')->where('status','diproses')
        ->join('user', 'user.id_user', '=', 'sewa.id_user')
        
        ->orderby('id_sewa','desc')
        ->get(['sewa.*', 'user.*']);;
            
        $res['success'] = "true";
        $res['data'] = $alat;
        return response($res);
    }
    public function ljuTransaksi(Request $request){
        $input = $request->all();
        $alat = DB::table('sewa')->where('status','ju')
        ->join('user', 'user.id_user', '=', 'sewa.id_user')
        
        ->orderby('id_sewa','desc')
        ->get(['sewa.*', 'user.*']);;
            
        $res['success'] = "true";
        $res['data'] = $alat;
        return response($res);
    }
    public function lsetujuTransaksi(Request $request){
        $input = $request->all();
        $alat = DB::table('sewa')->where('status','disetujui')
        ->join('user', 'user.id_user', '=', 'sewa.id_user')
        
        ->orderby('id_sewa','desc')
        ->get(['sewa.*', 'user.*']);;
            
        $res['success'] = "true";
        $res['data'] = $alat;
        return response($res);
    }

    public function detailUser(Request $request){
        $input = $request->all();
        $detailuser = DB::table('sewa')
        ->join('user', 'user.id_user', '=', 'sewa.id_user')
        ->where('sewa.id_sewa',$input)->where('sewa.id_user',$input)
        ->get(['sewa.*', 'user.*']);;
            
        $res['success'] = "true";
        $res['data'] = $detailuser;
        return response($res);
        //return $this->sendResponse(TransaksiResource::collection($alat), 'Products retrieved successfully.');
    }
    public function detailSewa(Request $request){
        $input = $request->all();
        $detailuser = DB::table('detail_sewa')
        ->join('alat', 'alat.id_alat', '=', 'detail_sewa.id_alat')
        
        //->where('detail_sewa.id_sewa',$input)
        ->where('detail_sewa.id_sewa',$input)
        ->get(['alat.nama_alat']);;
            
        $res['success'] = "true";
        $res['data'] = $detailuser;
        return response($res);
        //return $this->sendResponse(TransaksiResource::collection($alat), 'Products retrieved successfully.');
    }
    public function now(Request $request){
        $input = $request->all();
        $mytime=time::now();
        $alat = DB::table('sewa')
        ->join('user', 'user.id_user', '=', 'sewa.id_user')
        ->where('sewa.tgl_sewa','>=',$mytime)->where('sewa.status','!=','diproses')
        ->orderby('sewa.tgl_sewa','asc')
        ->get(['sewa.*', 'user.*']);;
            
        $res['success'] = "true";
        $res['data'] = $alat;
        return response($res);
    }
    public function edit(Request $request, $id_sewa){
        $tgl_sewa = $request->tgl_sewa;
        $status = $request->status;
        $input = $request->all();

        $transaksi = Transaksi::find($id_sewa);
        $transaksi->tgl_sewa = $tgl_sewa;
        $transaksi->status = $status;
        $transaksi->save();
            
        $res['success'] = "true";
        $res['message'] = "data berhasil diubah";
        $res['data'] = $transaksi;
     
        return response($res);
    }






    //customer
    public function getTransaksi(Request $request){
        $input = $request->all();
        $alat = DB::table('sewa')->where('id_user',$input)
        ->orderby('id_sewa','desc')->get();
        return $this->sendResponse(TransaksiResource::collection($alat), 'Products retrieved successfully.');
    }

    public function prosesTransaksi(Request $request){
        $input = $request->all();
        $alat = DB::table('sewa')->where('status','diproses')->where('id_user',$input)
        ->orderby('id_sewa','desc')->get();
        return $this->sendResponse(TransaksiResource::collection($alat), 'Products retrieved successfully.');
    }
    public function juTransaksi(Request $request){
        $input = $request->all();
        $alat = DB::table('sewa')->where('status','ju')->where('id_user',$input)
        ->orderby('id_sewa','desc')->get();
        return $this->sendResponse(TransaksiResource::collection($alat), 'Products retrieved successfully.');
    }
    public function setujuTransaksi(Request $request){
        $input = $request->all();
        $alat = DB::table('sewa')->where('status','disetujui')->where('id_user',$input)
        ->orderby('id_sewa','desc')->get();
        return $this->sendResponse(TransaksiResource::collection($alat), 'Products retrieved successfully.');
    }
    
    public function store(Request $request){

        $validator = Validator::make($request->all(), [

            
            
            'tgl_sewa' => 'required',
            'total' => 'required',
            'id_user' => 'required',
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
