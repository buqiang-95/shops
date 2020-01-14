@foreach($data as $v)
    <tr>
      <td>{{$v->w_id}}</td>
      <td><img src="{{env('UPLOAD_URL')}}{{$v->photo}}" width="100px" height="50px"/>{{$v->w_name}}</td>
      <td>{{$v->f_name}}</td>
      <td>{{$v->zhong}}</td>
      <td>{{$v->is_show}}</td>
      <td>{{date('Y-m-d H:i:s',$v->add_time)}}</td>


      <td>
      	<a  class="btn btn-info" href="{{url('/wen/edit/'.$v->w_id)}}">编辑</a>||
      	<a href="javascript:void(0)" onclick="ajaxdelete({{$v->w_id}})" class="btn btn-danger">删除</a>
      </td>
    </tr>
   @endforeach
   <tr>
   		<td colspan="7">{{$data->appends($query)->links()}}</td>
   </tr>
  </tbody>