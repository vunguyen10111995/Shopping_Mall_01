@extends('admin.index')
@section('content')
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br/>
                    {{ Form::open([
                        'method' => 'POST',
                        'action' => 'ColorController@store',
                        'class' => 'form-horizontal form-label-left',
                        'id'=>'demo-form2'
                        ]) }}
                        <div class="form-group">
                            {!! Form::label('labelname', trans('backend.namecolor'), ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::text('color_name', $value = null, $attribute = ['class' => 'form-control col-md-7 col-xs-12', "placeholder" => trans('backend.pleasecolorname')]) !!}  
                            </div>
                            @if ($errors->has('color_name'))
                            <span class="label label-danger">
                                <strong>{{ $errors->first('color_name') }}</strong>
                            </span>
                            @endif
                        </div>
                        {!! Form::label('labelstatus', trans('backend.status'), ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::checkbox('status', '1', true) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::submit(trans('backend.add'), ['class' => 'btn btn-primary glyphicon glyphicon-plus', 'id' => 'add']) !!}   
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection
