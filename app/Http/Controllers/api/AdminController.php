<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    public function admin(Request $request){
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);

        $email = Admin::All();

  

        if($email == null){

            $res['success'] = "0";
            $res['value'] = "email anda belum terdaftar"; 
            return response($res);

        }else{
            $success['token'] =  $email->createToken('MyApp')->accessToken;

            $success['email'] =  $email->email;
            $success['id_user'] =  $email->id_admin;

   

        return $this->sendResponse($success, 'User register successfully.');
        }
        
        

    }
}
