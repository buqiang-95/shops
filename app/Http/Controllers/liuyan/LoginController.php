<?php

namespace App\Http\Controllers\liuyan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\UserModel;
class LoginController extends Controller
{
       public function login(){
        return view('/liuyan/login');
    }

    public function do_login(Request $request){
        $post = $request->except('_token');
          $data=UserModel::where($post)->first();
         if($data){
            session(['admin'=>$data]);
            request()->session()->save();
            return redirect('/liuyan');
        }       
        return redirect('/liuyan/login')->with('msg','此用户不存在!其联系管理员');
    }

   function logout(){
         session(['admin'=>null]);
            request()->session()->save();
            return redirect('/liuyan/login/');
               
    }
}