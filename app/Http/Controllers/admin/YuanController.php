<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\admin\YgModel;
class YuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $b_name=request()->b_name??'';
       // $where=[];
       // if($b_name){
       //      $where[]=['b_name','like',"%$b_name%"];
       // }
       $data=YgModel::orderBy('b_id','desc')->paginate(3);
        return view('admin.yuan.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.yuan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $post=$request->except('_token');
        //dump($post);
        //文件上传
        if($request->hasFile('photo')){
            $post['photo']=$this->upload('photo');
            exit('没有文件上传或者文件上传失败');     
        }
        
       // // dd($post);
         $res=YgModel::insert($post);
       // dd($res);
    if($res){
        return redirect('/yuan');
        }
    }
    /**
     * 文件上传
     */
    function upload($filename){
        if (request()->file($filename)->isValid()) {
         //接收文件
         $photo = request()->file($filename); 
         //上传文件
         $store_result = $photo->store('uploads/admin');
         return $store_result;
        }
    }   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
                $data=YgModel::find($id);
        return view('admin.yuan.edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post=$request->except('_token');
        //dd($post);
        // if($request->hasFile('brand_loge')){
        //     $post['brand_loge']=$this->upload('brand_loge');
        // }
        // exit('修改文件失败');
        // //dd($post);
        $res=YgModel::where('b_id',$id)->update($post);
        //dd($res);
        if($res!==false){
            return redirect('/yuan');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res=YgModel::destroy($id);
        if($res){
            return redirect('/yuan');
        }
    }
}
