<?php

namespace App\Http\Controllers\xiaoqu;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\XiaoModel;
use Illuminate\Support\Facades\Redis;
class XiaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       
       
        $data=XiaoModel::orderBy('x_id','desc')->paginate(3);
         return view('xiao.index',['data'=>$data]);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('xiao.create');
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
       //  $post['add_time']=time();
       // // dump($post);
        //文件上传
        if($request->hasFile('x_img')){
            $post['x_img']=upload('x_img');
        }
        // //多文件上传
        // if($post['x_imgs']){
        //     $post['x_imgs']=moreuploads('x_imgs');
        // }
        // // dd($post);
        $res=XiaoModel::insert($post);
        //dd($res);
    if($res){
        return redirect('/xiaoqu');
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
        
        $data=XiaoModel::find($id);
        $res=redis::setnx('show_',$id,1);
        if($res){

        }

        return view('xiao.xiangqing',['goods'=>$data]);
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
        $res=XiaoModel::destroy($id);
            if($res){
                if(request()->ajax()){
                    echo json_encode(['code'=>'00000','msg'=>'删除成功']);die;   
              }
               return redirect('/xiaoqu');
          }
    }
}
