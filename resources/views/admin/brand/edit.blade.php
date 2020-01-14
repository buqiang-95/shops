<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" href="/static/admin/css/bootstrap.min.css">  
</head>
<body>
  <form class="form-horizontal" role="form" method="post" action="{{url('/brand/update/'.$data->brand_id)}}" enctype="multipart/form-data">
    @csrf

  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">品牌名称</label>
    <div class="col-sm-10">
      <input type="text" name="brand_name" id="firstname" value="{{$data->brand_name}}" placeholder="请输入名字">
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">品牌网址</label>
    <div class="col-sm-10">
      <input type="text" name="brand_url" id="lastname" value="{{$data->brand_url}}" placeholder="请输入姓">
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">品牌LOGE</label>
    <div class="col-sm-10">
      <img src="{{env('UPLOAD_URL')}}{{$data->brand_loge}}" width="100px" height="50px"/>
      <input type="file"  name="brand_loge" id="lastname" placeholder="请输入姓">
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">品牌描述</label>
    <div class="col-sm-10">
      <textarea name="brand_desc" id="lastname" placeholder="请输入品牌描述">{{$data->brand_desc}}</textarea>
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