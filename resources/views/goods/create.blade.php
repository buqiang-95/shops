<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" href="/static/admin/css/bootstrap.min.css">  
<script type="text/javascript" src="/static/admin/js/jquery.js"></script> 
<script type="text/javascript" src="/static/admin/js/bootstrap.min.js"></script>
<script type="text/javascript" charset="utf-8" src="/static/ue/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/static/ue/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="/static/ue/lang/zh-cn/zh-cn.js"></script>
 
</head>
<body>
  <form class="form-horizontal" role="form" method="post" action="{{url('/goods/store')}}" enctype="multipart/form-data">
    @csrf
 
<ul id="myTab" class="nav nav-tabs">
  <li class="active">
    <a href="#home" data-toggle="tab">
       基础信息
    </a>
  </li>
  <li><a href="#ios" data-toggle="tab">商品相册</a></li>
  <li class="dropdown">
    <a href="#" id="myTabDrop1" class="dropdown-toggle" 
       data-toggle="dropdown">商品详情
      <b class="caret"></b>
    </a>
    <ul class="dropdown-menu" role="menu" aria-labelledby="myTabDrop1">
      <li><a href="#jmeter" tabindex="-1" data-toggle="tab">商品详情</a></li>
      <li><a href="#ejb" tabindex="-1" data-toggle="tab">ejb</a></li>
    </ul>
  </li>
</ul>
<div id="myTabContent" class="tab-content">
  <div class="tab-pane fade in active" id="home">
    <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">商品名称</label>
    <div class="col-sm-10">
      <input type="text" name="goods_name" id="firstname" placeholder="请输入商品名称">
      <b style="color:red"></b>
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">商品货号</label>
    <div class="col-sm-10">
      <input type="text" name="goods_sn" id="lastname" placeholder="请输入商品货号">
      <b style="color:red"></b>
    </div>
  </div>
   <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">商品品牌</label>
    <div class="col-sm-10">
      <select name="brand_id">
          <option value="0">--请选择商品品牌--</option>
        @foreach($data as $v)
          <option value="{{$v->brand_id}}">{{$v->brand_name}}</option>
          @endforeach
      </select>
    </div>
  </div>
   <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">商品分类</label>
    <div class="col-sm-10">
      <select name="cate_id">
          <option value="0">--请选择商品分类--</option>
         @foreach($categroy as $v)
          <option value="{{$v->cate_id}}">{{'|'.str_repeat('-',$v->level)}}{{$v->cate_name}}</option>
          @endforeach
      </select>
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">商品价格</label>
    <div class="col-sm-10">
      <input type="text" name="goods_price" id="lastname" placeholder="请输入商品价格"> 
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">商品库存</label>
    <div class="col-sm-10">
      <input type="text"  name="goods_number" id="lastname" placeholder="请插入商品库存">
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">商品缩略图</label>
    <div class="col-sm-10">
      <input type="file"  name="goods_img" id="lastname">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-danger">提交</button>
    </div>
  </div>
  </div>
  <div class="tab-pane fade" id="ios">
   <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">商品相册</label>
    <div class="col-sm-10">
      <input type="file"  name="goods_imgs" multiple="multiple" id="lastname">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-danger">提交</button>
    </div>
  </div>
  </div>
  
  <div class="tab-pane fade" id="jmeter">
         <div class="bbD">
            商品详情：&nbsp;&nbsp;&nbsp;
            <div class="btext">
              <script id="editor" name="content" type="text/plain" style="width:80%;height:300px;"></script>
            </div>
          </div>
          <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-danger">提交</button>
    </div>
  </div>
  </div>
  <div class="tab-pane fade" id="ejb"> 
  </div>
</div>
</form>
</body>
  <script type="text/javascript">
    $(function(){
       var ue = UE.getEditor('editor');
       // $('#add_btn').click(function(){
       //  $('#div_test').append('<input type="file" name="goods_images[]"><button type="button" class="del_btn">删除</button><br/>');
       // });
       // $('#div_test').on('click','.del_btn',function(){
        
       //  $(this).prev().remove();
       //  $(this).next().remove();
       //  $(this).remove();
       // });
    })
  </script>
</html>