@extends('admin.index')
@section('content')
<script type="text/javascript">
    function xacnhanxoa(msg) {
        if (window.confirm(msg)) {
            return true;
        }
        return false;
    }
</script>
<div class="page-title">
    <div class="title_left">
        <h3>{{ trans('backend.product') }}</h3>
    </div>
</div>
<div class="clearfix"></div>
</div>
<table class="table table-striped table-bordered detail-view">
    <thead>
        <tr>
            <th>{{ trans('backend.stt') }}</th>
            <th>{{ trans('backend.size') }}</th>
            <th>{{ trans('backend.color') }}</th>
            <th>{{ trans('backend.namecate') }}</th>
            <th>{{ trans('backend.product-name') }}</th>
            <th>{{ trans('backend.factory-name') }}</th>
            <th>{{ trans('backend.product-image') }}</th>
            <th>{{ trans('backend.price') }}</th>
            <th>{{ trans('backend.saleoff') }}</th>
            <th>{{ trans('backend.start_sale') }}</th>
            <th>{{ trans('backend.end_sale') }}</th>
            <th>{{ trans('backend.creat_at') }}</th>
            <th>{{ trans('backend.update_at') }}</th>
            <th>{{ trans('backend.status') }}</th>
            <th>{{ trans('backend.action') }}</th>
        </tr>
    </thead>
    <tbody>
        @php 
            $stt = 0;
        @endphp    
        @foreach ($categories as $value)
        @php
        $htmlSize = null;
        $htmlColor = null;
            $stt = $stt+1;
        if (!empty($value->size_id)) {
            $listsize = unserialize($value->size_id);
            if (count($listsize) > 0) {
                if (count($listsize) == 1) {
                    $data = \App\Models\Size::where('id', $listsize)->get();
                } else {
                    $data = \App\Models\Size::whereIn('id', $listsize)->get(); 
                }
            }
                if (!empty($data)) {
                    foreach ($data as $key => $valueSize) {
                       $htmlSize .= '<span class="sizze">'.$valueSize->size_name.'<span>';
                }
            }
        }

        if (!empty($value->color_id)) {
            $listcolor = unserialize($value->color_id);
            if (count($listcolor) > 0) {
                if (count($listcolor) == 1) {
                    $listcolor = [$listcolor];
                }
                    $dataColer = \App\Models\Colors::whereIn('id', $listcolor)->get();
                }
              if (!empty( $dataColer)) {
                foreach ($dataColer as $key => $valueColor) {
                        $htmlColor.= '<span class="sizze">'.$valueColor->color_name.'<span>';
                }
            }
        }
        @endphp
        <tr>
            <td>{!! $stt !!}</td>
            <td>{!! $htmlSize !!}</td>
            <td>{!! $htmlColor !!}</td>
            <td>{!! $value->cate_name !!}</td>
            <td>{!! $value->product_name !!}</td>
            <td>{!! $value->factory_name !!}</td>
            <td><img src="{!! $value->product_image !!}" alt="" width="120px"></td>
            <td>{!! number_format($value->price ) !!}</td>
            <td>{!! $value->saleoff !!}</td>
            <td>{!! date('d-m-y', strtotime($value->start_sale)) !!}</td>
            <td>{!! date('d-m-y', strtotime($value->end_sale)) !!}</td>
            <td>{!! date('d-m-y h:i:s', strtotime($value->created_at)) !!}</td>
            <td>{!! date('d-m-y h:i:s', strtotime($value->updated_at)) !!}</td>
            <td>
                @if($value->status == 1)
                    {{ Form::label('txthienthi',
                        trans('backend.show'),
                        array('class' => 'label label-success'))
                    }}
                @else
                    {{ Form::label('txthan',
                        trans('backend.hide'),
                        array('class' => 'label label-danger'))
                    }}
                @endif
            </td>
            <td>
                {!!Form::open(['route' => [
                        'product-list.destroy',
                        $value->id
                    ],
                    'method' => 'DELETE',
                    'id' => 'delete'
                ])
            !!} 
                    {{ Form::button(trans('backend.view'), [
                            'class' => 'btn btn btn-success viewproduct fa fa-list',
                            'data-id' => $value->id
                        ])
                    }}
                    <a href="{!!route('product-list.edit', $value->id)!!}"  class="btn btn-sm btn-primary">{{ trans('backend.edit')}}</a>
                    <button onclick="return xacnhanxoa(trans('backend.areyouwantdelete'))" type="submit"  id="delete" class="btn btn-danger btn-sm">
                        <i class="fa fa-trash-o" aria-hidden="true"></i>{{ trans('backend.delete') }}
                    </button>
                {!! Form::close() !!}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<a href="{{ action('ProductController@create') }}" class="btn btn btn-primary ">
    {{ trans('backend.add') }}<i class="fa fa-plus" aria-hidden="true"></i>
</a>
</div>
@endsection
