<!DOCTYPE html>
<html>
<head>
	<title></title>
	    <link rel="stylesheet" href="/static/admin/css/bootstrap.min.css"> 
      <script type="text/javascript" src="/static/admin/js/jquery.js"></script> 
</head>
<body>
	<h1><a href="{{url('/brand/create')}}" style="color:purple">商品添加</a></h1>
  <h2>欢迎<b style="color:red">{{session('kas')['user_name']}}</b>登录,<a href="{{url('/user/logout/')}}" style="color:blue">退出</a></h2>
  <!-- <b style="color:red">{{session('kas')}}</b> -->
	 <form>
      商品名称<input type="text" name="brand_name" value="{{$query['brand_name']??''}}">
              <button class="btn btn-info">搜索</button>

   </form>

  <table class="table table-bordered" border="1">
  <caption>边框表格布局</caption>
  <thead>
    <tr>
      <th>商品ID</th>
      <th>商品名称</th>
      <th>商品网址</th>
      <th>商品描述</th>
      <th>操作</th>
    </tr>
  </thead>
  <tbody>
    @foreach($data as $v)
    <tr>
      <td>{{$v->brand_id}}</td>
      <td><img src="{{env('UPLOAD_URL')}}{{$v->brand_loge}}" width="100px" height="50px"/>{{$v->brand_name}}</td>
      <td>{{$v->brand_url}}</td>
      <td>{{$v->brand_desc}}</td>
      <td>
      	<a  class="btn btn-info" href="{{url('/brand/edit/'.$v->brand_id)}}">编辑</a>||
      	<a href="{{url('/brand/delete/'.$v->brand_id)}}" class="btn btn-danger">删除</a>
      </td>
    </tr>
   @endforeach
   <tr>
   		<td colspan="5">{{$data->appends($query)->links()}}</td>
   </tr>
  </tbody>
</table>
</body>
   <!--  <script type="text/javascript">
      $('.pagination a').click(function(){
          var url=$(this).attr('href');
         $.post(url,function(res){
            alert(res);
         });
      });

    </script> -->
</html>