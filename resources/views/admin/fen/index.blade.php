<!DOCTYPE html>
<html>
<head>
	<title></title>
	    <link rel="stylesheet" href="/static/admin/css/bootstrap.min.css"> 
      <script type="text/javascript" src="/static/admin/js/jquery.js"></script> 
</head>
<body>
	<a href="{{url('/fenlei/create')}}">分类添加</a>
  <table class="table table-bordered" border="1">
  <caption>边框表格布局</caption>
  <thead>
    <tr>
      <th>分类ID</th>
      <th>分类名称</th>
      <th>是否显示</th>
      <th>是否在导航栏上显示</th>
      <th>操作</th>
    </tr>
  </thead>
  <tbody>
    @foreach($data as $v)
    <tr>
      <td>{{$v->f_id}}</td>
      <td>{{'|'.str_repeat('—',$v->level)}}{{$v->f_name}}</td>
      <td>{{$v->is_show}}</td>
      <td>{{$v->is_nav_show}}</td>
      <td>
      	<a  class="btn btn-info" href="{{url('/fenlei/edit/'.$v->f_id)}}">编辑</a>||
      	<a href="{{url('/fenlei/delete/'.$v->f_id)}}" class="btn btn-danger">删除</a>
      </td>
    </tr>
   @endforeach
   
  </tbody>
</table>
</body>
</html>