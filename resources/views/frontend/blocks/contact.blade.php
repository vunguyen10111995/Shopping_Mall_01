@include('frontend.blocks.necessary')

@include('frontend.blocks.header')

@include('frontend.blocks.section-menu')

<section id="aa-catg-head-banner">
    <img src="{!! asset('frontend/img/fashion/fashion-header-bg-8.jpg') !!}" alt="fashion img" style="height: 80%">
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
                            @if (Session::has('flash_message'))
                            <div class="alert alert-success" role="alert"><h4 class="text-center">{{ trans('fontend.contact1') }}</h4></div>
                            @else
                            <div class="alert alert-success" role="alert"><h4 class="text-center">{{ trans('fontend.pleasecontact') }}</h4></div>
                            @endif()
                                <div class="aa-contact-address-left">
                                    {{ Form::open([
                                        'method' => 'POST',
                                        'action' => 'BlocksController@store',
                                        'class' => 'comments-form contact-form',
                                        'id'=>'demo-form2'
                                        ]) }}
                                        <div class="row">
                                            <div class="error">
                                                @if ($errors->has('name'))
                                                    <span class="labelname label label-danger">
                                                        <strong>{{ $errors->first('name') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    {!! Form::text('name', $value = null, $attribute = ['class' => 'form-control', "placeholder" => trans('messages.yourname')]) !!}  
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="error1">
                                                @if ($errors->has('email'))
                                                    <span class="label label-danger">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                                <div class="form-group">
                                                    {!! Form::email('email', $value = ' ' , $attributes = ['class' => 'form-control', "placeholder" => trans('messages.pleaseemail')]) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                            <div class="error2">
                                                @if ($errors->has('txtSubject'))
                                                    <span class="label label-danger">
                                                        <strong>{{ $errors->first('txtSubject') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                                <div class="form-group">
                                                    {!! Form::text('txtSubject', $value = null, $attribute = ['class' => 'form-control', "placeholder" => trans('messages.subject')]) !!}  
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="error3">
                                                @if ($errors->has('txtCompany'))
                                                    <span class="label label-danger">
                                                        <strong>{{ $errors->first('txtCompany') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                                <div class="form-group">
                                                    {!! Form::text('txtCompany', $value = null, $attribute = ['class' => 'form-control', "placeholder" => trans('messages.company')]) !!}  
                                                </div>
                                            </div>
                                        </div>                  
                                        <div class="form-group">
                                        <div class="error4">
                                                @if ($errors->has('txtMessage'))
                                                <span class="label label-danger">
                                                    <strong>{{ $errors->first('txtMessage') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                            {{ Form::textarea('txtMessage', null, ['size' => '30x5', 'class' => 'form-control']) }}
                                        </div>
                                        {!! Form::button(trans('messages.contact'), ['class' => 'aa-secondary-btn', 'type' => 'submmit']) !!} 
                                        {{ Form::close() }}
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
@include('frontend.blocks.section-subscribe')

@include('frontend.blocks.footer')

@include('frontend.blocks.important')

