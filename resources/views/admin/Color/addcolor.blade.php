@extends('admin.index')
@section('content')
<div class="page-title">
    @if(count($errors) > 0)
    <ul>
        @foreach($errors->all() as $error )
        <li> {!! $error !!}</li>
        @endforeach
    </ul>
    @endif
    <div class="title_left">
        <h3>{{trans('backend.add color')}}</h3>
    </div>
</div>
<div class="clearfix"></div>
<div class="row">
    {{Form::open([
            'method' => 'POST', 
            'action' => 'ColorController@store', 
            'data-parsley-validate class' => 'form-horizontal form-label-left',
            'id'=>'demo-form2'
         ]) }}
    {{ Form::token() }} 
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <div class="form-group">
                    {!! Form::label('labelname', trans('backend.namecolor'), array('class' => 'control-label col-md-3 col-sm-3 col-xs-12')) !!}
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        {!! Form::text('color', $value = null, $attribute = ['class' => 'form-control col-md-7 col-xs-12', "placeholder" => trans('backend.pleasecolorname')]) !!}  
                        {!! $errors->first('color') !!}
                    </div>
                </div>
                {!! Form::label('labelstatus', trans('backend.status'), array('class' => 'control-label col-md-3 col-sm-3 col-xs-12')) !!}
                <div class="col-md-6 col-sm-6 col-xs-12">
                    {!! Form::checkbox('status', '1', true) !!}
                </div>
                <div class="form-group">
                {!! Form::submit(trans('backend.add'), array('class' => 'btn btn-primary glyphicon glyphicon-plus', 'id' => 'add')) !!}   
            </div>
        </div>
    </div>
</div>
{{ Form::close() }}
</div>
@endsection
