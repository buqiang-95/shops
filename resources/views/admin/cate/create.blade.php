<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" href="/static/admin/css/bootstrap.min.css">  
</head>
<body>
  <form class="form-horizontal" role="form" method="post" action="{{url('/cate/store')}}">
    @csrf
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">分类名称</label>
    <div class="col-sm-10">
      <input type="text" name="cate_name" id="firstname" placeholder="请输入分类名称">
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">父级ID</label>
    <div class="col-sm-10">
      <select name="parent_id">
          <option value="0">--请选择父级分类--</option>
          @foreach($data as $v)
          <option value="{{$v->cate_id}}">{{'|'.str_repeat('|—',$v->level)}}{{$v->cate_name}}</option>
          @endforeach
      </select>
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">是否显示</label>
    <div class="col-sm-10">
      <input type="radio"  name="is_show" value="1" checked="checked">是
      <input type="radio"  name="is_show" value="2">否
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">是否在导航栏上显示</label>
    <div class="col-sm-10">
      <input type="radio"  name="is_nav_show" value="1">显示
      <input type="radio"  name="is_nav_show" value="2" checked="checked">隐藏
  </div>
   <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-danger">提交</button>
    </div>
  </div>
</form>
</body>
</html>