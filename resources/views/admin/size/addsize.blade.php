@extends('admin.index')
@section('content')
<div class="page-title">
@if(count($errors) > 0)
    <ul>
        @foreach($errors->all() as $error )  
        @endforeach
    </ul>
    @endif
    <div class="title_left">
        <h3>{{ trans('backend.add_size') }}</h3>
    </div>
</div>
<div class="clearfix"></div>
<div class="row">
    {{Form::open([
            'method' => 'POST',
            'action' => 'SizeController@store',
            'data-parsley-validate class'=>'form-horizontal form-label-left',
            'id'=>'demo-form2'
        ]) }}
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <div class="form-group">
                    {!! Form::label('labelsize', trans('backend.size'), array('class' => 'control-label col-md-3 col-sm-3 col-xs-12' )) !!}
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    {!! Form::text('size', $value = null, $attribute = ['class' => 'form-control col-md-7 col-xs-12', "placeholder" => trans('backend.pleasezise')]) !!}  
                    {!! $errors->first('size') !!}
                </div>
            </div>
           {!! Form::label('labelcom', trans('backend.status'), array('class' => 'control-label col-md-3 col-sm-3 col-xs-12')) !!}
            <div class="col-md-6 col-sm-6 col-xs-12">
                {!! Form::checkbox('status', '1', true) !!}
            </div>
            <div class="form-group">
                {!! Form::button(trans('backend.add'), array('class' => 'btn btn-primary glyphicon glyphicon-plus', 'id' => 'add')) !!}   
            </div>
        </div>
    </div>
</div>
{{ Form::close() }}
</div>
@endsection
