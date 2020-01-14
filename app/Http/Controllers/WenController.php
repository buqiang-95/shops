<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WenModel;
use App\KsaModel;
use DB;
class WenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $w_name=request()->w_name;
       $f_id=request()->f_id;
       $where=[];
       if($w_name){
        $where[]=['w_name','like',"%$w_name%"];
       }
        if($f_id){
        $where[]=['fen.f_id','=',$f_id];
       }
       // DB::connection()->enableQueryLog();
       $akss=KsaModel::get();
        $data=WenModel::leftjoin('fen','wenzhang.f_id','=','fen.f_id')->where($where)->orderBy('w_id','desc')->paginate(3);
        //dd($data);
        $logs = DB::getQueryLog();

        //dump($logs);
        $query=request()->all();
        if(request()->ajax()){
            return view('wen.ajaxindex',['data'=>$data,'query'=>$query,'akss'=>$akss]);
        }

        return view('wen.index',['data'=>$data,'query'=>$query,'akss'=>$akss]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $data=KsaModel::get();
       //dd($data);
       return view('wen.create',['data'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //验证
        $request->validate([
         'w_name' => 'required|unique:wenzhang|max:255'

        ],[

            'w_name.required'=>"文章名称必填",
            'w_name.unique'=>"文章名称已存在",
            //'is_show.required'=>'是否显示必填!'
        ]);

        $post=$request->except('_token');
        $post['add_time']=time();
       // dump($post);
        //文件上传
        if($request->hasFile('photo')){
            $post['photo']=$this->upload('photo');
        }
        
        //dd($post);
        $res=WenModel::insert($post);
        //dd($res);
    if($res){
        return redirect('/wen');
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
         $store_result = $photo->store('uploads');
         return $store_result;

        }
        exit('没有文件上传或者文件上传失败');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $res=wenModel::destroy($id);
    if($res){
        if(request()->ajax()){
            echo json_encode(['code'=>'00000','msg'=>'删除成功']);die;   
      }
       return redirect('/wen');
  }
      

    }
}
