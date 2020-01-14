<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" href="/static/admin/css/bootstrap.min.css">  
</head>
<body>
  <form class="form-horizontal" role="form" method="post" action="{{url('/yuan/store')}}" enctype="multipart/form-data">
    @csrf
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">员工名称</label>
    <div class="col-sm-10">
      <input type="text" name="b_name" id="firstname" placeholder="请输入员工名称">
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">员工工号</label>
    <div class="col-sm-10">
      <input type="text" name="gonghao" id="lastname" placeholder="请输入员工工号">
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">员工部门</label>
    <div class="col-sm-10">
      <input type="text"  name="bumen" id="lastname" placeholder="请输入员工部门">
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">员工头像</label>
    <div class="col-sm-10">
      <input type="file"  name="photo" id="lastname" placeholder="请输入员工头像">
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