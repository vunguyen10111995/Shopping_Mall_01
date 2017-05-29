    @include('frontend.blocks.necessary')

    @include('frontend.blocks.header')

    @include('frontend.blocks.section-menu')

    @include('frontend.blocks.slider')

    <section id="aa-product-category">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-8 col-md-push-3">
                    <div class="aa-product-catg-content">
                        <div class="aa-product-catg-head">
                            <div class="aa-product-catg-head-left">
                                <form action="" class="aa-sort-form">
                                    <label for="">{{ trans('fontend.sort')}}</label>
                                    <select name="">
                                        <option value="1" selected="Default">{{ trans('fontend.default') }}</option>
                                        <option value="2">{{ trans('fontend.name') }}</option>
                                        <option value="3">{{ trans('fontend.price') }}</option>
                                        <option value="4">{{ trans('fontend.date') }}</option>
                                    </select>
                                </form>
                                <form action="" class="aa-show-form">
                                    <label for="">{{ trans('fontend.show')}}</label>
                                    <select name="">
                                        <option value="1" selected="12">{{ trans('fontend.12')}}</option>
                                        <option value="2">{{ trans('fontend.24')}}</option>
                                        <option value="3">{{ trans('fontend.36')}}</option>
                                    </select>
                                </form>
                            </div>
                            <div class="aa-product-catg-head-right">
                                <a id="grid-catg" href="#"><span class="fa fa-th"></span></a>
                                <a id="list-catg" href="#"><span class="fa fa-list"></span></a>
                            </div>
                        </div>
                        <div class="aa-product-catg-body">
                            <ul class="aa-product-catg">
                                @foreach( $productCategory as $item)
                                @if ($item->saleoff == 0)
                                <li>
                                    <figure>
                                    <a class="aa-product-img" href="{{ url('detail-product', [$item->id, $item->product_name]) }}"><img src="{!! $item->product_image !!}" alt="polo shirt img"  style="height: 330px;"></a>
                                        <a class="aa-add-card-btn" href="{{ url('detail-product', [$item->id, $item->product_name]) }}"><span class="fa fa-shopping-cart"></span>{{ trans('fontend.detail') }}</a>
                                        <figcaption>
                                            <h4 class="aa-product-title"><a href="{{ url('detail-product', [$item->id, $item->product_name]) }}">{{ $item->product_name }}</a></h4>
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
                                        <a class="aa-product-img" href="{{ url('detail-product', [$item->id, $item->product_name]) }}"><img src="{!! $item->product_image !!}" alt="polo shirt img"  style="height: 330px;"></a>
                                        <a class="aa-add-card-btn" href=" {{ url('detail-product', [$item->id, $item->product_name]) }}"> <span class="fa fa-shopping-cart"></span>{{ trans('fontend.detail') }}</a>
                                        <figcaption>
                                            <h4 class="aa-product-title"><a href="{{ url('detail-product', [$item->id, $item->product_name]) }}">{{ $item->product_name }}</a></h4>
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
                            <div class="clearfix"></div>
                            {{ trans('fontend.totalpage') }}: {!! $productCategory->lastPage() !!}
                            <div class="clearfix"></div>
                            <ul class="pagination">
                                @if ($productCategory->currentPage() != 1)
                                    <li><a href="{{ str_replace('/?', '?', $productCategory->url($productCategory->currentPage() - 1)) }}">&laquo;</a></li>
                                @endif
                                @for ( $i = 1; $i <= $productCategory->lastPage(); $i = $i + 1)
                                    <li class="{!! ($productCategory->currentPage() == $i) ? 'active' : '' !!}">
                                        <a href="{{ str_replace('/?', '?', $productCategory->url($i)) }}">{{ $i }}</a>
                                    </li>
                                @endfor
                                @if ($productCategory->currentPage() != $productCategory->lastPage())
                                    <li>
                                    <a href="{{ str_replace('/?', '?', $productCategory->url($productCategory->currentPage() + 1)) }}">&raquo;</a>
                                    </li>
                                @endif 
                            </ul>
                            <!-- quick view modal -->                  
                            <div class="modal fade" id="quick-view-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <div class="row">
                                                <!-- Modal view slider -->
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="aa-product-view-slider">
                                                        <div class="simpleLens-gallery-container" id="demo-1">
                                                            <div class="simpleLens-container">
                                                                <div class="simpleLens-big-image-container">
                                                                    <a class="simpleLens-lens-image" data-lens-image="img/view-slider/large/polo-shirt-1.png">
                                                                        <img src="img/view-slider/medium/polo-shirt-1.png" class="simpleLens-big-image">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="simpleLens-thumbnails-container">
                                                                <a href="#" class="simpleLens-thumbnail-wrapper"
                                                                data-lens-image="img/view-slider/large/polo-shirt-1.png"
                                                                data-big-image="img/view-slider/medium/polo-shirt-1.png">
                                                                <img src="img/view-slider/thumbnail/polo-shirt-1.png">
                                                            </a>
                                                            <a href="#" class="simpleLens-thumbnail-wrapper"
                                                            data-lens-image="img/view-slider/large/polo-shirt-3.png"
                                                            data-big-image="img/view-slider/medium/polo-shirt-3.png">
                                                            <img src="img/view-slider/thumbnail/polo-shirt-3.png">
                                                        </a>

                                                        <a href="#" class="simpleLens-thumbnail-wrapper"
                                                        data-lens-image="img/view-slider/large/polo-shirt-4.png"
                                                        data-big-image="img/view-slider/medium/polo-shirt-4.png">
                                                        <img src="img/view-slider/thumbnail/polo-shirt-4.png">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-4 col-md-pull-9">
        <aside class="aa-sidebar">
            <div class="aa-sidebar-widget">
            @include('frontend.blocks.factory')
        </aside>
    </div>
</div>
</div>
</section>
@include('frontend.blocks.section-subscribe')

@include('frontend.blocks.footer')

@include('frontend.blocks.important')
