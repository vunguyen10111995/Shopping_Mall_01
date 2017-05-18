 <section id="aa-popular-category">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="row">
          <div class="aa-popular-category-area">
           <ul class="nav nav-tabs aa-products-tab">
            <li class="active"><a href="#popular" data-toggle="tab">{{  trans('fontend.popular')  }}</a></li>
            <li><a href="#featured" data-toggle="tab">{{  trans('fontend.featured')  }}</a></li>
            <li><a href="#latest" data-toggle="tab">{{  trans('fontend.lastest')  }}</a></li>      
          </ul>
          <div class="tab-content">
            <div class="tab-pane fade in active" id="popular">
              <ul class="aa-product-catg aa-popular-slider">
                <li>
                 <figure>
                  <a class="aa-product-img" href="#"><img src="{!!  url('frontend/img/man/polo-shirt-2.png') !!}" alt="polo shirt img"></a>
                  <a class="aa-add-card-btn" href="#"><span class="fa fa-shopping-cart"></span>{{ trans('fontend.add to cart') }}</a>
                  <figcaption>
                    <h4 class="aa-product-title"><a href="#">{{ trans('fontend.polo t-shirt') }}</a></h4>
                    <span class="aa-product-price">{{ trans('fontend.45,50s') }}</span><span class="aa-product-price"><del>{{ trans('fontend.65,50s') }}</del></span>
                  </figcaption>
                </figure>
                <div class="aa-product-hvr-content">
                  <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                  <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                  <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>                            
                </div>
                <span class="aa-badge aa-sale" href="#">{{ trans('fontend.sale') }}</span>
              </li>
              <li>
                <figure>
                  <a class="aa-product-img" href="#"><img src="img/women/girl-2.png" alt="polo shirt img"></a>
                  <a class="aa-add-card-btn" href="#"><span class="fa fa-shopping-cart"></span>{{ trans('fontend.add to cart') }}</a>
                  <figcaption>
                    <h4 class="aa-product-title"><a href="#">{{ trans('fontend.loremispumlorem') }}</a></h4>
                    <span class="aa-product-price">{{ trans('fontend.45,50s') }}</span>
                  </figcaption>
                </figure>                      
                <div class="aa-product-hvr-content">
                  <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                  <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                  <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                </div>
                <span class="aa-badge aa-sold-out" href="#">{{ trans('fontend.soldout') }}</span>
              </li>
              <li>
                <figure>
                  <a class="aa-product-img" href="#"><img src="img/man/t-shirt-1.png" alt="polo shirt img"></a>
                  <a class="aa-add-card-btn" href="#"><span class="fa fa-shopping-cart"></span>{{ trans('fontend.add to cart') }}</a>
                </figure>
                <figcaption>
                 <h4 class="aa-product-title"><a href="#">{{ trans('fontend.t-shirt') }}</a></h4>
                 <span class="aa-product-price">{{ trans('fontend.45,50s') }}</span>
               </figcaption>
               <div class="aa-product-hvr-content">
                <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
              </div>
              <span class="aa-badge aa-sold-out" href="#">{{ trans('fontend.soldout') }}</span>
            </li>
            <li>
              <figure>
                <a class="aa-product-img" href="#"><img src="img/women/girl-3.png" alt="polo shirt img"></a>
                <a class="aa-add-card-btn" href="#"><span class="fa fa-shopping-cart"></span>{{ trans('fontend.add to cart') }}</a>
                <figcaption>
                  <h4 class="aa-product-title"><a href="#">{{ trans('fontend.loremispumlorem') }}</a></h4>
                  <span class="aa-product-price">{{ trans('fontend.45,50s') }}</span><span class="aa-product-price"><del>{{ trans('fontend.65,50s') }}</del></span>
                </figcaption>
              </figure>                     
              <div class="aa-product-hvr-content">
                <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
              </div>
            </li>
            <li>
              <figure>
                <a class="aa-product-img" href="#"><img src="img/man/polo-shirt-1.png" alt="polo shirt img"></a>
                <a class="aa-add-card-btn" href="#"><span class="fa fa-shopping-cart"></span>{{ trans('fontend.add to cart') }}</a>
                <figcaption>
                 <h4 class="aa-product-title"><a href="#">{{ trans('fontend.t-shirt') }}</a></h4>
                 <span class="aa-product-price">{{ trans('fontend.45,50s') }}</span>
               </figcaption>
             </figure>                      
             <div class="aa-product-hvr-content">
              <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
              <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
              <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
            </div>
          </li>                                                                  
        </ul>
        <a class="aa-browse-btn" href="#">{{ trans('fontend.view') }} <span class="fa fa-long-arrow-right"></span></a>
      </div>           
    </div>
  </div>
</div> 
</div>
</div>
</div>
</section>
