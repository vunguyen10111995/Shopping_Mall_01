<section id="menu">
    <div class="container">
        <div class="menu-area">
            <div class="navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">{{ trans('fontend.toggle') }}</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>          
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="{!! url('/') !!}" >{{ trans('backend.home') }}</a></li>
                        @foreach( $category as $value )
                        <li><a href="{!! url('option-category', [$value->id, $value->cate_name])!!}">{!! $value->cate_name !!}<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                @foreach($value->child as $child)
                                <li><a href="{!! url('option-category', [$child->id,$child->cate_name])!!}">{!! $child->cate_name !!}</a>
                                </li> 
                                @endforeach
                            </ul>
                        </li>
                        @endforeach
                        <li><a href="{{ action('BlocksController@contact') }}" >{{ trans('backend.contact') }}</a></li>
                        <li><a href="{{ action('BlocksController@about') }}" >{{ trans('backend.about') }}</a></li>
                    </ul>
                </div>
            </div>
        </div>       
    </div>
</section>
