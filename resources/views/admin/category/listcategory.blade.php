@extends('admin.index')
@section('content')
<div class="page-title">
    <div class="title_left">
        <h3>{{ trans('backend.category') }}</h3>
    </div>
</div>
<div class="clearfix"></div>
<div class="col-6">
</div>
</div>
<table class="table table-striped table-bordered detail-view">
    <thead>
        <tr>
            <th>{{ trans('backend.stt') }}</th>
            <th>{{ trans('backend.nameparentcate') }}</th>
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
        @foreach($cate as $value)
        @php 
            $stt = $stt++;
        @endphp
        <tr>
            <td>{!! $stt !!}</td>
            <td>
                {!! $value->cate_name !!}
            </td>
            <td>{!! date('d-m-y h:i:s', strtotime($value->created_at)) !!}</td>
            <td>{!! date('d-m-y h:i:s', strtotime($value->updated_at)) !!}</td>
            <td>
                @if($value->status == 1)
                {{ Form::label('txthienthi', trans('backend.show'), ['class' => 'label label-success']) }}
                @else
                {{ Form::label('txthan', trans('backend.hide'), ['class' => 'label label-danger']) }}
                @endif
            </td>
            <td>
                {!! Form::open(array('route' => array('category-list.destroy', $value->id), 'method' => 'DELETE', 'id' => 'delForm')) !!} 
                {{ Form::button(trans('backend.view'), ['class' => 'btn btn btn-success list fa fa-list', 'data-id' => $value->id]) }}
                {{ Form::button(trans('backend.edit'), ['class' => 'btn btn btn-primary edit fa fa-pencil', 'data-id' => $value->id]) }}
                <button onclick="return xacnhanxoa()" type="button"  id="delForm" class="btn btn-danger btn-sm">
                    <i class="fa fa-trash-o" aria-hidden="true"></i>{{ trans('backend.delete') }}
                </button>
                {!! Form::close() !!}
            </td>
        </tr>
        @endforeach()
    </tbody>
</table>
<a href="{{ action('CategoryController@create') }}" class="btn btn btn-primary ">
    {{ trans('backend.add')}} <i class="fa fa-plus" aria-hidden="true"></i>
</a>
</div>
@endsection
