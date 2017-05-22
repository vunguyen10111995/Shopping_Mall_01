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
        <h3>{{trans('backend.add_product')}}</h3>
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
                <br />
                {{ Form::open([
                        'method' => 'POST',
                        'action' => 'ProductController@store',
                        'data-parsley-validate class' => 'form-horizontal form-label-left',
                        'id'=>'demo-form2',
                        'enctype' => 'multipart/form-data'
                    ]) }}
                    <div class="form-group">
                        {!! Form::label('labelproduct', trans('backend.parentname'), ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                        <center>
                            {{ Form::select('catparent',
                                $categories->prepend('None', 0),
                                $categories->toArray(), [
                                'class' => 'col-md-5',
                                'id' => 'locID' 
                                ]) }}
                        </center>
                        @if ($errors->has('catparent'))
                            <span class="label label-danger">
                                <strong>{{ $errors->first('catparent') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        {!! Form::label('labelname', trans('backend.product-name'), ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::text('product_name', $value = null, $attribute = ['class' => 'form-control col-md-7 col-xs-12', "placeholder" => trans('backend.pleaseproductname')]) !!}
                        </div>
                         @if ($errors->has('product_name'))
                            <span class="label label-danger">
                                <strong>{{ $errors->first('product_name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        {!! Form::label('labelproduct', trans('backend.product-image'), ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::text('product_image', $value = null, $attribute = ['class' => 'form-control col-md-7 col-xs-12', 'id'=> 'image', "placeholder" => trans('backend.pleaseproductimage')]) !!}
                            <a href="#"  class="btn btn-sm btn-success" id="select">{{ trans('backend.select-image') }}</a>
                            <a href="#" class="btn btn-sm btn-danger" id="delete">{{ trans('backend.remove-image') }}</a>
                        </div>
                         @if ($errors->has('product_image'))
                            <span class="label label-danger">
                                <strong>{{ $errors->first('product_image') }}</strong>
                            </span>
                        @endif
                    </div>      
                    <div class="form-group">
                        {!! Form::label('labelproduct', trans('backend.price'), ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::text('price', $value = null, $attribute = ['class' => 'form-control col-md-7 col-xs-12', "placeholder" => trans('backend.pleaseprice')]) !!}
                        </div>
                        @if ($errors->has('price'))
                            <span class="label label-danger">
                                <strong>{{ $errors->first('price') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        {!! Form::label('labelproduct', trans('backend.saleoff'), ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::text('saleoff', $value = null, $attribute = ['class' => 'form-control col-md-7 col-xs-12', "placeholder" => trans('backend.pleasesaleoff')]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('labelproduct', trans('backend.color'), ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                        @foreach($colors as $color)
                            {!! Form::label('color', $name = $color->color_name) !!}
                            {!! Form::checkbox('color[]', $value =  $color->id ,NULL, $attribute = [ "placeholder" => trans('backend.pleasecolorname')]) !!}
                        @endforeach
                         @if ($errors->has('color'))
                            <span class="label label-danger">
                                <strong>{{ $errors->first('color') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        {!! Form::label('labelproduct', trans('backend.size'), ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                    </label>
                    @foreach($sizes as $size)
                        {!! Form::label('size', $name = $size->size_name) !!}
                        {!! Form::checkbox('size[]', $value = $size->id,NULL ,$attribute = [ "placeholder" => trans('backend.pleasezise')]) !!}
                    @endforeach
                     @if ($errors->has('size'))
                            <span class="label label-danger">
                                <strong>{{ $errors->first('size') }}</strong>
                            </span>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('labelproduct', trans('backend.factory'), ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                     {{ Form::select('factory',
                                $factories->prepend('None', 0),
                                $factories->toArray(), 
                                [
                                    'class' => 'form-control col-md-6 col-sm-6 col-xs-12',
                                    'id' => 'locID' 
                                ]) }}
                    @if ($errors->has('factory'))
                        <span class="label label-danger">
                            <strong>{{ $errors->first('factory') }}</strong>
                        </span>
                    @endif   
                </div>
                <div class="form-group">
                    {!! Form::label('labelproduct', trans('backend.start_sale'), ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        {!! Form::text('start_sale', $value = null, $attribute = ['class' => 'form-control col-md-7 col-xs-12', 'id' => 'start', "placeholder" => trans('backend.pleasestartsale')]) !!}
                    </div>
                    @if ($errors->has('start_sale'))
                        <span class="label label-danger">
                            <strong>{{ $errors->first('start_sale') }}</strong>
                        </span>
                    @endif   
                </div>
                <div class="form-group">
                    {!! Form::label('labelproduct', trans('backend.end_sale'), ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        {!! Form::text('end_sale', $value = null, $attribute = ['class' => 'form-control col-md-7 col-xs-12', 'id' => 'end', "placeholder" => trans('backend.pleasestartsale')]) !!}
                    </div>
                      @if ($errors->has('end_sale'))
                        <span class="label label-danger">
                            <strong>{{ $errors->first('end_sale') }}</strong>
                        </span>
                    @endif   
                </div>
                <div class="form-group">
                    {!! Form::label('labelproduct', trans('backend.description'), ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        {!! Form::textarea('description',$value = null, $attribute = ['class' => 'form-control col-md-7 col-xs-12', 'id' => 'desc']) !!}
                        {!! $errors->first('description') !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('labelproduct', trans('backend.content'), ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        {!!Form::textarea('content',$value = null, $attribute = ['class' => 'form-control col-md-7 col-xs-12', 'id' => 'content']) !!}
                    </div>
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
