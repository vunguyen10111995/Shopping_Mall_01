<section id="aa-popular-category">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="aa-popular-category-area">
                        <ul class="nav nav-tabs aa-products-tab">
                            <li><a href="#latest" data-toggle="tab">{{ trans('fontend.lastest') }}</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="popular">
                                <ul class="aa-product-catg aa-popular-slider">
                                    @foreach($product as $value)
                                    @if ($value->saleoff == 0)
                                    <li>
                                        <figure>
                                            <a class="aa-product-img" href="{{ url('detail-product', [$value->id, $value->product_name]) }}"><img src="{{ $value->product_image }}" alt="polo shirt img" id="" class="image" width="200" heigth ='200'></a>
                                            <a class="aa-add-card-btn" href="{{ url('detail-product', [$value->id, $value->product_name]) }}"><span class="fa fa-shopping-cart"></span>{{ trans('fontend.detail') }}</a>
                                            <figcaption>
                                                <h4 class="aa-product-title"><a href="{{ url('detail-product', [$value->id, $value->product_name]) }}" class="name">{{ $value->product_name }}</a></h4>
                                                <span class="price">{{ $value->price }}$</span>
                                            </figcaption>
                                        </figure>
                                        <div class="aa-product-hvr-content">
                                            <a data-id={{ $value->id }} href="javascript:Void(0)" data-href="{!! action('ProductController@ajax', $value->id )!!}"
                                                 data-toggle2="tooltip" data-placement="top"  data-toggle="modal" data-target="#quick-view-modal" class="search1"><span class="fa fa-search"></span></a>
                                        </div>
                                    </li>
                                    @else
                                    <li>
                                        <figure>
                                            <a class="aa-product-img" href="{{ url('detail-product', [$value->id, $value->product_name]) }}"><img src="{{ $value->product_image }}" alt="polo shirt img" id="" class="image" width="200" heigth ='200'></a>
                                            <a class="aa-add-card-btn" href="{{ url('detail-product', [$value->id, $value->product_name]) }}"><span class="fa fa-shopping-cart"></span>{{ trans('fontend.detail') }}</a>
                                            <figcaption>
                                                <h4 class="aa-product-title"><a href="{{ url('detail-product', [$value->id, $value->product_name]) }}" class="name">{{ $value->product_name }}</a></h4>
                                                <span class="price">{{ $value->price }}$</span>
                                            </figcaption>
                                        </figure>
                                        <div class="aa-product-hvr-content">
                                           <a data-id={{ $value->id }} href="javascript:Void(0)" data-href="{!! action('ProductController@ajax', $value->id )!!}"
                                                 data-toggle2="tooltip" data-placement="top"  data-toggle="modal" data-target="#quick-view-modal" class="search1"><span class="fa fa-search"></span></a>
                                        </div>
                                        <span class="aa-badge aa-sale" href="#">{{ trans('fontend.sale') }}</span>
                                    </li>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@include('frontend.blocks.modal');
