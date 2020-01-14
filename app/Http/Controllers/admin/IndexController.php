<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    function test(){
    	$name='张三,';
    	return view('test',['name'=>$name]);
    }
    function login(){
    	return view('login');
    }
    function do_login(){
    	$post=request()->all();
    	dd($post);
    }
}
