<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <link href="{!! asset('frontend/css/font-awesome.css') !!}" rel="stylesheet"> 
    <link href="{!! asset('frontend/css/bootstrap.css') !!}" rel="stylesheet">
    <link href="{!! asset('frontend/css/slick.css') !!}" rel="stylesheet">
    <link href="{!! asset('frontend/css/default-theme.css') !!}" rel="stylesheet">
    <link href="{!! asset('frontend/css/style.css') !!}" rel="stylesheet">

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
                                    <label for="">Sort by</label>
                                    <select name="">
                                        <option value="1" selected="Default">Default</option>
                                        <option value="2">Name</option>
                                        <option value="3">Price</option>
                                        <option value="4">Date</option>
                                    </select>
                                </form>
                                <form action="" class="aa-show-form">
                                    <label for="">Show</label>
                                    <select name="">
                                        <option value="1" selected="12">12</option>
                                        <option value="2">24</option>
                                        <option value="3">36</option>
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
                                @if($item->saleoff == 0)
                                <li>
                                    <figure>
                                    <a class="aa-product-img" href="#"><img src="{!! $item->product_image !!}" alt="polo shirt img"  style="height: 330px;"></a>
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
                                        <a class="aa-product-img" href="#"><img src="{!!  $item->product_image !!}" alt="polo shirt img"  style="height: 330px;"></a>
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
                                    <!-- Modal view content -->
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="aa-product-view-content">
                                            <h3>T-Shirt</h3>
                                            <div class="aa-price-block">
                                                <span class="aa-product-view-price">$34.99</span>
                                                <p class="aa-product-avilability">Avilability: <span>In stock</span></p>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis animi, veritatis quae repudiandae quod nulla porro quidem, itaque quis quaerat!</p>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-4 col-md-pull-9">
        <aside class="aa-sidebar">
            <div class="aa-sidebar-widget">
                <h3>Category</h3>
                <ul class="aa-catg-nav">
                    <li><a href="#">Men</a></li>
                    <li><a href="">Women</a></li>
                    <li><a href="">Kids</a></li>
                    <li><a href="">Electornics</a></li>
                    <li><a href="">Sports</a></li>
                </ul>
            </div>
            <div class="aa-sidebar-widget">
                <h3>Recently Views</h3>
                <div class="aa-recently-views">
                    <ul>
                        <li>
                            <a href="#" class="aa-cartbox-img"><img alt="img" src="img/woman-small-2.jpg"></a>
                            <div class="aa-cartbox-info">
                                <h4><a href="#">Product Name</a></h4>
                                <p>1 x $250</p>
                            </div>                    
                        </li>
                        <li>
                            <a href="#" class="aa-cartbox-img"><img alt="img" src="img/woman-small-1.jpg"></a>
                            <div class="aa-cartbox-info">
                                <h4><a href="#">Product Name</a></h4>
                                <p>1 x $250</p>
                            </div>                    
                        </li>
                        <li>
                            <a href="#" class="aa-cartbox-img"><img alt="img" src="img/woman-small-2.jpg"></a>
                            <div class="aa-cartbox-info">
                                <h4><a href="#">Product Name</a></h4>
                                <p>1 x $250</p>
                            </div>
                        </li>                                      
                    </ul>
                </div>                            
            </div>
            <div class="aa-sidebar-widget">
                <h3>Top Rated Products</h3>
                <div class="aa-recently-views">
                    <ul>
                        <li>
                            <a href="#" class="aa-cartbox-img"><img alt="img" src="img/woman-small-2.jpg"></a>
                            <div class="aa-cartbox-info">
                                <h4><a href="#">Product Name</a></h4>
                                <p>1 x $250</p>
                            </div>                    
                        </li>
                        <li>
                            <a href="#" class="aa-cartbox-img"><img alt="img" src="img/woman-small-1.jpg"></a>
                            <div class="aa-cartbox-info">
                                <h4><a href="#">Product Name</a></h4>
                                <p>1 x $250</p>
                            </div>                    
                        </li>
                        <li>
                            <a href="#" class="aa-cartbox-img"><img alt="img" src="img/woman-small-2.jpg"></a>
                            <div class="aa-cartbox-info">
                                <h4><a href="#">Product Name</a></h4>
                                <p>1 x $250</p>
                            </div>                    
                        </li>                                      
                    </ul>
                </div>                            
            </div>
        </aside>
    </div> 
</div>
</div>
</section>
@include('frontend.blocks.section-subscribe')

@include('frontend.blocks.footer')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="{!! asset('frontend/js/bootstrap.js') !!}"></script>  
<script src="{!! asset('frontend/js/jquery.smartmenus.js') !!}"></script>
<script src="{!! asset('frontend/js/jquery.smartmenus.bootstrap.js') !!}"></script>  
<script src="{!! asset('frontend/js/jquery.simpleGallery.js') !!}"></script>
<script src="{!! asset('frontend/js/jquery.simpleLens.js') !!}"></script>
<script src="{!! asset('frontend/js/slick.js') !!}"></script>
<script src="{!! asset('frontend/js/nouislider.js') !!}"></script>
<script src="{!! asset('frontend/js/custom.js') !!}"></script> 
<script src="{!! asset('frontend/js/mai.js') !!}"></script> 
</body>
</html>
