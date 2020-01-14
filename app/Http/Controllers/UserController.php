<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\admin\UserModel;
class UserController extends Controller
{
    
    function login(){
        return view('admin.user.login');
    }
    function do_login(Request $request){
       $post=request()->except('_token');

       $data=UserModel::where($post)->first();
        if($data){
            session(['kas'=>$data]);
            request()->session()->save();
            return redirect('/brand');
        }       
        return redirect('/user/login/')->with('msg','此用户不存在!其联系管理员');
    }
    function logout(){
         session(['kas'=>null]);
            request()->session()->save();
            return redirect('/user/login/');
               
    }
}