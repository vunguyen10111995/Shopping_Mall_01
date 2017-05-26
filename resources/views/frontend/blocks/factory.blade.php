<div class="aa-sidebar-widget">
    <h3>{{ trans('fontend.category') }}</h3>
    <ul class="aa-catg-nav">
        @foreach( $category as $value )
            @foreach($value->child as $child)
                    <li><a href="{!! url('option-category', [$child->id,$child->cate_name])!!}">{!! $child->cate_name !!}</a>
                    </li> 
            @endforeach
        @endforeach
    </ul>
</div>
<div class="aa-sidebar-widget">
    <h3>{{ trans('backend.factory') }}</h3>
    <ul class="aa-catg-nav">
        @foreach( $factories as $factory)
        <li><a href="{!! action ('ProductController@listfactory', $factory['id'] )!!}">{{ $factory->factory_name }}</a></li>
        @endforeach
    </ul>
</div>
