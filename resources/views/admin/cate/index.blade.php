<!DOCTYPE html>
<html>
<head>
	<title></title>
	    <link rel="stylesheet" href="/static/admin/css/bootstrap.min.css"> 
      <script type="text/javascript" src="/static/admin/js/jquery.js"></script> 
</head>
<body>
	<a href="{{url('/cate/create')}}">分类添加</a>
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
      <td>{{$v->cate_id}}</td>
      <td>{{'|'.str_repeat('—',$v->level)}}{{$v->cate_name}}</td>
      <td>{{$v->is_show}}</td>
      <td>{{$v->is_nav_show}}</td>
      <td>
      	<a  class="btn btn-info" href="{{url('/cate/edit/'.$v->cate_id)}}">编辑</a>||
      	<a href="{{url('/cate/delete/'.$v->cate_id)}}" class="btn btn-danger">删除</a>
      </td>
    </tr>
   @endforeach
   
  </tbody>
</table>
</body>
</html>