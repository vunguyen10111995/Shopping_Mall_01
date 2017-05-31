<section id="aa-product">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="aa-product-area">
                        <div class="aa-product-inner">
                            <ul class="nav nav-tabs aa-products-tab">
                                @foreach ($categories as $category)
                                <li><a data-href="{!! action('ProductController@productajax', $category->id )!!}" data-toggle="tab" class="category" id="category{{$category->id}}" cate_id="{{$category->id}}">{!! $category->cate_name !!}</a></li>
                                @endforeach
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="show_product">
                                    <ul class="aa-product-catg">
                                         @foreach($productmenu as $value)
                                        <li>
                                            <figure>
                                                <a class="aa-product-img" href=""><img src="{{ $value->product_image }}" alt="polo shirt img" id="" class="image" width="200" heigth ='200'></a>
                                                <a class="aa-add-card-btn" href="#"><span class="fa fa-shopping-cart"></span>{{ trans('fontend.add to cart') }}</a>
                                                <figcaption>
                                                    <h4 class="aa-product-title"><a href="#" class="name">{{ $value->product_name }}</a></h4>
                                                    <span class="price">{{ $value->price }}$</span>
                                                </figcaption>
                                            </figure>
                                            <div class="aa-product-hvr-content">

                                                <a href="#" data-toggle="tooltip" data-placement="top" ><span class="fa fa-heart-o"></span></a>
                                                <a href="#" data-toggle="tooltip" data-placement="top" ><span class="fa fa-exchange"></span></a>
                                                <a href="#" data-toggle2="tooltip" data-placement="top"  data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                                            </div>
                                            <span class="aa-badge aa-sold-out" href="#">{{ trans('fontend.soldout') }}</span>
                                        </li>
                                        @endforeach
                                    </ul>
                                    <a class="aa-browse-btn" id="product" href="#">{{ trans('fontend.see') }}<span class="fa fa-long-arrow-right"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
