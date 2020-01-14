<!DOCTYPE html>
<html>
<head>
	<title></title>
	    <link rel="stylesheet" href="/static/admin/css/bootstrap.min.css"> 
      <script type="text/javascript" src="/static/admin/js/jquery.js"></script> 
</head>
<body>
	<a href="{{url('/books/create')}}">图书添加</a>
	 <form>
      图书名称<input type="text" name="b_name" value="{{$query['b_name']??''}}">
              <button class="btn btn-info">搜索</button>

   </form>

  <table class="table table-bordered" border="1">
  <caption>边框表格布局</caption>
  <thead>
    <tr>
      <th>图书ID</th>
      <th>图书名称</th>
      <th>图书作者</th>
      <th>图书价格</th>
      <th>操作</th>
    </tr>
  </thead>
  <tbody>
    @foreach($data as $v)
    <tr>
      <td>{{$v->b_id}}</td>
      <td><img src="{{env('UPLOAD_URL')}}{{$v->b_photo}}" width="100px" height="50px"/>{{$v->b_name}}</td>
      <td>{{$v->b_zz}}</td>
      <td>{{$v->b_price}}</td>
      <td>
      	<a  class="btn btn-info" href="{{url('/books/edit/'.$v->b_id)}}">编辑</a>||
      	<a href="{{url('/books/delete/'.$v->b_id)}}" class="btn btn-danger">删除</a>
      </td>
    </tr>
   @endforeach
   <tr>
   		<td colspan="5">{{$data->appends($query)->links()}}</td>
   </tr>
  </tbody>
</table>
</body>
       <script type="text/javascript">
      $('.pagination a').click(function(){
          var url=$(this).attr('href');
         $.post(url,function(res){
            alert(res);
         });
      });

    </script>
</html>