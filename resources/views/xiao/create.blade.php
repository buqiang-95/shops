<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" href="/static/admin/css/bootstrap.min.css">  
</head>
<body>
  <form class="form-horizontal" role="form" method="post" action="{{url('/xiaoqu/store')}}" enctype="multipart/form-data">
    @csrf
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">小区名</label>
    <div class="col-sm-10">
     <input type="text" name="x_name" id="firstname" placeholder="请输入小区名">
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">地理</label>
    <div class="col-sm-10">
      <input type="text" name="x_dili" id="lastname" placeholder="请输入地理">
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">面积</label>
    <div class="col-sm-10">
      <input type="text"  name="x_mianji" id="lastname" placeholder="请输入面积">
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">导购员</label>
    <div class="col-sm-10">
      <input type="text"  name="x_dao" id="lastname" placeholder="请输入导购员">
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">联系电话</label>
    <div class="col-sm-10">
      <input type="text"  name="tel" id="lastname" placeholder="请输入联系电话">
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">楼盘主图</label>
    <div class="col-sm-10">
      <input type="file"  name="x_img" id="lastname">
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">楼盘主图相册</label>
      <div class="col-sm-10">
      <input type="file"  name="x_imgs" id="lastname"  multiple="multiple">
    </div>
  </div>
   <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">详情</label>
    <div class="col-sm-10">
      <textarea name="content"></textarea>
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