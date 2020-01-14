<?php

namespace App\Http\Controllers\kuguan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\admin\UserModel;
class LoginController extends Controller
{
    function login(){
        return view('ku.login');
    }
    function do_login(Request $request){
       $post=request()->except('_token');

       $data=UserModel::where($post)->first();

        if($data){
            session(['kasa'=>$data]);
            request()->session()->save();
            return redirect('/kuguan');
        }       
        return redirect('/kuguan/login')->with('msg','此用户不存在!其联系管理员');
    }
    function logout(){
         session(['kasa'=>null]);
            request()->session()->save();
            return redirect('/kuguan/login/');
               
    }
}
