<link href="{!!asset('bower_components/fontawesome/css/font-awesome.css')!!}" rel="stylesheet">
<link href="{!!asset('frontend/css/bootstrap.css')!!}" rel="stylesheet">
<link href="{!!asset('frontend/css/slick.css')!!}" rel="stylesheet">
<link href="{!!asset('frontend/css/theme-color/default-theme.css')!!}" rel="stylesheet">
<link href="{!!asset('frontend/css/style.css')!!}" rel="stylesheet">
@include('frontend.blocks.header')
@include('frontend.blocks.section-menu')
<div class="container">
    <section id="aa-blog-archive">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-blog-archive-area">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="aa-blog-content aa-blog-details">
                                    <article class="aa-blog-content-single">                        
                                        <h2 class="text-center">{{ trans('fontend.gioithieu') }}</h2>
                                        <hr/><br/>
                                        <p>{{trans('fontend.congty')}}</p>
                                        <ul>
                                            <li>{{ trans('fontend.muadong') }}</li>
                                            <li>{{ trans('fontend.muahe') }}</li>
                                            <li>{{ trans('fontend.sanpham') }}</li>
                                        </ul>
                                        <p>{{ trans('fontend.nhucau') }}</p>
                                        <p>{{ trans('fontend.noluc') }}</p>
                                    </article>
                                </div>
                            </div>
                        </div>           
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@include('frontend.blocks.footer')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 
<script src="{!!asset('frontend/js/bootstrap.js')!!}"></script>
<script src="{!!asset('frontend/js/jquery.simpleGallery.js')!!}"></script>
<script src="{!!asset('frontend/js/jquery.simpleLens.js')!!}"></script>
<script src="{!!asset('frontend/js/slick.js')!!}"></script>
<script src="{!!asset('frontend/js/custom.js')!!}"></script>
