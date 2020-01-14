<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" href="/static/admin/css/bootstrap.min.css">  
</head>
<body>
  <form class="form-horizontal" role="form" method="post" action="{{url('/kuguan/store')}}">
    @csrf
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">用户昵称</label>
    <div class="col-sm-10">
      <input type="text" name="uname" id="firstname" placeholder="请输入用户昵称">
    </div>
  </div>
   <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">用户身份</label>
    <div class="col-sm-10">
      <input type="radio"  name="ustatus" value="1" checked="checked">主管
      <input type="radio"  name="ustatus" value="2">库管员
    </div>
  </div>
   <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-danger">提交</button>
    </div>
  </div>
</form>
</body>
</html>