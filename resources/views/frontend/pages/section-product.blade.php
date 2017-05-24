<section id="aa-product">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="aa-product-area">
                        <div class="aa-product-inner">
                            <ul class="nav nav-tabs aa-products-tab">
                                <li class="active"><a href="#men" data-toggle="tab">{!! trans('fontend.men') !!}</a></li>
                                <li><a href="#women" data-toggle="tab">{!! trans('fontend.women') !!}</a></li>
                                <li><a href="#sports" data-toggle="tab">{!! trans('fontend.sports') !!}</a></li>
                                <li><a href="#electronics" data-toggle="tab">{!! trans('fontend.electronics') !!}</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="men">
                                    <ul class="aa-product-catg">
                                        @foreach( $product as $item)
                                        @if($item->saleoff == 0)
                                        <li>
                                            <figure>
                                                <a class="aa-product-img" href="#"><img src="{!! $item->product_image !!}" alt="polo shirt img" style="height: 300px;"></a>
                                                <a class="aa-add-card-btn" href="#"><span class="fa fa-shopping-cart"></span>{{ trans('fontend.add to cart') }}</a>
                                                <figcaption>
                                                    <h4 class="aa-product-title"><a href="#">{{ $item->product_name }}</a></h4>
                                                    <span class="aa-product-price">${{ number_format($item->price, 0, ",", ".")}}</span><span class="aa-product-price"><del>{{ trans('fontend.65,50s') }}</del></span>
                                                </figcaption>
                                            </figure>                                                
                                            <div class="aa-product-hvr-content">
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                                                <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>                                                    
                                            </div>
                                        </li>
                                        @else
                                        <li>
                                            <figure>
                                                <a class="aa-product-img" href="#"><img src="{!! $item->product_image !!}" alt="polo shirt img" style="height: 300px;"></a>
                                                <a class="aa-add-card-btn" href="#"><span class="fa fa-shopping-cart"></span>{{ trans('fontend.add to cart') }}</a>
                                                <figcaption>
                                                    <h4 class="aa-product-title"><a href="#">{{ $item->product_name }}</a></h4>
                                                    <span class="aa-product-price">${{ number_format($item->price, 0, ",", ".")}}</span><span class="aa-product-price"><del>{{ trans('fontend.65,50s') }}</del></span>
                                                </figcaption>
                                            </figure>                                                
                                            <div class="aa-product-hvr-content">
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                                                <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>                                                    
                                            </div>
                                            <span class="aa-badge aa-sale" href="#">{{ trans('fontend.sale') }}</span>
                                        </li>
                                        @endif 
                                        @endforeach                                          
                                    </ul>
                                    <a class="aa-browse-btn" href="#">{{ trans('fontend.xem thêm sản phẩm') }}<span class="fa fa-long-arrow-right"></span></a>
                                </div>
                            </div>
                        </section>
