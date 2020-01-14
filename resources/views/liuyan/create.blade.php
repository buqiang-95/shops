<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/static/bootstrap/css/bootstrap.min.css">
    <script src="/static/bootstrap/jquery/2.1.1/jquery.min.js"></script>
    <script src="/static/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<h3>评论添加</h3>
<hr>

<form class="form-horizontal" role="form" action="{{url('liuyan/store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label"></label>
        <div class="col-sm-10">
        <textarea class="form-control" name="content" rows="3"></textarea>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">评论</button>
        </div>
    </div>
</form>
</body>
</html>

