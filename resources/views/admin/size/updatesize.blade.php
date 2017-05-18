@if(count($errors) > 0)
<ul>
@foreach($errors->all() as $error )
    <li> {!! $error !!}</li>
    @endforeach
</ul>
@endif
<div class="title_left">
    <h3>{{ trans('backend.update size') }}{{ $size['size_name'] }}</h3>
</div>
<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="clearfix"></div>
            <div class="x_content">
                <br/>
                {!!Form::open(array('route' => array('size-list.destroy', $size['id']), 'class' => 'form-horizontal form-label-left','method' => 'PUT')) !!}
                <div class="form-group">
                    {!! Form::label('labelsize', trans('backend.size'), ['class' => 'control-label col-md-3 col-sm-3 col-xs-12' ]) !!}
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        {!! Form::text('size_name', $value = $size['size_name'] , $attribute = ['class' => 'form-control col-md-7 col-xs-12']) !!}  
                    </div>
                    @if ($errors->has('size_name'))
                    <span class="label label-danger">
                        <strong>{{ $errors->first('size_name') }}</strong>
                    </span>
                    @endif
                </div>
                {!! Form::label('txtstatus', trans('backend.status'), ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                <div class="col-md-6 col-sm-6 col-xs-12">
                    {{ Form::checkbox('status', '1', $size['status']== 1 ? 'checked' : '') }}
                </div>  
                <div class="form-group">
                    {{ Form::submit(trans('backend.update'), ['class' => 'btn btn-success plus']) }}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
