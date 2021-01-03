<?php

namespace App\Http\Controllers\api;



use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use DB;
use App\Models\Alat;
use App\Http\Resources\Alat as AlatResource;
use App\Http\Controllers\api\BaseController as BaseController;

class AlatController extends BaseController
{
    public function getAlat(){

        $alat = DB::table('alat')->where('hidden',null)->get();
        return $this->sendResponse(AlatResource::collection($alat), 'Alat retrieved successfully.');

    }
    public function store(Request $request){

        $validator = Validator::make($request->all(), [

            'nama_alat' => 'required',
            'stok' => 'required',
            'harga' => 'required',
            'foto' => 'required',
            'deskripsi' => 'required'

        ]);

   

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $input = $request->all();
        $image_64 = $input['foto'];

        $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];   // .jpg .png .pdf
        
        $replace = substr($image_64, 0, strpos($image_64, ',')+1); 
        // find substring fro replace here eg: data:image/png;base64,
        $image = str_replace($replace, '', $image_64); 
        $image = str_replace(' ', '+', $image); 
        $imageName = \Str::random(10).'.'.$extension;
        \Storage::disk('public')->put($imageName, base64_decode($image));
        
        $path = \Storage::url($imageName);
        $gambar = url('/').$path;

        $input['foto'] = $gambar;
        
        $alat = Alat::create($input);
        return $this->sendResponse(new AlatResource($alat), 'Alat created successfully.');

    }
    public function edit(Request $request, $id_alat){
        $nama_alat = $request->nama_alat;
        $harga = $request->harga;
        $stok = $request->stok;

        $alat = Alat::find($id_alat);
        $alat->nama_alat = $nama_alat;
        $alat->harga = $harga;
        $alat->stok = $stok;
        $alat->save();
            
        $res['success'] = "true";
        $res['message'] = "data berhasil diubah";
        $res['data'] = $alat;
     
        return response($res);
    }
    public function hapus(Request $request, $id_alat){
        

        $alat = Alat::find($id_alat);
        $alat->hidden = "y";
        $alat->save();
            
        $res['success'] = "true";
        $res['message'] = "data berhasil dihapus";
        $res['data'] = $alat;
     
        return response($res);
    }
    
}
