<link href="{!!asset('bower_components/fontawesome/css/font-awesome.css')!!}" rel="stylesheet">
<link href="{!!asset('frontend/css/bootstrap.css')!!}" rel="stylesheet">
<link href="{!!asset('frontend/css/slick.css')!!}" rel="stylesheet">
<link href="{!!asset('frontend/css/theme-color/default-theme.css')!!}" rel="stylesheet">
<link href="{!!asset('frontend/css/style.css')!!}" rel="stylesheet">
</head>
@include('frontend.blocks.header')
@include('frontend.blocks.section-menu')
<section id="aa-catg-head-banner">
    <img src="{!!asset('frontend/img/fashion/fashion-header-bg-8.jpg')!!}" alt="fashion img" style="height: 80%">
    <div class="aa-catg-head-banner-area">
        <div class="container">
            <div class="aa-catg-head-banner-content">
                <h2>{{trans('fontend.contact')}}</h2>
                <ol class="breadcrumb">       
                <li class="active">{{ trans('fontend.contact') }}</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section id="aa-contact">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="aa-contact-area">
                    <div class="aa-contact-top">
                        <h2>{{ trans('fontend.we') }}</h2>
                        <p>{{ trans('fontend.simply') }}</p>
                    </div>
                    <div class="aa-contact-map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.579938611264!2d105.85363031450439!3d21.009468986008844!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135abf5aeab3489%3A0x9f30c5a7fd036e19!2zNDM0IFRy4bqnbiBLaMOhdCBDaMOibiwgUGjhu5EgSHXhur8sIEhhaSBCw6AgVHLGsG5nLCBIw6AgTuG7mWksIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1492566904888" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                    <div class="aa-contact-address">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="aa-contact-address-left">
                                    <form class="comments-form contact-form" action="">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">                        
                                                  <input type="text" placeholder="Your Name" class="form-control">
                                              </div>
                                          </div>
                                          <div class="col-md-6">
                                            <div class="form-group">                        
                                              <input type="email" placeholder="Email" class="form-control">
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">                        
                                          <input type="text" placeholder="Subject" class="form-control">
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">                        
                                      <input type="text" placeholder="Company" class="form-control">
                                  </div>
                              </div>
                          </div>                  
                          <div class="form-group">                        
                            <textarea class="form-control" rows="3" placeholder="Message"></textarea>
                        </div>
                        <button class="aa-secondary-btn">{{ trans('fontend.send') }}</button>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <div class="aa-contact-address-right">
                    <address>
                        <h4>{{ trans('fontend.dailyshop') }}</h4>
                        <p>{{ trans('fontend.loremispum') }}</p> 
                        <p><span class="fa fa-home"></span>{{ trans('fontend.434') }}</p>
                        <p><span class="fa fa-phone"></span>{{ trans('fontend.+ 021.343.7575') }}</p>
                        <p><span class="fa fa-envelope"></span>{{ trans('fontend.email') }}</p>
                    </address>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</section>
<section id="aa-subscribe">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="aa-subscribe-area">
                    <h3>{{trans('fontend.subscribe')}} </h3>
                    <p>{{trans('fontend.loremispum')}}</p>
                    <form action="" class="aa-subscribe-form">
                        <input type="email" name="" id="" placeholder="Enter your Email">
                        <input type="submit" value="Subscribe">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@include('frontend.blocks.footer')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 
<script src="{!!asset('frontend/js/bootstrap.js')!!}"></script>
<script src="{!!asset('frontend/js/jquery.simpleGallery.js')!!}"></script>
<script src="{!!asset('frontend/js/jquery.simpleLens.js')!!}"></script>
<script src="{!!asset('frontend/js/slick.js')!!}"></script>
<script src="{!!asset('frontend/js/custom.js')!!}"></script>
