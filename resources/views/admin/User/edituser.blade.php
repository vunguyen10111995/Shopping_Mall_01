@extends('admin.index')
@section('content')
<div class="page-title">
    <div class="title_left">
        <h3><span class="label label-info">{{ trans('backend.edituser') }}</span></h3>
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
                {{ Form::open(array('route' => array('User.update', $user['id']), 'method' => 'PUT')) }}
                <div class="form-group">
                    {!! Form::label('labelname', trans('backend.username'), array('class' => 'control-label col-md-3 col-sm-3 col-xs-12' )) !!}
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        {!! Form::text('Name', $value = $user['name'] , $attributes = ['class' => 'form-control col-md-7 col-xs-12', "placeholder" => trans('backend.pleasename')]) !!}
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
                        {!! Form::text('txtfullname', $value = $user['full_name'], $attributes = ['class' => 'form-control col-md-7 col-xs-12', "placeholder" => trans('backend.pleasefull')]) !!}
                    </div>
                    @if ($errors->has('txtfullname'))
                    <span class="help-block"> 
                        <strong class="label label-danger">{{ $errors->first('txtfullname') }}</strong>
                    </span>
                    @endif
                    <div class="clearfix"></div>
                    <br>
                    {!! Form::label('lable', trans('backend.phone'), array('class' => 'control-label col-md- col-sm-3 col-xs-12' )) !!}
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        {!! Form::text('txtphone', $value = $user['phone'] , $attributes = ['class' => 'form-control col-md-7 col-xs-12']) !!}
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
                        {{Form::select('sex', ['1' => '1', '2' => '2'], $value = $user['sex'], ['placeholder' => trans('backend.sex'), 'class'=>'form-control col-md-7 col-xs-12']) }}
                    </div>
                    @if ($errors->has('sex'))
                    <span class="help-block"> 
                        <strong class="label label-danger">{{ $errors->first('sex') }}</strong>
                    </span>
                    @endif
                    <div class="clearfix"></div>
                    <br>
                    {!! Form::label('txtaddress',  trans('backend.address'), array('class' => 'control-label col-md- col-sm-3 col-xs-12' )) !!}
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        {{ Form::textarea('txtaddress', $value = $user['address'], ['size' => '30x5', 'class' => 'form-control']) }}
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
                        {!! Form::email('txtemail', $value = $user['email'], $attributes = ['class' => 'form-control col-md-7 col-xs-12', "placeholder" => trans('backend.pleaseemail')]) !!}
                    </div>
                    @if ($errors->has('txtemail'))
                    <span class="help-block"> 
                        <strong class="label label-danger">{{ $errors->first('txtemail') }}</strong>
                    </span>
                    @endif
                    <div class="clearfix"></div>
                    <br>
                    {!! Form::label('txtlevel', trans('backend.level'), array('class' => 'control-label col-md- col-sm-3 col-xs-12' )) !!}
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        {{ Form::select('level', ['1' => '1', '2' => '2'], $value = $user['level'], ['placeholder' => trans('backend.level'), 'class'=>'form-control col-md-7 col-xs-12']) }}
                    </div>
                    @if ($errors->has('level'))
                    <span class="help-block"> 
                        <strong class="label label-danger">{{ $errors->first('level') }}</strong>
                    </span>
                    @endif
                    <div class="clearfix"></div>
                    <br>
                    {!! Form::label('txtstatus', trans('backend.status'), array('class' => 'control-label col-md- col-sm-3 col-xs-12' )) !!}
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        {{ Form::select('status', ['1' => '1', '2' => '2'], $value = $user['status'], ['placeholder' => 'Status', 'class'=>'form-control col-md-7 col-xs-12']) }}
                    </div>
                    @if ($errors->has('status'))
                    <span class="help-block">
                        <strong class="label label-danger">{{ $errors->first('status') }}</strong>
                    </span>
                    @endif
                    <div class="clearfix"></div>
                    <br>    
                    <div class="form-group">
                    {!! Form::submit(trans('backend.updateuser'), array('class' => 'btn btn-success col-md-offset-4 glyphicon glyphicon-user')) !!} 
                    </div>
                </div>
                {!! Form::close() !!}
            </div>  
        </div>
    </div>
</div>
</div>
@endsection
