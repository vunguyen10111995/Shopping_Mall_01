<section id="aa-subscribe">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="aa-subscribe-area">
                    <h3>{{ trans('fontend.subscribe') }}</h3>
                    <div class="col-md-4 col-md-offset-4">
                          @if (Session::has('flash_message'))
                        <div class="alert alert-success" role="alert"><h4 class="text-center">{{ trans('fontend.ordersusses') }}</h4></div>
                           @endif
                    </div>
                    {{ Form::open([
                        'method' => 'POST',
                        'action' => 'BlocksController@subcrice',
                        'class' => 'aa-subscribe-form',
                        'id'=>'demo-form2'
                    ]) }}
                        {!! Form::email('email', $value = ' ' , $attributes = ['class' => 'form-control', "placeholder" => trans('messages.pleaseemail')]) !!}
                        {!! Form::button(trans('messages.subcrice'), ['class' => 'aa-secondary-btn', 'type' => 'submmit']) !!} 
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</section>
