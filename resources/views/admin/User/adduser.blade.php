@extends('admin.index')
@section('content')
<div class="page-title">
    <div class="title_left">
        <h3><span class="label label-info">{{ trans('backend.adduser') }}</span></h3>
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
                {{ Form::open(['method' => 'POST', 'action' => 'UserController@store']) }}
                <div class="form-group">
                    {!! Form::label('labelname', trans('backend.username'), array('class' => 'control-label col-md-3 col-sm-3 col-xs-12' )) !!}
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        {!! Form::text('Name', $value = ' ' , $attributes = ['class' => 'form-control col-md-7 col-xs-12', "placeholder" => trans('backend.pleasename')]) !!}
                    </div>
                    @if ($errors->has('Name'))
                    <span class="label label-danger">
                        <strong>{{ $errors->first('Name') }}</strong>
                    </span>
                    @endif
                    <div class="clearfix"></div>
                    <br>
                    {!! Form::label('labelfullname', trans('backend.fullname'), array('class' => 'control-label col-md- col-sm-3 col-xs-12' )) !!}
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        {!! Form::text('txtfullname', $value = ' ' , $attributes = ['class' => 'form-control col-md-7 col-xs-12', "placeholder" => trans('backend.pleasefull')]) !!}
                    </div>
                    @if ($errors->has('txtfullname'))
                    <span class="help-block"> 
                        <strong class="label label-danger">{{ $errors->first('txtfullname') }}</strong>
                    </span>
                    @endif
                    <div class="clearfix"></div>
                    <br>
                    {!! Form::label('labelpass', trans('backend.pass'), array('class' => 'control-label col-md- col-sm-3 col-xs-12' )) !!}
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        {{ Form::password('txtpassword', array('placeholder' => trans('backend.pass') , 'class' => 'form-control col-md-6 col-sm-3 col-xs-12')) }}
                    </div>
                    @if ($errors->has('txtpassword'))
                    <span class="help-block">
                        <strong class="label label-danger">{{ $errors->first('txtpassword') }}</strong>
                    </span>
                    @endif
                    <div class="clearfix"></div>
                    <br>
                    {!! Form::label('labelcomfipass', trans('backend.comfirm'), array('class' => 'control-label col-md- col-sm-3 col-xs-12' )) !!}
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        {{ Form::password('txtcomfirm', array('placeholder' => trans('backend.comfirm'), 'class' => 'form-control col-md-6 col-sm-3 col-xs-12')) }}
                    </div>
                    @if ($errors->has('txtcomfirm'))
                    <span class="help-block"> 
                        <strong class="label label-danger">{{ $errors->first('txtcomfirm') }}</strong>
                    </span>
                    @endif
                    <div class="clearfix"></div>
                    <br>
                    {!! Form::label('lable', trans('backend.phone'), array('class' => 'control-label col-md- col-sm-3 col-xs-12' )) !!}
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        {!! Form::text('txtphone', $value = ' ' , $attributes = ['class' => 'form-control col-md-7 col-xs-12']) !!}
                    </div>
                    @if ($errors->has('txtphone'))
                    <span class="help-block"> 
                        <strong class="label label-danger">{{ $errors->first('txtphone') }}</strong>
                    </span>
                    @endif
                    <div class="clearfix"></div>
                    <br>
                    {!! Form::label('labelsex', trans('backend.sex'), array('class' => 'control-label col-md- col-sm-3 col-xs-12' )) !!}
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        {{Form::select('sex', ['1' => '1', '2' => '2'], null, ['placeholder' => trans('backend.sex'), 'class'=>'form-control col-md-7 col-xs-12']) }}
                    </div>
                    @if ($errors->has('sex'))
                    <span class="help-block"> 
                        <strong class="label label-danger">{{ $errors->first('sex') }}</strong>
                    </span>
                    @endif
                    <div class="clearfix"></div>
                    <br>
                    {!! Form::label('txtaddress', trans('backend.address'), array('class' => 'control-label col-md- col-sm-3 col-xs-12' )) !!}
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        {{ Form::textarea('txtaddress', null, ['size' => '30x5', 'class' => 'form-control']) }}
                    </div>
                    @if ($errors->has('txtaddress'))
                    <span class="help-block"> 
                        <strong class="label label-danger">{{ $errors->first('txtaddress') }}</strong>
                    </span>
                    @endif
                    <div class="clearfix"></div>
                    <br>            
                    {!! Form::label('txtemail', trans('backend.email'), array('class' => 'control-label col-md- col-sm-3 col-xs-12' )) !!}
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        {!! Form::email('txtemail', $value = ' ' , $attributes = ['class' => 'form-control col-md-7 col-xs-12', "placeholder" => trans('backend.pleaseemail')]) !!}
                    </div>
                    @if ($errors->has('txtemail'))
                    <span class="help-block"> 
                        <strong class="label label-danger">{{ $errors->first('txtemail') }}</strong>
                    </span>
                    @endif
                    <div class="clearfix"></div>
                    <br>
                    {!! Form::label('txtfullname', trans('backend.level'), array('class' => 'control-label col-md- col-sm-3 col-xs-12' )) !!}
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        {{Form::select('level', ['1' => '1', '2' => '2'], null, ['placeholder' => 'Level', 'class'=>'form-control col-md-7 col-xs-12']) }}
                    </div>
                    @if ($errors->has('level'))
                    <span class="help-block"> 
                        <strong class="label label-danger">{{ $errors->first('level') }}</strong>
                    </span>
                    @endif
                    <div class="clearfix"></div>
                    <br>
                    {!! Form::label('labelstatus', trans('backend.status'), array('class' => 'control-label col-md- col-sm-3 col-xs-12' )) !!}
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        {!! Form::checkbox('status', '1', true) !!}
                    </div>
                    @if ($errors->has('status'))
                    <span class="help-block"> 
                        <strong class="label label-danger">{{ $errors->first('status') }}</strong>
                    </span>
                    @endif
                    <div class="clearfix"></div>
                    <br>
                    <div class="form-group">
                        {!! Form::submit(trans('backend.adduser'), array('class' => 'btn btn-success col-md-offset-4 glyphicon glyphicon-user')) !!} 
                    </div>
                </div>
                {!! Form::close() !!}
            </div>  
        </div>
    </div>
</div>
</div>
@endsection
