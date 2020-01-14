<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Illuminate\Support\Facades\Cache;

class KyController extends Controller
{
    /**
     * Display a listing of the resource.
     *列表
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=cache();


        $data=DB::table('kk')->orderBy('k_id','desc')->paginate(3);
        cache(['data'->$data],20);


        return view('admin.ky.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *添加
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ky.create');
    }

    /**
     * Store a newly created resource in storage.
     *执行添加
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $post=$request->except('_token');
       $res=DB::table('kk')->insert($post);
       if($res){
        return redirect('/student');
       }
    }

    /**
     * Display the specified resource.
     *详情页
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *编辑
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=DB::table('kk')->where('k_id',$id)->first();
        return view('admin.ky.edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *执行编辑
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $post=$request->except('_token');
       $res=DB::table('kk')->where('k_id',$id)->update($post);
       if($res!==false){
        return redirect('/student');
       }
    }

    /**
     * Remove the specified resource from storage.
     *删除
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       // dd($id);
          $res=DB::table('kk')->where('k_id',$id)->delete();
          if($res){
            return redirect('/student');
          }
    }
}
 
 

 
 