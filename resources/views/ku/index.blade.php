<!DOCTYPE html>
<html>
<head>
	<title></title>
	    <link rel="stylesheet" href="/static/admin/css/bootstrap.min.css"> 
      <script type="text/javascript" src="/static/admin/js/jquery.js"></script> 
</head>
<body>
	<a href="{{url('/kuguan/create')}}">库管添加</a>
  <h2>欢迎<b style="color:red">{{session('kasa')['user_name']}}</b>登录,<a href="{{url('/kuguan/logout/')}}" style="color:blue">退出</a></h2>

  <table class="table table-bordered" border="1">

  <caption>边框表格布局</caption>
  <thead>
    <tr>
      <th>用户ID</th>
      <th>用户昵称</th>
      <th>用户身份</th>
      <th>添加时间</th>
      <th>操作</th>
    </tr>
  </thead>
  <tbody>
    @foreach($data as $v)
    <tr>
      <td>{{$v->uid}}</td>
      <td>{{$v->uname}}</td>
      <td>{{$v->ustatus}}</td>
      <td>{{date('Y-m-d H:i:s',$v->add_time)}}</td>
      <td>
      	<a  class="btn btn-info" href="{{url('/kuguan/edit/'.$v->uid)}}">编辑</a>||
      	<a href="{{url('/kuguan/delete/'.$v->uid)}}" class="btn btn-danger">删除</a>
      </td>
    </tr>
   @endforeach
   
  </tbody>
</table>
</body>
</html>