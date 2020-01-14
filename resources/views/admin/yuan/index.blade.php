<!DOCTYPE html>
<html>
<head>
    <title></title>
        <link rel="stylesheet" href="/static/admin/css/bootstrap.min.css">  
</head>
<body>
    <a href="{{url('/yuan/create')}}">商品添加</a>
    <table class="table table-bordered" border="1">
  <caption>边框表格布局</caption>
  <thead>
    <tr>
      <th>员工ID</th>
      <th>员工名称</th>
      <th>员工工号</th>
      <th>员工部门</th>
      <th>操作</th>
    </tr>
  </thead>
  <tbody>
    @foreach($data as $v)
    <tr>
      <td>{{$v->b_id}}</td>
      <td><img src="{{env('UPLOAD_URL')}}{{$v->brand_loge}}" width="100px" height="50px"/>
      {{$v->b_name}}</td>
      <td>{{$v->gonghao}}</td>
      <td>{{$v->bumen}}</td>
      <td>
        <a  class="btn btn-info" href="{{url('/yuan/edit/'.$v->b_id)}}">编辑</a>||
        <a href="{{url('/yuan/delete/'.$v->b_id)}}" class="btn btn-danger">删除</a>
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