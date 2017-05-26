<section id="aa-subscribe">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="aa-subscribe-area">
                    <h3>{{ trans('fontend.subscribe') }}</h3>
                    <p>{{ trans('fontend.loremispum') }}</p>
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
