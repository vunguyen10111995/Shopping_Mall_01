@extends('admin.index')
@section('content')
<div class="page-title">
    <div class="title_left">
        <h3>{{ trans('backend.add-factory') }}</h3>
    </div>
</div>
<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br/>
                {{Form::open([
                        'method' => 'POST',
                        'action' => 'FactoryController@store',
                        'data-parsley-validate class' => 'form-horizontal form-label-left',
                        'id'=>'demo-form2'
                    ]) }}
                <div class="form-group">
                    {!! Form::label('labelcom', trans('backend.company'), ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        {!! Form::text('factory_name', $value = null, $attribute = ['class' => 'form-control col-md-7 col-xs-12', "placeholder" => trans('backend.pleasecompanyname')]) !!}                    </div>
                    @if ($errors->has('factory_name'))
                    <span class="label label-danger">
                        <strong>{{ $errors->first('factory_name') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="row">
                    <div class="form-group">
                        {!! Form::label('labellogo', trans('backend.logo'), ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::text('logo', $value = null, $attribute = ['class' => 'form-control col-md-7 col-xs-12', "placeholder" => trans('backend.pleaselogocompany'),'id' => 'image']) !!} 
                            <a href="#" class="btn btn-sm btn-success" id="select-logo"> {{trans('backend.select-image') }}</a>
                            <a href="#" class="btn btn-sm btn-danger" id="remove-logo">{{trans('backend.remove-image') }}</a>
                        </div>
                        @if ($errors->has('logo'))
                        <span class="label label-danger">
                            <strong>{{ $errors->first('logo') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('txtweb', trans('backend.web'), ['class' => 'control-label col-md-3 col-sm-3 col-xs-12' ]) !!}
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        {!! Form::text('website', $value = null, $attribute = ['class' => 'form-control col-md-7 col-xs-12', "placeholder" => trans('backend.pleasefillweb'),'id' => 'image']) !!} 
                    </div>
                    @if ($errors->has('website'))
                    <span class="label label-danger">
                        <strong>{{ $errors->first('website') }}</strong>
                    </span>
                    @endif
                </div>
                {!! Form::label('labelstaus', trans('backend.status'), ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                <div class="col-md-6 col-sm-6 col-xs-12">
                    {!! Form::checkbox('status', '1', true) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit(trans('backend.add'), ['class' => 'btn btn-primary glyphicon glyphicon-plus', 'id' => 'add']) !!}   
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection
