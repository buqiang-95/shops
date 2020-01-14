<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>{{$goods->x_name}}</title>
	<link rel="stylesheet" href="/static/admin/css/bootstrap.min.css"> 
</head>
<body>
	<h3>{{$goods->x_name}}</h3>
	<hr/>
	<img src="{{env('UPLOAD_URL')}}{{$goods->x_img}}" width="100px" height="50px"/>
	<p style="color:blue">{{$goods->content}}</p>
	<button>购买</button>
</body>
</html>