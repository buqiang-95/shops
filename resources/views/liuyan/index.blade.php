<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/static/admin/css/bootstrap.min.css">
    <script src="/static/admin/js/jquery.js"></script>
</head>
<body>

<h3>品牌列表</h3>
<hr>
<h3>欢迎【<b>{{session('admin')->uname}}</b>】登陆 <a href="{{url('liuyan/logout')}}">退出登陆</a></h3>
<a href="{{url('liuyan/create')}}">继续留言</a>当前点击量：{{session('click_num')}}
<form>
    用户<input type="text" name="uname">
        <button>搜索</button>

</form>
<table class="table table-striped">
    <thead>
        <tr>
            <td>ID</td>
            <td>用户</td>
            <td>评论内容</td>
            <td>评论时间</td>
            <td>操作</td>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $v)
            <tr>
                <td>{{$v->l_id}}</td>
                <td>{{$v->uname}}</td>
                <td width="70%">{{$v->content}}</td>
                <td>{{date('Y-m-d H:i:s',$v->add_time)}}</td>
                <td>
                    @if(session('admin')->uid == $v->uid)
                        <a add_time="{{$v->add_time}}" l_id="{{$v->l_id}}" href="javascript:;" class="btn del btn-danger">删除</a>
                    @else
                        
                    @endif
                </td>
            </tr>
        @endforeach
         <tr>
        <td colspan="5">{{$data->appends($query??'')->links()}}</td>
   </tr>
    </tbody>
</table>

</body>
<script>
    $('.del').click(function(){
        alert(12);
        var add_time = $(this).attr('add_time');
        var l_id = $(this).attr('l_id');
        //alert(l_id);
        $.ajax({
            url:"{{url('liuyan/delete')}}",
            data:{add_time:add_time,l_id:l_id},
            type:'get',
            dataType:'json',
            success:function(json_info){
                if(json_info.status == 200){
                    alert(json_info.msg);
                    _this.parent().parent().remove();
                }
                if(json_info.status == 1){
                    alert(json_info.msg);
                }
                if(json_info.status == 2){
                    alert(json_info.msg);
                }
            }
        });
        return false;
    });

    $(document).ready(function(){
        $.ajax({
            url:"{{url('liuyan/click_num')}}",
            data:{num:1},
            type:'get',
            dataType:'json',
            success:function(json_info){
               
            }
        })
    });
    
</script>
</html>