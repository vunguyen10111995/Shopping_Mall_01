{{ trans('messages.hello') }} : {{ $name }} <br/>
{{ trans('fontend.address')}} : {{ $address }} <br/>
{{ trans('fontend.phone') }} : {{ $mobile}} <br/>
{{ trans('fontend.email1') }} : {{ $email }} <br/>
<p>{{ trans('fontend.thankcustomer') }}!</p>
<br/>
<p>{{ trans('fontend.order1') }}</p>
@foreach( $Cart as $item)
+{{ trans('fontend.nameproduct') }}: {{ $item->name }} <br/>
+{{ trans('fontend.qty') }} : {{ $item->qty}} <br/>
+{{ trans('fontend.size') }} : {{ $item->options->size }} <br/>
+{{ trans('fontend.color') }} : {{ $item->options->color }} <br/>
-----------------------------------------<br/>
@endforeach
{{ trans('fontend.total') }} : {{ $total }} <br/>
----------------------------------------<br/>
{{ trans('fontend.totalpro') }} {{ $count }}