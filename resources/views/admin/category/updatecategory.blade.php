<div class="title_left">
<h3>{{ trans('backend.update_category')} }{{ $category['cate_name'] }}</h3>
</div>            
<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="clearfix"></div>
            <div class="x_content">
                <br />
                {!!Form::open(array('route' => array('category-list.destroy', $category['id']), 'class' => 'form-horizontal form-label-left', 'method'=>'PUT' )) !!}
                {{ Form::token() }}
                <div class="form-group">
                    {!! Form::label('labelcate', trans('backend.catename'), array('class' => 'control-label col-md-3 col-sm-3 col-xs-12')) !!}
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    {!! Form::text('name', $value = $category['cate_name'] , $attribute = ['class' => 'form-control col-md-7 col-xs-12', "placeholder" => trans('backend.pleasecatename')]) !!}  
                    {!!$errors->first('name')!!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('txtparent', trans('backend.parentname'), array('class' => 'control-label col-md-3 col-sm-3 col-xs-12')) !!}
            </label>
            <center>
                {{ Form::select('catename',
                    $categories->toArray(), 
                    $category->parent_id,
                    [
                    'class' => 'form-control col-md-6 col-sm-6 col-xs-12',
                    'id' => 'locID' 
                    ]) }}
            </center>
        </div>
        {!! Form::label('txtparent',  trans('backend.status'), array('class' => 'control-label col-md-3 col-sm-3 col-xs-12')) !!}
        <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::checkbox('status', '1', $category['status'] == 1 ? 'checked' : '') }}
        </div>
        <div class="form-group">
            {!! Form::submit(trans('backend.update'), array('class' => 'btn btn-primary add', 'id' => 'add')) !!}
        </div>
        {!! Form::close() !!}
    </div>
</div>
</div>
</div>
