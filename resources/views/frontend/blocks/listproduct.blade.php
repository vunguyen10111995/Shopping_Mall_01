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
                                            <span class="aa-product-price">${{ number_format($item->price, 0, ",", ".")}}</span>
                                             <p class="aa-product-descrip">{!! $item->description !!}</p>
                                        </figcaption>
                                    </figure>
                                    <div class="aa-product-hvr-content">
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                                        <a  href="javascript:Void(0)" data-href="{!! action('ProductController@ajax', $item->id )!!}" class="search1"  data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                                    </div>
                                </li>
                                @else
                                <li>
                                    <figure>
                                        <a class="aa-product-img" href="{{ url('detail-product', [$item->id, $item->product_name]) }}"><img src="{!! $item->product_image !!}" alt="polo shirt img"  style="height: 330px;"></a>
                                        <a class="aa-add-card-btn" href=" {{ url('detail-product', [$item->id, $item->product_name]) }}"> <span class="fa fa-shopping-cart"></span>{{ trans('fontend.detail') }}</a>
                                        <figcaption>
                                            <h4 class="aa-product-title"><a href="{{ url('detail-product', [$item->id, $item->product_name]) }}">{{ $item->product_name }}</a></h4>
                                            <span class="aa-product-price">${{ number_format($item->price, 0, ",", ".")}}</span>
                                            <p class="aa-product-descrip">{!! $item->description !!}</p>
                                        </figcaption>
                                    </figure>
                                    <div class="aa-product-hvr-content">
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                                        <a  href="javascript:Void(0)" data-href="{!! action('ProductController@ajax', $item->id )!!}" data-id="{{$item->id}}" class="search1" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
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
                            @include('frontend.blocks.modal')
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
