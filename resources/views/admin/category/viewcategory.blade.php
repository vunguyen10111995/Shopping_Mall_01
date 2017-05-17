<div class="page-title">
</div>
<div class="clearfix"></div>
</div>
<table class="table table-striped table-bordered detail-view">
    <tbody>
        @foreach($category as $value)
        <div>
            <tr>
                <th>{{ trans('backend.namecate') }}</th>
                <th>{!! $value->cate_name !!}</th>
            </tr>
            <tr>
                <th>{{ trans('backend.creat_at') }}</th>
                <th>{!! date('d-m-y h:i:s', strtotime($value->created_at)) !!}</th>
            </tr>
            <tr>
                <th>{{ trans('backend.namecate') }}</th>
                <th>{!! date('d-m-y h:i:s', strtotime($value->updated_at)) !!}</th>
            </tr>
            <tr>
                <th>{{ trans('backend.status') }}</th>
                <th>
                   @if($value->status == 1)
                   {{ Form::label('txthienthi', trans('backend.show'), array('class' => 'label label-success')) }}
                   @else
                   {{ Form::label('txthan', trans('backend.hide'), array('class' => 'label label-danger')) }}
                   @endif
               </th>
           </tr>
       </div>
       @endforeach
   </tbody>
</table>
</div>
