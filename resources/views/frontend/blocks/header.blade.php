<header id="aa-header">
    <div class="aa-header-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-header-top-area">
                        <div class="aa-header-top-left">
                            <div class="aa-language">
                            </div>
                        </div>
                        <div class="aa-header-top-right">
                            <ul class="aa-head-top-nav-right">
                                <li class="hidden-xs"><a href="{{ url('wishlist') }}">{{ trans('fontend.wishlist') }}</a></li>
                                <li class="hidden-xs"><a href="{!! url('cart') !!}">{{ trans('fontend.mycart') }}</a></li>
                                <li class="hidden-xs"><a href="{!! url('payment-shop') !!}">{{ trans('fontend.order') }}</a></li>
                                @if (Auth::check())
                                    <li>{!! Auth::user()->name !!}</li> |
                                    <li class="hidden-xs"><a href="{{ url('auth/logout') }}">{{ trans('fontend.logout')}}</a></li>
                                    @else
                                    <li><a href="{{ url('auth/get-login') }}" target="_blank">{{ trans('fontend.login') }}</a></li>
                                    <li class="hidden-xs"><a href="{{ url('auth/register') }}">{{ trans('fontend.register')}}</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="aa-header-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-header-bottom-area">
                        <div class="aa-logo">
                            <a href="{!! url('/') !!}">
                                <a href="index.html">
                                    <span class="fa fa-shopping-cart"></span>
                                    <p>{{ trans('fontend.daily') }}<strong>{{ trans('fontend.shop') }}</strong> <span>{{ trans('fontend.your shopping') }}</span></p>
                                </a>
                            </a>
                        </div>
                        <div class="aa-cartbox">
                            <a class="aa-cart-link" href="{!! url('payment-shop') !!}">
                                <span class="fa fa-shopping-basket"></span>
                                <span class="aa-cart-title">{{ trans('fontend.shoppingcart') }}</span>
                                <span class="number aa-cart-notify">{{ $count }}</span>
                            </a>
                        </div>
                        <div class="aa-search-box">
                            {{ Form::open([
                                        'method' => 'POST',
                                        'route' => 'searchproduct'
                                        ]) }} 
                                {!! Form::text('searchproduct', $value = null, 
                                    $attribute = [
                                        'class' => 'form-control col-md-7 col-xs-12', 
                                        "placeholder" => trans('fontend.search')
                                    ]) !!}        
                                <button type="submit"><span class="fa fa-search"></span></button>
                            {{ Form::close() }}
                        </div>        
                </div>
            </div>
        </div>
    </div>
</div>
</header>
