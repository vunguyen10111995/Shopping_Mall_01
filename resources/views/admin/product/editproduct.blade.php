@extends('admin.index')
@section('content')
<?php 
function CheckSelected($needle='',$haystack=[]){
 if(count($haystack)>0){
    if(is_array($haystack) && in_array($needle, $haystack)){
        return 1;
    }elseif ($needle == $haystack) {
        return 1; 
    }
    return null;
}
}
?>
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
                {!! Form::open(array('route' => array('product-list.destroy', $product['id']), 'class' =>' form-horizontal form-label-left', 'method' => 'PUT')) !!}
                <div class="form-group">
                    {!! Form::label('labelproduct', trans('backend.parentname'), ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                    <center>
                      {{ Form::select('catparent',
                        $categories->toArray(), 
                        $product->cate_id,
                        [
                        'class' => 'col-md-5',
                        'id' => 'locID' 
                        ]) }}
                  </center>
                  @if ($errors->has('cate_name'))
                  <span class="label label-danger">
                    <strong>{{ $errors->first('cate_name') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group">
                {!! Form::label('labelname', trans('backend.product-name'), ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                <div class="col-md-6 col-sm-6 col-xs-12">
                    {!! Form::text('product_name', $value = $product['product_name'], $attribute = ['class' => 'form-control col-md-7 col-xs-12', "placeholder" => trans('backend.pleaseproductname')]) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('labelproduct', trans('backend.product-image'), ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                <div class="col-md-6 col-sm-6 col-xs-12">
                    {!! Form::text('product_image', $value = $product['product_image'], $attribute = ['class' => 'form-control col-md-7 col-xs-12', 'id'=> 'image', "placeholder" => trans('backend.pleaseproductimage')]) !!}
                    {!!$errors->first('product_image')!!}

                    <a href="#"  class="btn btn-sm btn-success" id="select">{{ trans('backend.select-image') }}</a>
                    <a href="#" class="btn btn-sm btn-danger" id="delete">{{ trans('backend.remove-image') }}</a>
                </div>
            </div>      
            <div class="form-group">
                {!! Form::label('labelproduct', trans('backend.price'), ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                <div class="col-md-6 col-sm-6 col-xs-12">
                    {!! Form::text('price', $value = $product['price'], $attribute = ['class' => 'form-control col-md-7 col-xs-12', "placeholder" => trans('backend.pleaseprice')]) !!}
                    {!!$errors->first('price')!!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('labelproduct', trans('backend.saleoff'), ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                <div class="col-md-6 col-sm-6 col-xs-12">
                    {!! Form::text('saleoff', $value = $product['saleoff'] , $attribute = ['class' => 'form-control col-md-7 col-xs-12', "placeholder" => trans('backend.pleasesaleoff')]) !!}
                    {!!$errors->first('saleoff')!!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('labelproduct', trans('backend.color'), ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                @foreach($colors as $color)   
                {!! Form::label('color', $name = $color->color_name) !!}
                {!! Form::checkbox('color[]',$color->id,CheckSelected($color->id,unserialize($product->color_id)) ,$attribute = [ 
                    "placeholder" => trans('backend.pleasecolorname'),
                    ]) !!}
                {!!$errors->first('color')!!}
                @endforeach
            </div>
            <div class="form-group">
                {!! Form::label('labelproduct', trans('backend.size'), ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
            </label>
            @foreach($sizes as $size)
            {!! Form::label('size', $name = $size->size_name) !!}
            {!! Form::checkbox('size[]', $size->id ,CheckSelected($size->id,unserialize($product->size_id)) ,$attribute = [ "placeholder" => trans('backend.pleasezise')]) !!}
            {!! $errors->first('size') !!}
            @endforeach
        </div>
        <div class="form-group">
            {!! Form::label('labelproduct', trans('backend.factory'), ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
            {{ Form::select('factory',
                $factories->toArray(), 
                $product->factory_id,
                [
                'class' => 'form-control col-md-6 col-sm-6 col-xs-12',
                'id' => 'locID' 
                ]) }}
        </div>
        <div class="form-group">
            {!! Form::label('labelproduct', trans('backend.start_sale'), ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
            <div class="col-md-6 col-sm-6 col-xs-12">
                {!! Form::text('start_sale', $value = date('d-m-Y',strtotime($product['start_sale'])) , $attribute = ['class' => 'form-control col-md-7 col-xs-12', 'id' => 'start', "placeholder" => trans('backend.pleasestartsale')]) !!}
                {!!$errors->first('start_sale')!!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('labelproduct', trans('backend.end_sale'), ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
            <div class="col-md-6 col-sm-6 col-xs-12">
                {!! Form::text('end_sale', $value = date('d-m-Y',strtotime($product['end_sale'])), $attribute = ['class' => 'form-control col-md-7 col-xs-12', 'id' => 'end', "placeholder" => trans('backend.pleasestartsale')]) !!}
                {!! $errors->first('name') !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('labelproduct', trans('backend.description'), ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
            <div class="col-md-6 col-sm-6 col-xs-12">
                {!! Form::textarea('description',$value = $product['description'], $attribute = ['class' => 'form-control col-md-7 col-xs-12', 'id' => 'desc']) !!}
                {!! $errors->first('description') !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('labelproduct', trans('backend.content'), ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
            <div class="col-md-6 col-sm-6 col-xs-12">
                {!!Form::textarea('content',$value = $product['content'], $attribute = ['class' => 'form-control col-md-7 col-xs-12', 'id' => 'content']) !!}
            </div>
        </div>
        {!! Form::label('labelstatus', trans('backend.status'), ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
        <div class="col-md-6 col-sm-6 col-xs-12">
            {!! Form::checkbox('status', '1', $product['status'] == 1 ? 'checked' : '') !!}
        </div>
        <div class="form-group">
            {!! Form::submit(trans('backend.update'), ['class' => 'btn btn-primary glyphicon glyphicon-plus', 'id' => 'add']) !!} 
        </div>
        {{ Form::close() }}
    </div>
</div>
</div>
</div>
@endsection
