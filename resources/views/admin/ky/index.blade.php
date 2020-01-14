<!DOCTYPE html>
<html>
<head>
	<title></title>
	    <link rel="stylesheet" href="/static/admin/css/bootstrap.min.css">  
</head>
<body>
	<h3><a href="{{url('/student/create')}}">学生添加</a></h3>
	  <h2><caption>学生列表展示</caption></h2>
  <table class="table table-bordered" border="1">

  <thead>
    <tr>
      <th>学生ID</th>
      <th>学生名称</th>
      <th>学生性别</th>
      <th>学生班级</th>
      <th>操作</th>
    </tr>
  </thead>
  <tbody>
    @foreach($data as $v)
    <tr>
      <td>{{$v->k_id}}</td>
      <td>{{$v->k_name}}</td>
      <td>{{$v->k_sex}}</td>
      <td>{{$v->k_banji}}</td>
      <td>
      	<a  class="btn btn-info" href="{{url('/student/edit/'.$v->k_id)}}">编辑</a>||
      	<a href="{{url('/student/delete/'.$v->k_id)}}" class="btn btn-danger">删除</a>
      </td>
    </tr>
   @endforeach
   <tr>
   		<td colspan="5">{{$data->links()}}</td>
   </tr>
  </tbody>
</table>
</body>
</html>