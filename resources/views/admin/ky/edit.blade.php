<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" href="/static/admin/css/bootstrap.min.css">  
</head>
<body>
  <form class="form-horizontal" role="form" method="post" action="{{url('/student/update/'.$data->k_id)}}">
    @csrf
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">学生名称</label>
    <div class="col-sm-10">
      <input type="text" name="k_name" value="{{$data->k_name}}" id="firstname" placeholder="请输入名字">
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">学生性别</label>
    <div class="col-sm-10">
      <input type="text" name="k_sex" value="{{$data->k_sex}}" id="lastname" placeholder="请输入性别">
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">学生班级</label>
    <div class="col-sm-10">
      <input type="text"  name="k_banji" value="{{$data->k_banji}}" id="lastname" placeholder="请输入学生班级">
    </div>
  </div>
  <  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-danger">提交</button>
    </div>
  </div>
</form>
</body>
</html>