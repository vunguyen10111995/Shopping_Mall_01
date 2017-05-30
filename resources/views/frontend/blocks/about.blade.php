@include('frontend.blocks.necessary')

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
@include('frontend.blocks.section-subscribe')

@include('frontend.blocks.footer')

@include('frontend.blocks.important')
