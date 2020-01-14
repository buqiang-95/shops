<!DOCTYPE html>
<html>
<head>
	<title></title>
	    <link rel="stylesheet" href="/static/admin/css/bootstrap.min.css"> 
      <script type="text/javascript" src="/static/admin/js/jquery.js"></script> 
</head>
<body>
	 <h1><a href="{{url('/wen/create')}}" style="color:purple">文章添加</a></h1>
  <!-- <h2>欢迎<b style="color:red">{{session('kas')['user_name']}}</b>登录,<a href="{{url('/user/logout/')}}" style="color:blue">退出</a></h2>  -->
  <form>
    商品名称<input type="text" name="w_name" value="{{$query['w_name']??''}}">
    <select name="f_id">
      <option value="">--请选择--</option>
      @foreach($akss as $v)
          <option value="{{$v->f_id}}" @if (isset($query['f_id']) && $v->f_id==$query['f_id'] )selected @endif)>{{$v->f_name}}</option>
      @endforeach
    </select>
              <button class="btn btn-info">搜索</button>

  </form>
      
   

  <table class="table table-bordered" border="1">
  <caption>边框表格布局</caption>
  <thead>
    <tr>
      <th>文章ID</th>
      <th>文章名称</th>
      <th>文章分类</th>
      <th>重要性</th>
      <th>是否显示</th>
      <th>添加时间</th>
      <th>操作</th>
    </tr>
  </thead>
  <tbody>
    @foreach($data as $v)
    <tr>
      <td>{{$v->w_id}}</td>
      <td><img src="{{env('UPLOAD_URL')}}{{$v->photo}}" width="100px" height="50px"/>{{$v->w_name}}</td>
      <td>{{$v->f_name}}</td>
      <td>{{$v->zhong}}</td>
      <td>{{$v->is_show}}</td>
      <td>{{date('Y-m-d H:i:s',$v->add_time)}}</td>


      <td>
      	<a  class="btn btn-info" href="{{url('/wen/edit/'.$v->w_id)}}">编辑</a>||
      	<a href="javascript:void(0)" onclick="ajaxdelete({{$v->w_id}})" class="btn btn-danger">删除</a>
      </td>
    </tr>
   @endforeach
   <tr>
   		<td colspan="7">{{$data->appends($query)->links()}}</td>
   </tr>
  </tbody>
</table>
</body>
   <script type="text/javascript">
     // ajax删除
     function ajaxdelete(id){
      // alert(id)
        if(!id){
          return alert('Id不正确');
        }
        $.get('wen/delete/'+id,function(res){
          if(res.code=='00000'){
            alert(res.msg);
              location.reload();
          }
        },'json');
     }


   



   //ajax分页
      $('.pagination a').click(function(){
          var url=$(this).attr('href');
         $.get(url,function(res){
            $('tbody').html(res);
         });
      });

    </script>
</html>