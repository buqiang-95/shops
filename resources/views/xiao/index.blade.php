<!DOCTYPE html>
<html>
<head>
    <title></title>
        <link rel="stylesheet" href="/static/admin/css/bootstrap.min.css"> 
        <script type="text/javascript" src="/static/admin/js/jquery.js"></script>  
</head>
<body>
    <a href="{{url('/xiaoqu/create')}}">小区添加</a>
     <h2>欢迎<b style="color:red">{{session('kas')['user_name']}}</b>登录,<a href="{{url('/login/logout/')}}" style="color:blue">退出</a></h2>
    <table class="table table-bordered" border="1">
  <caption>边框表格布局</caption>
  <thead>
    <tr>
      <th>小区ID</th>
      <th>小区名</th>
      <th>地理</th>
      <th>面积</th>
      <th>导购员</th>
      <th>联系电话</th>
      <th>楼盘主图</th>
      <th>操作</th>

    </tr>
  </thead>
  <tbody>
    @foreach($data as $v)
    <tr>
      <td>{{$v->x_id}}</td>
      <td>{{$v->x_name}}</td>
      <td>{{$v->x_dili}}</td>
      <td>{{$v->x_mianji}}</td>
        <td>{{$v->x_dao}}</td>
         <td>{{$v->tel}}</td>  
      <td><img src="{{env('UPLOAD_URL')}}{{$v->x_img}}" width="100px" height="50px"/></td>
      <td>
        <a  class="btn btn-info" href="{{url('/xiaoqu/edit/'.$v->x_id)}}">编辑</a>||
        <a href="{href="javascript:void(0)" onclick="ajaxdelete({{$v->x_id}})" class="btn btn-danger">删除</a>||
         <a  class="btn btn-info" href="{{url('/xiaoqu/show/'.$v->x_id)}}">详情</a>
      </td>
    </tr>
   @endforeach
   <tr>
        <td colspan="8">{{$data->links()}}</td>
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
        $.get('xiaoqu/delete/'+id,function(res){
          if(res.code=='00000'){
            alert(res.msg);
              location.reload();
          }
        },'json');
     }
     </script>
</html>