@include('frontend.blocks.necessary')

@include('frontend.blocks.header')

@include('frontend.blocks.section-menu')
<section id="checkout">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="checkout-area">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="checkout-left">
                                <div class="panel-group" id="accordion">
                                    @if (Session::has('flash_message'))
                                        <div class="alert alert-success" role="alert"><h4 class="text-center">{{ trans('fontend.ordersusses') }}</h4></div>
                                    @endif()
                                    <div class="panel panel-default aa-checkout-login">
                                     @if (Auth::check())
                                        {{ Form::open([
                                            'method' => 'POST',
                                            'action' => 'BlocksController@paymentShopping',
                                            'data-parsley-validate class'=>'form-horizontal form-label-left',
                                            'enctype' => 'multipart/form-data',
                                            'id'=>'demo-form2'
                                            ]) }}
                                        <div>
                                            <div>
                                                <h4 id="infopay">{!! trans('fontend.shopinfor')!!}</h4><br/>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        {!! Form::label('labelname', trans('fontend.username'), ['class' => 'control-label' ]) !!}
                                                        @if ($errors->has('txtname'))
                                                        <span class="label label-danger">
                                                            <strong>{{ $errors->first('txtname') }}</strong>
                                                        </span>
                                                        @endif
                                                        <br/>
                                                        <div class="col-md-8">
                                                            {!! Form::text('txtname', $value = ' ' , ['class' => 'aa-checkout-single-bill', 'required' => '']) !!}
                                                        </div>
                                                    </div>

                                                     <div class="col-md-6 phone">
                                                        {!! Form::label('phone', trans('fontend.phone'), ['class' => 'control-label' ]) !!}
                                                        @if ($errors->has('phone'))
                                                        <span class="label label-danger">
                                                            <strong>{{ $errors->first('phone') }}</strong>
                                                        </span>
                                                        @endif
                                                        <br/>
                                                        <div class="col-md-8">
                                                            {!! Form::text('phone', $value = ' ' , ['class' => 'aa-checkout-single-bill']) !!}
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 emailpay">
                                                        {!! Form::label('email', trans('fontend.emailpay'), ['class' => 'control-label']) !!}
                                                        @if ($errors->has('email'))
                                                        <span class="label label-danger">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                                                        @endif
                                                        <br/>
                                                        <div class="col-md-8">
                                                            {!! Form::text('email', $value = ' ' , ['class' => 'aa-checkout-single-bill']) !!}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        {!! Form::label('address', trans('fontend.address'), ['class' => 'control-label' ]) !!}
                                                        @if ($errors->has('txtaddress'))
                                                        <span class="label label-danger">
                                                            <strong>{{ $errors->first('txtaddress') }}</strong>
                                                        </span>
                                                        @endif
                                                        <br/>
                                                        <div class="col-md-12">
                                                            {{ Form::textarea('txtaddress', $value = '', ['size' => '25x4', 'class' => 'form-control checkout-single-bill']) }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        {!! Form::label('request', trans('fontend.request'), ['class' => 'control-label' ]) !!}
                                                        @if ($errors->has('request1'))
                                                        <span class="label label-danger">
                                                            <strong>{{ $errors->first('request1') }}</strong>
                                                        </span>
                                                        @endif
                                                        <br/>
                                                        <div class="col-md-12">
                                                            {{ Form::textarea('request1', $value = '', ['size' => '25x4', 'class' => 'form-control checkout-single-bill']) }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <br/>
                                                <div class="col-md-4">
                                                    <div class="checkout-right">
                                                    <div class="table-pay aa-order-summary-area">
                                                    <h4>{{ trans('fontend.infor') }}</h4>
                                                        <table class="table table-responsive">
                                                            <thead>
                                                                <tr>
                                                                    <th>{{ trans('fontend.stt') }}</th>
                                                                    <th>{{ trans('fontend.product') }}</th>
                                                                    <th>{{ trans('fontend.quantity') }}</th>
                                                                    <th>{{ trans('fontend.price') }}</th>
                                                                    <th>{{ trans('fontend.size') }}</th>
                                                                    <th>{{ trans('fontend.color') }}</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                             <input type="hidden"  name="id" value="{!! Auth::user()->id !!}">
                                                             <input type="hidden"  name="username" value="{!! Auth::user()->name !!}">
                                                            @php 
                                                                $stt = 0; 
                                                            @endphp
                                                            @foreach( $cart as $item)
                                                            @php 
                                                              $stt = $stt + 1; 
                                                            @endphp
                                                                <tr>
                                                                    <td>{{ $stt }}</td>
                                                                    <td>
                                                                        <input type="hidden"  name="name" value="{!! $item->name !!}">{{ $item->name }}
                                                                        <input type="hidden"  name="idproduct" value="{!! $item->id !!}">
                                                                    </td>
                                                                    <td>
                                                                        <input type="hidden"  name="qty" value="{!! $item->qty !!}">{{ $item->qty }}
                                                                    </td>
                                                                    <td>
                                                                        <input type="hidden"  name="price" value="{!! $item->price !!}">{{ $item->price }}$
                                                                    </td>
                                                                    <td>
                                                                        <input type="hidden"  name="size" value="{!! $item->options->size !!}">{{ $item->options->size }}
                                                                    </td>
                                                                    <td>
                                                                        <input type="hidden"  name="color" value="{!! $item->options->color !!}">{{ $item->options->color }}
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                          <table class="table table-responsive">
                                                            <thead>
                                                                <tr>
                                                                    <th>{{ trans('fontend.stt') }}</th>
                                                                    <th>{{ trans('fontend.totalpro') }}</th>
                                                                    <th>{{ trans('fontend.total') }}</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td> <input type="hidden"  name="count" value="{!! $count !!}">{{ $count }}</td>
                                                                    <td> <input type="hidden"  name="total" value="{!! $total !!}">{{ $total }}$</td>
                                                                </tr>
                                                            </tbody>
                                                        <table>
                                                            
                                                        </table>
                                                    </div>
                                                    <h4>{{ trans('fontend.method') }}</h4>
                                                    <div>
                                                        {!! Form::radio('payment', NULL, $attribute = [ "placeholder" => trans('backend.pleasezise'), "required" => "required"]) !!}
                                                        {{ trans('fontend.normal') }}
                                                        {!! Form::radio('payment', NULL, $attribute = [ "placeholder" => trans('backend.pleasezise'), "required" => "required"]) !!}
                                                        {{ trans('fontend.online') }}
                                                    </div>
                                                    <br/>
                                                    <div id="online" >
                                                    {{ trans('fontend.carnumber') }}
                                                     {!! Form::text('cartnumber', NULL , ['class' => 'aa-checkout-single-bill']) !!}
                                                    {{ trans('fontend.cvc') }}
                                                        {!! Form::text('cvc', $value = ' ' , ['class' => 'aa-checkout-single-bill']) !!}
                                                    {{ trans('fontend.expm') }}
                                                        {!! Form::text('expmonth', $value = ' ' , ['class' => 'aa-checkout-single-bill']) !!}
                                                    {{ trans('fontend.expy') }}
                                                        {!! Form::text('extyear', $value = ' ' , ['class' => 'aa-checkout-single-bill']) !!}
                                                     
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                             {!! Form::submit(trans('fontend.order'), ['class' => 'order btn btn-info glyphicon glyphicon-plus', 'id' => 'order']) !!}
                                            </div>
                                            @else  
                                            <div class="panel-heading">
                                                    <h4><a href="{!! url('auth/get-login')!!}"  id="loginpay">{!! trans('fontend.login') !!}</a> {!! trans('fontend.faster') !!}</h4>
                                                <div class="form-group">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                {{ Form::close() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</section>

@include('frontend.blocks.section-subscribe')

@include('frontend.blocks.footer')

@include('frontend.blocks.important')