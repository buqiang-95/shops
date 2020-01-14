<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" href="/static/admin/css/bootstrap.min.css">  
</head>
<body>
  <form class="form-horizontal" role="form" method="post" action="{{url('/books/store')}}" enctype="multipart/form-data">
    @csrf
 
<ul id="myTab" class="nav nav-tabs">
  <li class="active">
    <a href="#home" data-toggle="tab">
       菜鸟教程
    </a>
  </li>
  <li><a href="#ios" data-toggle="tab">iOS</a></li>
  <li class="dropdown">
    <a href="#" id="myTabDrop1" class="dropdown-toggle" 
       data-toggle="dropdown">Java 
      <b class="caret"></b>
    </a>
    <ul class="dropdown-menu" role="menu" aria-labelledby="myTabDrop1">
      <li><a href="#jmeter" tabindex="-1" data-toggle="tab">jmeter</a></li>
      <li><a href="#ejb" tabindex="-1" data-toggle="tab">ejb</a></li>
    </ul>
  </li>
</ul>
<div id="myTabContent" class="tab-content">
  <div class="tab-pane fade in active" id="home">
    <p>菜鸟教程是一个提供最新的web技术站点，本站免费提供了建站相关的技术文档，帮助广大web技术爱好者快速入门并建立自己的网站。菜鸟先飞早入行——学的不仅是技术，更是梦想。</p>
  </div>
  <div class="tab-pane fade" id="ios">
    <p>iOS 是一个由苹果公司开发和发布的手机操作系统。最初是于 2007 年首次发布 iPhone、iPod Touch 和 Apple 
      TV。iOS 派生自 OS X，它们共享 Darwin 基础。OS X 操作系统是用在苹果电脑上，iOS 是苹果的移动版本。</p>
  </div>
  <div class="tab-pane fade" id="jmeter">
    <p>jMeter 是一款开源的测试软件。它是 100% 纯 Java 应用程序，用于负载和性能测试。</p>
  </div>
  <div class="tab-pane fade" id="ejb">
    <p>Enterprise Java Beans（EJB）是一个创建高度可扩展性和强大企业级应用程序的开发架构，部署在兼容应用程序服务器（比如 JBOSS、Web Logic 等）的 J2EE 上。
    </p>
  </div>
</div>

  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">图书名称</label>
    <div class="col-sm-10">
      <input type="text" name="b_name" id="firstname" placeholder="请输入图书名称">
      <b style="color:red">{{$errors->first('b_name')}}</b>
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">图书作者</label>
    <div class="col-sm-10">
      <input type="text" name="b_zz" id="lastname" placeholder="请输入图书作者">
      <b style="color:red">{{$errors->first('b_zz')}}</b>
    </div>
  </div>、
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">图书价格</label>
    <div class="col-sm-10">
      <input type="text" name="b_price" id="lastname" placeholder="请输入图书价格"> 
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">图书封面</label>
    <div class="col-sm-10">
      <input type="file"  name="b_photo" id="lastname" placeholder="请插入图书封面">
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