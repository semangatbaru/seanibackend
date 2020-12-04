<?php

namespace App\Http\Controllers\api;

use App\Models\User;
use Validator;
use App\Http\Controllers\api\BaseController as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class RegisterController extends BaseController
{
    public function register(Request $request){

        $validator = Validator::make($request->all(), [

            'nama' => 'required',
            'email' => 'required|email',
            'alamat' => 'required',
            'no_telp' => 'required',
            'foto' => 'required',

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

        $user = User::create($input);

        $success['token'] =  $user->createToken('MyApp')->accessToken;

        $success['email'] =  $user->email;
        $success['foto'] =  $user->foto;

   

        return $this->sendResponse($success, 'User register successfully.');

    }

    public function login(Request $request){

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 

            $user = Auth::user(); 

            $success['token'] =  $user->createToken('MyApp')-> accessToken; 

            $success['name'] =  $user->name;

   

            return $this->sendResponse($success, 'User login successfully.');

        } 

        else{ 

            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);

        } 

    }
    
}
