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
        <h3>{{ trans('backend.factory') }}</h3>
    </div>
</div>
<div class="clearfix"></div>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>{{ trans('backend.stt') }}</th>
            <th>{{ trans('backend.factory-name') }}</th>
            <th>{{ trans('backend.logo') }}</th>
            <th>{{ trans('backend.website') }}</th>
            <th>{{ trans('backend.creat_at') }}</th>
            <th>{{ trans('backend.update_at') }}</th>
            <th>{{ trans('backend.status') }}</th>
            <th>{{ trans('backend.action') }}</th>
        </tr>
    </thead>
    <tbody>
        @php 
            $stt = 0; 
        @endphp
        @foreach($factory as $value)
        @php
            $stt=$stt++; 
        @endphp
        <tr>
            <td>{!! $value->stt !!}</td>
            <td>{!! $value->factory_name !!}</td>
            <td>{!! date('d-m-y h:i:s', strtotime($value->created_at)) !!}</td>
            <td>{!! date('d-m-y h:i:s', strtotime($value->updated_at)) !!}</td>
            <td> <img src="{!!$value->factory_logo!!}" alt="" width="120" ></td>
            <td>
                @if($value->status == 1)
                {{ Form::label('txthienthi', trans('backend.show'), array('class' => 'label label-success')) }}
                @else
                {{ Form::label('txthan', trans('backend.hide'), array('class' => 'label label-danger')) }}
            </td>
            <th >
                {{ Form::button(trans('backend.view'), array('class' => 'btn btn btn-success listfactory fa fa-list ', 'data-id' => $value->id)) }}
                {{ Form::button(trans('backend.edit'), array('class' => 'btn btn btn-primary xoafactory fa fa-pencil ', 'data-id' => $value->id)) }}
                {!!Form::open(array('route'=>array('category-list.destroy', $value->id), 'method' => 'DELETE')) !!}
                {!! Form::close() !!}
            </th>
        </tr>
        @endforeach
    </tbody>
</table>
<a href="{{ action('ColorController@create') }}" class="btn btn btn-primary ">
    {{ trans('backend.add')}}<i class="fa fa-plus" aria-hidden="true"></i>
</a>
</div>
@endsection
