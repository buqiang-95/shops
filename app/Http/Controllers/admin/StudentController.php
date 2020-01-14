<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller{
	function getlist(){
		echo "学生列表";
	}
	
	function list($id){
		echo $id;
	}
	function asfr($name){
		echo $name;
	}
}