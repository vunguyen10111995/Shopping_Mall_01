<div class="page-title">
</div>
<div class="clearfix"></div>
</div>
<table class="table table-striped table-bordered detail-view">
    <tbody>
        @foreach($product as $value)
          @php 
        $htmlSize=null;
        $htmlColor=null;
          if(!empty($value->size_id)){
            $listsize = unserialize($value->size_id);
            if(count($listsize)>0){
                if(count($listsize) == 1){
                     $data =   \App\Models\Size::where('id',$listsize)->get();
                }else{
                      $data =   \App\Models\Size::whereIn('id',$listsize)->get(); 
                }
            }
              if(!empty( $data)){
                foreach ($data as $key => $valueSize) {
                       $htmlSize .=  '<span class="sizze">' .$valueSize->size_name .'<span>';
                }
            }
          }
          if(!empty($value->color_id)){
            $listcolor = unserialize($value->color_id);
            if(count($listcolor) > 0){
                if(count($listcolor) == 1){
                    $listcolor =[$listcolor];
                }
                  $dataColor =   \App\Models\Colors::whereIn('id', $listcolor)->get();
                }
              if(!empty( $dataColor)){
                foreach ($dataColor as $key => $valueColor) {
                        $htmlColor.=  '<span class="sizze">' .$valueColor->color_name .'<span>';
                }
            }
          }
        @endphp
        <div>
            <tr>
                <th>{!! trans('backend.product-name') !!}</th>
                <td>  {!! $value->product_name !!}</td>
            </tr>
            
            <tr>
                 <th>{!! trans('backend.size') !!}</th>
                 <td> {!! $htmlSize !!} </td>
            </tr>
            <tr>
                <th>{!! trans('backend.color') !!}</th>
                 <td>{!! $htmlColor!!}</td>
            </tr>
            <tr>
                <th>{!! trans('backend.product-image') !!}</th>
                <td> <img src="{!! $value->product_image !!}" alt="" width="120px"></td>
            </tr>
            <tr>
                <th>{{ trans('backend.price') }}</th>
                <td>{!! date('d-m-y h:i:s', strtotime($value->created_at)) !!}</td>
            </tr>
             <tr>
                <th>{!! trans('backend.start_sale') !!}</th>
                <td> {!!date('d-m-y', strtotime($value->start_sale))!!}</td>
            </tr>
             <tr>
                <th>{!! trans('backend.end_sale') !!}</th>
                <td>{!!date('d-m-y', strtotime($value->end_sale))!!}</td>
            </tr>
            <tr>
                <th>{!! trans('backend.creat_at') !!}</th>
                <td>{!! date('d-m-y h:i:s', strtotime($value->updated_at)) !!}</td>
            </tr>
              <tr>
                <th>{!! trans('backend.update_at') !!}</th>
                <td>{!! date('d-m-y h:i:s', strtotime($value->updated_at)) !!}</td>
            </tr>
            <tr>
                <th>{!! trans('backend.status') !!}</th>
                <td>
                     @if($value->status == 1)
                    {!! Form::label('txthienthi', trans('backend.show'), array('class' => 'label label-success')) !!}
                    @else
                    {!! Form::label('txthan', trans('backend.hide'), array('class' => 'label label-danger')) !!}
                    @endif
                </td>
            </tr>
        </div>
        @endforeach
    </tbody>
</table>
</div>