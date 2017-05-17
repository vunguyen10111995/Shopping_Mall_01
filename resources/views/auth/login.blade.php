@extends('layouts.index')

@section('content')
    <div class="banner">
        <div class="agileinfo-dot">
            <h1>{{ trans('messages.fashion') }}</h1>
                <div class="w3layoutscontaineragileits">
                    <h2>{{ trans('messages.sigin') }}</h2>
                        @if(isset($message))
                          <div class="alert alert-danger" role="alert">{!! $message !!}</div>
                        @endif
                        
                        <br/>
                        {!! Form::open(['url' => asset('auth/post-login'), 'method'=>'post']) !!}
                            {{ Form::email('email', '', ['class' => 'email', 'placeholder' => 'Vui Lòng Nhập Email', 'required' => '']) }}
                            {{ Form::password('password', '', ['class' => 'pass', 'placeholder' => 'Vui Lòng Nhập Pass', 'required' => '']) }}
                            <ul class="agileinfotickwthree">
                                <li>
                                    {!! Form::checkbox('Remember') !!}
                                    {!! Form::label('txtremember', 'Remember me', array( 'name' => 'brand1')) !!}
                                    <a href="{!! url('redirect')!!}" id="loginfb" >{{ trans('messages.loginfb') }}</a>
                                    <a href="{!! url('auth/reset') !!}">{{ trans('messages.logingmail') }}</a>
                                </li>
                            </ul>
                            <div class="aitssendbuttonw3ls">
                                {!! Form::submit('Login') !!}
                                <div class="clear"></div>
                            </div>
                        {!! Form::close() !!}
                </div>
        </div>
    </div>
@endsection