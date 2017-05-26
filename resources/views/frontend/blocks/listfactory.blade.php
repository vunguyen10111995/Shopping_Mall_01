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
                    </div>
                    <div class="aa-product-catg-body">
                        <ul class="aa-product-catg">
                            @foreach( $product as $productfactory)
                            <li>
                                <figure>
                                    <a class="aa-product-img" href="#"><img src="{{ $productfactory->product_image }}" alt="{{ $productfactory->product_name }}" style="height: 300px;"></a>
                                    <a class="aa-add-card-btn" href="#"><span class="fa fa-shopping-cart"></span>{{ trans('fontend.add to cart') }}</a>
                                    <figcaption>
                                        <h4 class="aa-product-title"><a href="#">{{ $productfactory->product_name }}</a></h4>
                                        <span class="aa-product-price">{{ $productfactory->price }}</span><span class="aa-product-price"></span>
                                        <p class="aa-product-descrip">{{ $productfactory->description }}</p>
                                    </figcaption>
                                </figure>
                                <div class="aa-product-hvr-content search">
                                    <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                                    <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                                    <a href="#" data-href="" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"  data-id="{{
                                        $productfactory->id }}" class="search"><span class="fa fa-search" ></span></a>
                                    </div>
                                    <span class="aa-badge aa-sale" href="#">{{ trans('fontend.sale') }}</span>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-4 col-md-pull-9">
                    <aside class="aa-sidebar">
                        @include('frontend.blocks.factory')
                    </aside>
                </div>
            </div>
        </div>
    </section>
    @include('frontend.blocks.section-subscribe')

    @include('frontend.blocks.footer')

    @include('frontend.blocks.important')
