<?php

namespace App\Http\Controllers\liuyan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\LiuModel;
use App\UserModel;
use DB;
class LiuyanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = cache('comdata');
         // dump($data);
        $uname=request()->uname;
        $where=[];
        if($uname){
            $where[]=['uname','like',"%$uname%"];
        }
        if(!$data){
            echo "数据库";
            $data = LiuModel::select('liuyan.*','ku_user.uid','ku_user.uname')
            ->leftjoin('ku_user','liuyan.uid','=','ku_user.uid')
            ->where($where)
            ->orderBy('l_id','desc')
            ->paginate(3);
            

        //dump($logs);
            
            cache(['comdata'=>$data],5);
        }
        $logs = DB::getQueryLog();
          $query=request()->all();
       // dd($data);
         return view('liuyan.index',['data'=>$data,'query'=>$query]);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('liuyan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $post = $request->except('_token');
        $uid = $request->session()->get('admin');
        $post['uid'] = $uid->uid;
        $post['add_time'] = time();
        // \dd($post);
        $res = LiuModel::insert($post);
    if($res){
        return redirect('/liuyan');
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
       if(\request()->ajax()){
            $post = \request()->input();
            // dd($post);
            if($post['add_time']+1800 < time()){
                echo json_encode(['status'=>1,'msg'=>'超过半小时不能删除']);die;
            }
            $res = LiuModel::where('l_id',$post['l_id'])->delete();
            if($res){
                echo json_encode(['status'=>200,'msg'=>'删除成功']);die;
            }else{
                echo json_encode(['status'=>2,'msg'=>'删除失败']);die;
            }
        }
    }
     /**
     * 点击量
     */
    public function click_num(){
        $this_num = \request()->input('num');
        // request()->session()->put('click_num',$num);
        $click_num = \request()->session()->get('click_num');
        request()->session()->put('click_num',$click_num+$this_num);
        $num = \request()->session()->get('click_num');
        
    }
}
