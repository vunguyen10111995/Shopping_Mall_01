@if(count($errors) > 0)
<ul>
    @foreach($errors->all() as $error )
    <li> {!! $error !!}</li>
    @endforeach
</ul>
@endif
<div class="title_left">
    <h3>{{ $color['color_name']}}</h3>
</div>
<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="clearfix"></div>
            <div class="x_content">
            <br/>
                {!! Form::open(array('route' => array('color-list.destroy', $color['id']), 'class' =>' form-horizontal form-label-left', 'method' => 'PUT')) !!}
                {{ Form::token() }}
                <div class="form-group">
                    {!! Form::label('labelname', trans('backend.namecolor'), ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        {!! Form::text('color', $value = $color['color_name'] , $attribute = ['class' => 'form-control col-md-7 col-xs-12']) !!}  
                        {!!$errors->first('color') !!}
                    </div>
                </div>
                {!! Form::label('txtparent', trans('backend.status'), ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                <div class="col-md-6 col-sm-6 col-xs-12">
                    {{ Form::checkbox('status', '1', $color['status'] == 1 ? 'checked' : '') }}
                </div>
                <div class="form-group">
                    {{ Form::submit(trans('backend.update'), ['class' => 'btn btn-success plus']) }}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
