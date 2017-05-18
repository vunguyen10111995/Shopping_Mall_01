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
    </head>
    <body> 
    <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>

    @include('frontend.blocks.header')

    @include('frontend.blocks.section-menu')

    @include('frontend.blocks.slider')

    @include('frontend.pages.section-product')

    @include('frontend.pages.section-category')

    @include('frontend.blocks.section-support')

    @include('frontend.blocks.section-testminion')

    @include('frontend.blocks.section-brand')

    @include('frontend.blocks.section-subscribe')

    @include('frontend.blocks.footer')  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="{!! asset('frontend/js/bootstrap.js') !!}"></script>
    <script src="{!! asset('frontend/js/jquery.simpleGallery.js') !!}"></script>
    <script src="{!! asset('frontend/js/jquery.simpleLens.js') !!}"></script>
    <script src="{!! asset('frontend/js/slick.js') !!}"></script>
    <script src="{!! asset('frontend/js/custom.js') !!}"></script>
    </body>
    </html>
