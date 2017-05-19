@extends('admin.index')
@section('content')
<div class="page-title">
    <div class="title_left">
        <h3>{{ trans('backend.factory') }}</h3>
    </div>
</div>
<div class="clearfix"></div>
<table class="table table-striped table-bordered detail-view">
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
            $stt = $stt++;
        @endphp
        <tr>
            <td>{!! $stt !!}</td>
            <td>{!! $value->factory_name !!}</td>
            <td><img src="{!! $value->factory_logo !!}"  width="130px"></td>
            <td>{!! $value->factory_website !!}</td>
            <td>{!! date('d-m-y h:i:s', strtotime($value->created_at)) !!}</td>
            <td>{!! date('d-m-y h:i:s', strtotime($value->updated_at)) !!}</td>
            <td>
                @if( $value->status == 1 )
                {{ Form::label('txthienthi', trans('backend.show'), ['class' => 'label label-success']) }}
                @else
                {{ Form::label('txthan', trans('backend.hide'), ['class' => 'label label-danger']) }}
                @endif
            </td>
            <td>
                {{ Form::open(array('route' => array('factory-list.destroy', $value->id), 'method' => 'DELETE', 'id' => 'delForm')) }} 
                {{ Form::button(trans('backend.view'), ['class' => 'btn btn btn-success list-factory fa fa-list', 'data-id' => $value->id]) }}
                <a href="{!! route('factory-list.edit', $value->id)!!}"  class="btn btn-sm btn-primary">{{ trans('backend.edit') }}</a>
                <button onclick="return xacnhanxoa()" type="button"  id="delete" class="btn btn-danger btn-sm">
                    <i class="fa fa-trash-o" aria-hidden="true"></i>{{ trans('backend.delete')}}
                </button>
                {!!  Form::close() !!}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<a href="{{ action('FactoryController@create') }}" class="btn btn btn-primary ">
    {{ trans('backend.add')}} <i class="fa fa-plus" aria-hidden="true"></i>
</a>
</div>
@endsection