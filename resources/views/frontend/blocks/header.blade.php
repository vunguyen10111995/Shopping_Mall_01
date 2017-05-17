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
                            <li class="hidden-xs"><a href="wishlist.html">{{ trans('fontend.wishlist') }}</a></li>
                                <li class="hidden-xs"><a href="cart.html">{{ trans('fontend.mycart') }}</a></li>
                                <li class="hidden-xs"><a href="checkout.html">{{ trans('fontend.checkout')}}</a></li>
                                <li><a href="" data-toggle="modal" data-target="#login-modal">{{ trans('fontend.login') }}</a></li>
                            </ul>
                        </div>
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
                            <a class="aa-cart-link" href="#">
                                <span class="fa fa-shopping-basket"></span>
                                <span class="aa-cart-title">{{ trans('fontend.shoppingcart') }}</span>
                                <span class="aa-cart-notify">{{ trans('fontend.so') }}</span>
                            </a>
                            <div class="aa-cartbox-summary">
                                <ul>
                                    <li>
                                        <a class="aa-cartbox-img" href="#"><img src="{!! url('frontend/img/woman-small-2.jpg') !!}" alt="img"></a>
                                        <div class="aa-cartbox-info">
                                            <h4><a href="#">{{ trans('fontend.product_name') }}</a></h4>
                                            <p>{{ trans('fontend.1 x $250') }}</p>
                                        </div>
                                        <a class="aa-remove-product" href="#"><span class="fa fa-times"></span></a>
                                    </li>
                                    <span class="aa-cartbox-total-title">
                                        {{ trans('fontend.total') }}
                                    </span>
                                    <span class="aa-cartbox-total-price">
                                        {{ trans('fontend.$500') }}
                                    </span>
                                </li>
                            </ul>
                            <a class="aa-cartbox-checkout aa-primary-btn" href="checkout.html">{{ trans('fontend.checkout') }}</a>
                        </div>
                    </div>
                    <div class="aa-search-box">
                        <form action="">
                            <input type="text" name="" id="" placeholder="Search here ex. 'man' ">
                            <button type="submit"><span class="fa fa-search"></span></button>
                        </form>
                    </div>        
                </div>
            </div>
        </div>
    </div>
</div>
</header>
