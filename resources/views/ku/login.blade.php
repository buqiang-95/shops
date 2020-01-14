<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" href="/static/admin/css/bootstrap.min.css">  
</head>
<body>
  <form class="form-horizontal" role="form" method="post" action="{{url('/kuguan/do_login')}}">
    @csrf
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">用户名</label>
    <div class="col-sm-10">
      <input type="text" name="user_name" id="firstname" placeholder="请输入用户名">
    </div>
  </div>

  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">密码</label>
    <div class="col-sm-10">
      <input type="text" name="user_pwd" id="lastname" placeholder="请输入密码">
  </div>
</div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-danger">登陆</button>
    </div>
  </div>
</form>
</body>
</html>