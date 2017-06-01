<div class="aa-product-catg-body">
    <ul class="aa-product-catg">
        @foreach($product as $pro)
        <li>
            <figure>
            <a class="aa-product-img" href=""><img src="{{ $pro->product_image}}" alt="polo shirt img" class="image" id="product"></a>
                <a class="aa-add-card-btn" href="#"><span class="fa fa-shopping-cart"></span>{{ trans('fontend.add to cart') }}</a>
                <figcaption>
                    <h4 class="aa-product-title"><a href="#" class="name">{{ $pro->product_name }}</a></h4>
                    <span class="price">{{ $pro->price }}$</span>
                </figcaption>
            </figure>
            <div class="aa-product-hvr-content">
                <a href="#" data-toggle="tooltip" data-placement="top"><span class="fa fa-heart-o"></span></a>
                <a href="#" data-toggle="tooltip" data-placement="top"><span class="fa fa-exchange"></span></a>
                <a href="#" data-toggle2="tooltip" data-placement="top" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
            </div>
        </li>
        @endforeach
    </ul>
    <div class="add3">
        <a href="" class="spanadd4">{{ trans('fontend.see') }}</a>
    </div>
</div>
