<?php

namespace App\Http\Controllers\xiaoqu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\admin\UserModel;
class LoginController extends Controller
{
 	function login(){
        return view('xiao.login');
    }
    function do_login(Request $request){
       $post=request()->except('_token');

       $data=UserModel::where($post)->first();

        if($data){
            session(['kas'=>$data]);
            request()->session()->save();
            return redirect('/xiaoqu');
        }       
        return redirect('/login/login')->with('msg','此用户不存在!其联系管理员');
    }
    function logout(){
         session(['kas'=>null]);
            request()->session()->save();
            return redirect('/login/login/');
               
    }
}
