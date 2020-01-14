<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" href="/static/admin/css/bootstrap.min.css">  
   <script type="text/javascript" src="/static/admin/js/jquery.js"></script> 
</head>
<body>
  <form class="form-horizontal" role="form" method="post" action="{{url('/brand/store')}}" enctype="multipart/form-data">
    @csrf
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">品牌名称</label>
    <div class="col-sm-10">
      <input type="text" name="brand_name" id="firstname" placeholder="请输入商品名称">
      <b style="color:red">{{$errors->first('brand_name')}}</b>
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">品牌网址</label>
    <div class="col-sm-10">
      <input type="text" name="brand_url" id="lastname" placeholder="请输入商品网址">
      <b style="color:red">{{$errors->first('brand_url')}}</b>
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">品牌LOGE</label>
    <div class="col-sm-10">
      <input type="file"  name="brand_loge" id="lastname" >
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">品牌描述</label>
    <div class="col-sm-10">
      <textarea name="brand_desc" id="lastname" placeholder="请输入品牌描述"></textarea>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-danger">提交</button>
    </div>
  </div>
</form>
</body>
  <script type="text/javascript">
      $('input[name="brand_name"]').blur(function(){
         $(this).next().text('');
       var brand_name=$(this).val();
       var reg= /^[\u4e00-\u9fa5\w.]{1,16}$/;
       if(!reg.test(brand_name)){
          $(this).next().text('品牌名称需是中文、字母、数字、下划线、点和-组成长度为1-16位!');
            return ;
       }
      })
      $('input[name="brand_url"]').blur(function(){
         $(this).next().text(''); 
       var brand_url=$(this).val();
       var reg= /^http:\/\/*/;
       if(!reg.test(brand_url)){
          $(this).next().text('品牌网址需以http开头!');
            return ;
       }
      })

      $.get('/brand/checkOnly',{brand_name:brand_name},function(res){
          alert(res);
      })





      
  </script>
</html>