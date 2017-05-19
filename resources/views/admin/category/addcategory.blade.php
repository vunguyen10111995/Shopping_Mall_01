@extends('admin.index')
@section('content')
<div class="clearfix"></div>
<div class="row">
    {{Form::open([
        'method' => 'POST', 
        'action' => 'CategoryController@store', 
        'class' => 'form-horizontal form-label-left',
        'id' => 'demo-form2'
    ])}}
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    {{ Form::token() }}
                    <div class="form-group">
                        {!! Form::label('labeldanhmuc', 
                            trans('backend.catename'), [
                            'class' => 'control-label col-md-3 col-sm-3 col-xs-12'
                        ]) !!}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::text('cate_name', 
                                $value = null, 
                                $attribute = [
                                    'class' => 'form-control col-md-7 col-xs-12', 
                                    "placeholder" => trans('backend.pleasecatename')
                                ]) !!}
                        </div>
                        @if ($errors->has('cate_name'))
                        <span class="label label-danger">
                            <strong>{{ $errors->first('cate_name') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        {!! Form::label('danhdanh', 
                            trans('backend.parentname'), [
                                'class' => 'control-label col-md-3 col-sm-3 col-xs-12'
                            ]) !!}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {{ Form::select('catparent',
                                $categories->prepend('None', 0),
                                $categories->toArray(), [
                                    'class' => 'form-control col-md-6 col-sm-6 col-xs-12',
                                    'id' => 'locID' 
                                ]) }}
                        </div>
                        @if ($errors->has('catparent'))
                        <span class="label label-danger">
                            <strong>{{ $errors->first('catparent') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        {!! Form::label('labelstatus', 
                            trans('backend.status'), [
                                'class' => 'control-label col-md-3 col-sm-3 col-xs-12'
                            ]) 
                        !!}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::checkbox('status', '1', true) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::submit('AddUser', [
                            'class' => 'btn btn-success col-md-offset-4 glyphicon glyphicon-user'
                        ]) !!} 
                    </div>
                </div>
            </div>
        {{ Form::close() }}
    </div>
</div>
</div>
@endsection
