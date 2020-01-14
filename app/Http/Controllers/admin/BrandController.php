<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BrandModel;
use DB;
class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *列表
     * @return \Illuminate\Http\Response
     */ 
    public function index()
    {
        //showMsg(1,'Hello World!');
       $brand_name=request()->brand_name;
       $where=[];
       if($brand_name){
        $where[]=['brand_name','like',"%$brand_name%"];
       }
       DB::connection()->enableQueryLog();
        $data=BrandModel::where($where)->orderBy('brand_id','desc')->paginate(3);
        
        $logs = DB::getQueryLog();

        //dump($logs);
        $query=request()->all();

        return view('admin.brand.index',['data'=>$data,'query'=>$query]);
    }

    /**
     * Show the form for creating a new resource.
     *添加
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *执行添加
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        //验证
        $request->validate([
         'brand_name' => 'required|unique:shop_brand|max:255',
         'brand_url' => 'required|unique:shop_brand'
        ],[

            'brand_name.required'=>"品牌名称必填",
            'brand_name.unique'=>"品牌名称已存在",
            'brand_url.required'=>'品牌网址必填!'
        ]);

        $post=$request->except('_token');
       // dump($post);
        //文件上传
        if($request->hasFile('brand_loge')){
            $post['brand_loge']=$this->upload('brand_loge');
        }
        //dd($post);
        $res=BrandModel::insert($post);
        //dd($res);
    if($res){
        return redirect('/brand');
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
         
        exit('没有文件上传或者文件上传失败');
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
       // echo $id;die;
        $data=BrandModel::find($id);
        return view('admin.brand.edit',['data'=>$data]);
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
        //dd($post);
        if($request->hasFile('brand_loge')){
            $post['brand_loge']=$this->upload('brand_loge');
        }
        exit('修改文件失败');
        //dd($post);
        $res=BrandModel::where('brand_id',$id)->update($post);
        dd($res);
        if($res!==false){
            return redirect('/brand');
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
       
        $res=BrandModel::destroy($id);
        if($res){
            return redirect('/brand');
        }
    }
    //ajax唯一性验证
    function checkOnly(){
        $brand_name=request()->brand_name;
        echo $brand_name;
    }

}
