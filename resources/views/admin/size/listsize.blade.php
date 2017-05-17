@extends('admin.index')
@section('content')
<script type="text/javascript">
    function xacnhanxoa(msg) {
        if (window.confirm(msg)) {
            return true;
        }
        return false;
    }
</script>
<div class="page-title">
    <div class="title_left">
    <h3>{{ trans('backend.size') }}</h3>
    </div>   
</div>
<div class="clearfix"></div>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>{{ trans('backend.stt') }}</th>
            <th>{{ trans('backend.size') }}</th>
            <th>{{ trans('backend.creat_at') }}</th>
            <th>{{ trans('backend.update_at') }}</th>
            <th>{{ trans('backend.status') }}</th>
            <td>{{ trans('backend.action') }}</td>
        </tr>
    </thead>
    <tbody>
        @php 
            $stt = 0; 
        @endphp
        @foreach($size as $value)
        @php 
            $stt = $stt++; 
        @endphp
        <tr>
            <td>{!! $stt !!}</td>
            <td>{!! $value->size_name !!}</td>
            <td>{!! date('d-m-y h:i:s', strtotime($value->created_at)) !!}</td>
            <td>{!! date('d-m-y h:i:s', strtotime($value->updated_at)) !!}</td>
            <td>
                @if($value->status == 1)
                {{ Form::label('txthienthi', trans('backend.show'), array('class' => 'label label-success')) }}
                @else
                {{ Form::label('txthan', trans('backend.hide'), array('class' => 'label label-danger')) }}
                @endif
            </td>

            <td>
                {!!Form::open(array('route' => array('size-list.destroy', $value->id), 'method' => 'DELETE', 'id' => 'delete')) !!}
                {{ Form::button(trans('backend.view'), array('class' => 'btn btn btn-success listsize fa fa-list ', 'data-id' => $value->id)) }}
                {{ Form::button(trans('backend.edit'), array('class' => 'btn btn btn-primary xoasize fa fa-pencil ', 'data-id' => $value->id)) }}
                <button onclick="return xacnhanxoa(trans('backend.areyouwantdelete'))" type="submit"  id="delete" class="btn btn-danger btn-sm">
                    <i class="fa fa-trash-o" aria-hidden="true"></i>{{ trans('backend.delete')}}
                </button>
                {!! Form::close() !!}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<a href="{{ action('SizeController@create') }}" class="btn btn btn-primary "> 
    {{ trans('backend.add')}} <i class="fa fa-plus" aria-hidden="true"></i>
</a>
</div>
@endsection
