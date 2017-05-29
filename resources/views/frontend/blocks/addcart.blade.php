@include('frontend.blocks.necessary')

@include('frontend.blocks.header')

@include('frontend.blocks.section-menu')

<section id="cart-view">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="cart-view-area">
          <div class="cart-view-table">
            <div class="table-responsive">
              <table class="table success">
                <caption><h3 class="text-center">{{ trans('fontend.infor') }}</h3></caption>
                <thead>
                  <tr class="success">
                    <th>{!! trans('fontend.stt') !!}</th>
                    <th>{!! trans('fontend.product') !!}</th>
                    <th>{!! trans('fontend.price') !!}</th>
                    <th>{!! trans('fontend.quantity')!!}</th>
                    <th>{!! trans('fontend.size') !!}</th>
                    <th>{!! trans('fontend.color') !!}</th>
                    <th>{!! trans('fontend.total')!!}</th>
                    <th>{!! trans('fontend.action') !!}</th>
                  </tr>
                </thead>
                @php 
                  $stt = 0; 
                @endphp
                @foreach ($content as $item)
                @php 
                  $stt = $stt + 1; 
                @endphp
                {{ Form::open([
                    'method' => 'GET',
                    'route' => 'payment-shop',
                  ]) }}
                  <tr class="{!! $item->rowId !!}">
                    <td>{!! $stt !!}</td>
                    <td>
                      <input type="hidden" name="name" value="{!! $item->name !!}"><a href="{{ url('detail-product', [$item->id, $item->name]) }}">{!! $item->name !!}</a>
                    </td>
                    <td class="price" price="{!! $item->price !!}">
                      <input type="hidden" name='price' id="price" value="{!! $item->price !!}"> {!! $item->price !!}$
                    </td>
                    <td>
                      <input type="number" name="qtt" min="1" max="100" value="{!! $item->qty!!}" data-id="{{ $item->rowId }}" size="1" class="qty"/>
                    </td>
                    <td>
                      <input type="hidden"  name="size" value="{!! $item->options->size !!}"> {!! $item->options->size !!}
                    </td>
                    <td>
                      <input type="hidden"  name="color" value="{!! $item->options->color !!}"> {!! $item->options->color !!}
                    </td>
                    <td align="right" class="total">
                      <input type="hidden" name="total" value="{!! ($item->price)*($item->qty) !!}"/> {!! ($item->price)*($item->qty) !!}
                    </td>
                    <td>
                      <a href="{{ url('delete-cart', ['id' => $item->rowId]) }}" class="btn btn-danger">{{ trans('fontend.delete') }}</a>
                    </td>
                  </tr>
                @endforeach
              </table>
              <table class="table">
                <thead>
                  <tr class="info">
                    <th>{{ trans('fontend.totalpro') }}</th>
                    <th>{{ trans('fontend.total') }}</th>
                  </tr>
                </thead>
                <body>
                  <td class="product-qty"> 
                     <input type="hidden"  name="qttproduct" value="{!! $count !!}">{!! $count !!}
                  </td>
                  <td class="product-total">
                  <input type="hidden"  name="totalproduct" value="{!! $total !!}">{!! $total !!}$
                  </td>
                </body>
              </table>
              <div class="action clearfix">
                <a class="btn btn-success" href="{!! url('/')!!}">{!! trans('fontend.continue') !!}</a>
               {!! Form::submit(trans('fontend.order'), ['class' => 'btn btn-success']) !!} 
              </div>
              {{ Form::close() }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@include('frontend.blocks.section-subscribe')

@include('frontend.blocks.footer')

@include('frontend.blocks.important')

