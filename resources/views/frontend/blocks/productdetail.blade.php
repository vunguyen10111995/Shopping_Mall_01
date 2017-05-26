    @include('frontend.blocks.necessary')

    @include('frontend.blocks.header')

    @include('frontend.blocks.section-menu')

    <section id="aa-product-details">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-product-details-area">
                        <div class="aa-product-details-content">
                            <div class="row"> 
                                <div class="col-md-5 col-sm-5 col-xs-12">
                                    <div class="aa-product-view-slider">
                                        <div id="demo-1" class="simpleLens-gallery-container">
                                            <div class="simpleLens-container">
                                                <div class="simpleLens-big-image-container">
                                                <a data-lens-image="" class="simpleLens-lens-image"><img src="{{ $productDetail->product_image }}" class="simpleLens-big-image" width="300"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7 col-sm-7 col-xs-12">
                                    <div class="aa-product-view-content">
                                        <h3>{{ $productDetail->product_name }}</h3>
                                        <div class="aa-price-block">
                                            <span class="aa-product-view-price"> $ {{ number_format($productDetail->price, 0, ",", ".")}}</span>
                                        </div>
                                        <div class="aa-prod-view-size">
                                            @php
                                                $htmlSize = null;
                                                if (!empty($productDetail->size_id)) {
                                                    $listsize = unserialize($productDetail->size_id);

                                                    if (count($listsize) > 0) {
                                                        if (count($listsize) == 1) {
                                                            $data = \app\models\size::where('id', $listsize)->get();
                                                        } else {
                                                            $data = \app\models\size::wherein('id', $listsize)->get();
                                                        }
                                                    }
                                                    if (!empty($data)) {
                                                        foreach ($data as $key => $valuesize) {
                                                            $htmlSize[] = $valuesize->size_name;
                                                        }
                                                    }
                                                }

                                                $htmlColor = null;

                                                if (!empty($productDetail->color_id)) {
                                                    $listcolor = unserialize($productDetail->color_id);

                                                    if (count($listcolor) > 0) {
                                                        if (count($listcolor) == 1) {
                                                            $data = \app\models\colors::where('id', $listcolor)->get();
                                                        } else {
                                                            $data = \app\models\colors::wherein('id', $listcolor)->get();
                                                        }
                                                    }
                                                    if (!empty($data)) {
                                                        foreach ($data as $key => $valuecolor) {
                                                            $htmlColor[] = $valuecolor->color_name;
                                                        }
                                                    }
                                                }
                                            @endphp
                                            <h4>{{ trans('messages.size') }}</h4>
                                            @foreach ($htmlSize as $size)
                                                {!! Form::label('size', $size) !!}
                                                {!! Form::checkbox('size[]',$size, NULL, $attribute = [ "placeholder" => trans('backend.pleasezise')]) !!}
                                            @endforeach
                                            <h4>{{ trans('messages.color') }}</h4>
                                            <div class="aa-color-tag">
                                                @foreach ($htmlColor as $color)
                                                {!! Form::label('color', $color) !!}
                                                {!! Form::checkbox('color[]',$color, NULL, $attribute = [ "placeholder" => trans('backend.pleasezise')]) !!}
                                                @endforeach
                                            </div>
                                            <div class="aa-prod-quantity">
                                                <label>{{ trans('messages.quantity') }}</label>
                                                <input type="text" class="span1" id="qty" name="qty" placeholder="1" value="1" size="3" onkeypress="return isNumber(event)">
                                            </div>
                                            <div class="aa-prod-view-bottom">
                                                <a class="aa-add-to-cart-btn" href="#">{{ trans('messages.addtocart') }}</a>
                                                <a class="aa-add-to-cart-btn" href="#">{{ trans('messages.wishlist') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="aa-product-details-bottom">
                                <ul class="nav nav-tabs" id="myTab2">
                                    <li><a href="#description" data-toggle="tab">{{ trans('messages.desciption') }}</a></li>
                                    <li><a href="#review" data-toggle="tab">{{ trans('messages.comment') }} </a></li>
                                    <li><a href="#content" data-toggle="tab">{{ trans('messages.content') }} </a></li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane fade" id="description">
                                    <div class="well">
                                        <div class="alert alert-success" role="alert">{{ trans('messages.desciption') }}</div>
                                        <p>{!! $productDetail->description !!}</p>
                                    </div>
                                    </div>
                                    <div class="tab-pane fade " id="review">
                                        <div class="well">
                                        </div>
                                    </div>
                                    <div class="tab-pane fade " id="content">
                                        <div class="well">
                                         <div class="alert alert-success" role="alert">{{ trans('messages.content') }}</div>
                                        <p>{!! $productDetail->content !!}</p>
                                        </div>
                                    </div>
                                </div>
                            <!-- Related product -->
                            <div class="aa-product-related-item">
                                <h3>{{ trans('messages.relate') }}</h3>
                                <ul class="aa-product-catg aa-related-item-slider">
                                    @foreach( $productCate as $item)
                                        @if($item->saleoff == 0)
                                            <li>
                                                <figure>
                                                    <a class="aa-product-img" href="{{ url('detail-product', [$item->id, $item->product_name]) }}"><img src="{!! $item->product_image !!}" alt="polo shirt img"  style="width: 250px;"></a>
                                                    <a class="aa-add-card-btn" href="#"><span class="fa fa-shopping-cart"></span>{{ trans('fontend.add to cart') }}</a>
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
                                                    <a class="aa-product-img" href="{{ url('detail-product', [$item->id, $item->product_name]) }}"><img src="{!!  $item->product_image !!}" alt="polo shirt img"  style="width: 250px;"></a>
                                                    <a class="aa-add-card-btn" href="#"><span class="fa fa-shopping-cart"></span>{{ trans('fontend.add to cart') }}</a>
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
                                                                <div class="simpleLens-thumbnails-container">
                                                                    <a href="#" class="simpleLens-thumbnail-wrapper"
                                                                    data-lens-image="img/view-slider/large/polo-shirt-1.png"
                                                                    data-big-image="img/view-slider/medium/polo-shirt-1.png">
                                                                    <img src="img/view-slider/thumbnail/polo-shirt-1.png">
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Modal view content -->
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="aa-product-view-content">
                                                        <h3>T-Shirt</h3>
                                                        <div class="aa-price-block">
                                                            <span class="aa-product-view-price">$34.99</span>
                                                            <p class="aa-product-avilability">Avilability: <span>In stock</span></p>
                                                        </div>
                                                        <h4>Size</h4>
                                                        <div class="aa-prod-view-size">
                                                            <a href="#">S</a>
                                                            <a href="#">M</a>
                                                            <a href="#">L</a>
                                                            <a href="#">XL</a>
                                                        </div>
                                                        <div class="aa-prod-quantity">
                                                            <form action="">
                                                                <select name="" id="">
                                                                    <option value="0" selected="1">1</option>
                                                                    <option value="1">2</option>
                                                                    <option value="2">3</option>
                                                                    <option value="3">4</option>
                                                                    <option value="4">5</option>
                                                                    <option value="5">6</option>
                                                                </select>
                                                            </form>
                                                            <p class="aa-prod-category">
                                                                Category: <a href="#">Polo T-Shirt</a>
                                                            </p>
                                                        </div>
                                                        <div class="aa-prod-view-bottom">
                                                            <a href="#" class="aa-add-to-cart-btn"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                                                            <a href="#" class="aa-add-to-cart-btn">View Details</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
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