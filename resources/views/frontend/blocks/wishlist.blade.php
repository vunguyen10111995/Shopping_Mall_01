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
                            @if (Session::has('flash_message'))
                            <div class="alert alert-success" role="alert"><h4 class="text-center">{{ trans('fontend.delelesucces') }}</h4></div>
                            @endif()
                            @if (Auth::check())
                            <table class="table success">
                                <caption><h3 class="text-center">{{ trans('fontend.wish') }}</h3></caption>
                                <thead>
                                    <tr class="success">
                                        <th>{!! trans('fontend.stt') !!}</th>
                                        <th>{!! trans('fontend.product') !!}</th>
                                        <th>{!! trans('fontend.price') !!}</th>
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
                                    'route' => ['delete', 'id' => $item->rowId],
                                    'id' => 'delForm',
                                    ]) }}
                                    <tr class="{!! $item->rowId !!}">
                                        <td>{!! $stt !!}</td>
                                        <td>
                                            <input type="hidden" name="name" value="{!! $item->name !!}"> <a href="{{ url('detail-product', [$item->id, $item->name]) }}">{!! $item->name !!}</a>
                                        </td>
                                        <td class="price" price="{!! $item->price !!}">
                                            <input type="hidden" name='price' id="price" value="{!! $item->price !!}"> {!! $item->price !!}$
                                        </td>
                                        <td>
                                            <input type="hidden" name="iddelete" value="{!! $item->id !!}">
                                            <button onclick = "return xacnhanxoa();" type = "button" id="delete"  class='btn btn-danger'>
                                                <i class="fa fa-trash-o" aria-hidden="true"></i> {{ trans('backend.delete') }}
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>
                                {{ Form::close() }}
                                @else
                                <div class="panel-heading">
                                    <h4><a href="{!! url('auth/get-login')!!}"  id="loginpay">{!! trans('fontend.login') !!}</a> {!! trans('fontend.faster') !!}</h4>
                                </div>
                                @endif
                                <div class="action clearfix">
                                    <a class="btn btn-success" href="{!! url('/')!!}">{!! trans('fontend.continue') !!}</a>
                                </div>
                            </div>
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

