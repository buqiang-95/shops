<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BooksModel;
use DB;
class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //showMsg(1,'Hello World!');
        $b_name=request()->b_name;
       $where=[];
       if($b_name){
        $where[]=['b_name','like',"%$b_name%"];
       }
       DB::connection()->enableQueryLog();
        $data=BooksModel::where($where)->orderBy('b_id','desc')->paginate(3);
        
        $logs = DB::getQueryLog();

        //dump($logs);
        $query=request()->all();

        return view('admin.books.index',['data'=>$data,'query'=>$query]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
         'b_name' => 'required|unique:books|max:15',
         'b_zz' => 'required|unique:books'
        ],[

            'b_name.required'=>"图书名称必填",
            'b_name.unique'=>"图书名称已存在",
            //'b_name.max'=>"图书名称在2-15位"
            'b_zz.required'=>'图书作者必填!'
        ]);

        $post=$request->except('_token');
            //dd($post);
        //文件上传
       if($request->hasFile('b_photo')){
            $post['b_photo']=$this->upload('b_photo');
             
        }
        
        $res=BooksModel::insert($post);
        //dd($res);
        //dd($res);
    if($res){
        return redirect('/books');
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
        //
    }
}
