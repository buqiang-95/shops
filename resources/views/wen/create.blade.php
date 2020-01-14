<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" href="/static/admin/css/bootstrap.min.css">  
</head>
<body>
  <form class="form-horizontal" role="form" method="post" action="{{url('/wen/store')}}" enctype="multipart/form-data">
    @csrf
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">文章名称</label>
    <div class="col-sm-10">
      <input type="text" name="w_name" id="firstname" placeholder="请输入文章名称">
      <b style="color:red">{{$errors->first('w_name')}}</b>
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">文章分类</label>
    <div class="col-sm-10">
     <select name="f_id">
        <option>--请选择--</option>

      @foreach($data as $v)
          <option value="{{$v->f_id}}">{{$v->f_name}}</option>
      @endforeach
     </select>
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">重要性</label>
    <div class="col-sm-10">
      <input type="radio"  name="zhong" value="1" checked="checked">普通
      <input type="radio"  name="zhong" value="2">置顶
       <!-- <b style="color:red">{{$errors->first('zhong')}}</b> -->
  </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">是否显示</label>
    <div class="col-sm-10">
      <input type="radio"  name="is_show" value="1" checked="checked">是
      <input type="radio"  name="is_show" value="2">否
       <!-- <b style="color:red">{{$errors->first('is_show')}}</b> -->
    </div>
  </div>
   <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">文章作者</label>
    <div class="col-sm-10">
      <input name="w_zz" id="lastname" placeholder="请输入文章作者">
    </div>
  </div>
   <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">文章邮箱</label>
    <div class="col-sm-10">
      <input name="w_email" id="lastname" placeholder="请输入文章邮箱">
    </div>
  </div>
   <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">详细描述</label>
    <div class="col-sm-10">
      <textarea name="w_desc" id="lastname" placeholder="请输入详细描述"></textarea>
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">文章LOGE</label>
    <div class="col-sm-10">
      <input type="file"  name="photo" id="lastname" placeholder="请输入文章LOGE">
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