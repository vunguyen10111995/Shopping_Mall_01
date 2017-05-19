<div class="clearfix"></div>
<table class="table table-bordered">
    <tbody>
        @foreach($factory as $value)
        <tr>
        <td>{{ trans('backend.factory-name') }}</td>
            <td>{!! $value->factory_name !!}</td>
        </tr>
        <tr>
            <td>{{ trans('backend.logo') }}</td>
            <td><img src="{!! $value->factory_logo !!}" alt="" width="120px"></td>
        </tr>
        <tr>
            <td>{{ trans('backend.website') }}</td>
            <td>{!! $value->factory_website !!}</td>
        </tr>
    </tr>  
    <td>{{ trans('backend.creat_at')}}</td>
    <td>{!! date('d-m-y h:i:s', strtotime($value->updated_at)) !!}</td>
</tr>
<tr>
    <td>{{ trans('backend.update_at') }}</td>
    <td>{!! date('d-m-y h:i:s', strtotime($value->updated_at)) !!}</td>
</tr>
<tr>
    <td>{{ trans('backend.status')}}</td>
    <td>
        @if($value->status == 1)
        {{ Form::label('txthienthi', trans('backend.show'), ['class' => 'label label-success']) }}
        @else
        {{ Form::label('txthan', trans('backend.hide'), ['class' => 'label label-danger']) }}
        @endif
    </td>
</tr>
@endforeach
</tbody>
</table>