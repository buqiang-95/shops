<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="{{url('/dologin')}}" method="post">
		@csrf
		<input type="text" name="name">
		<input type="password" name="password">
		<button>提交</button>
	</form>
</body>
</html>