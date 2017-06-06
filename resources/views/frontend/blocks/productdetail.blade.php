@include('frontend.blocks.necessary')

@include('frontend.blocks.header')

@include('frontend.blocks.section-menu')

<section id="aa-product-details">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="aa-product-details-area">
                    <div class="aa-product-details-content">
                        <div class="row">
                            <div class="col-md-5 col-sm-5 col-xs-12">
                                <div class="aa-product-view-slider">
                                    <div id="demo-1" class="simpleLens-gallery-container">
                                        <div class="simpleLens-container">
                                            <div class="simpleLens-big-image-container">
                                                <a data-lens-image="" class="simpleLens-lens-image"><img src="{{ $productDetail->product_image }}" class="simpleLens-big-image" width="300"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7 col-sm-7 col-xs-12">
                                <div class="aa-product-view-content">
                                    <h3>{{ $productDetail->product_name }}</h3>
                                    <div class="aa-price-block">
                                        <span class="aa-product-view-price"> $ {{ number_format($productDetail->price, 0, ",", ".")}}</span>
                                    </div>
                                    <div class="aa-prod-view-size">
                                        @php
                                        $htmlSize = null;
                                        if (!empty($productDetail->size_id)) {
                                            $listsize = unserialize($productDetail->size_id);

                                            if (count($listsize) > 0) {
                                                if (count($listsize) == 1) {
                                                    $data = \app\models\size::where('id', $listsize)->get();
                                                } else {
                                                    $data = \app\models\size::wherein('id', $listsize)->get();
                                                }
                                            }
                                            if (!empty($data)) {
                                                foreach ($data as $key => $valuesize) {
                                                    $htmlSize[] = $valuesize->size_name;
                                                }
                                            }
                                        }

                                        $htmlColor = null;

                                        if (!empty($productDetail->color_id)) {
                                            $listcolor = unserialize($productDetail->color_id);

                                            if (count($listcolor) > 0) {
                                                if (count($listcolor) == 1) {
                                                    $data = \app\models\colors::where('id', $listcolor)->get();
                                                } else {
                                                    $data = \app\models\colors::wherein('id', $listcolor)->get();
                                                }
                                            }
                                            if (!empty($data)) {
                                                foreach ($data as $key => $valuecolor) {
                                                    $htmlColor[] = $valuecolor->color_name;
                                                }
                                            }
                                        }
                                        @endphp
                                        {{ Form::open([
                                            'method' => 'POST',
                                            'route' => ['muahang', 'id' => $productDetail->id, 'tensanpham' => $productDetail->product_name]
                                            ]) }}

                                            <h4>{{ trans('messages.size') }}</h4>
                                            @foreach ($htmlSize as $key => $size)
                                            {!! Form::label('size', $size) !!}
                                            {!! Form::radio('size',$size, ($key == 0), $attribute = [ "placeholder" => trans('backend.pleasezise')]) !!}
                                            @endforeach
                                            <h4>{{ trans('messages.color') }}</h4>
                                            <div class="aa-color-tag">
                                                @foreach ($htmlColor as $key => $color)
                                                {!! Form::label('color', $color) !!}
                                                {!! Form::radio('color', $color, ($key == 0), $attribute = [ "placeholder" => trans('backend.pleasezise'), "required" => "required"]) !!}
                                                @endforeach
                                            </div>
                                            <div class="aa-prod-quantity">
                                                <label>{{ trans('messages.quantity') }}</label>
                                                <input type="text" class="span1" id="qty" name="qty" placeholder="1" value="1" size="3" onkeypress="return isNumber(event)">
                                            </div>
                                            <div class="aa-prod-view-bottom">
                                                {!! Form::submit(trans('messages.addtocart'), ['class' => 'btn btn-success']) !!}
                                            </div>
                                            {{ Form::close() }}
                                            <div>
                                                @if (Auth::check())
                                                {{ Form::open([
                                                 'method' => 'POST',
                                                 'route' => [
                                                 'addwish',
                                                 'id' => $productDetail->id,
                                                 'tensanpham' => $productDetail->product_name
                                                 ]
                                                 ]) }}
                                                 <input type="hidden" name="idwish" value="{{ Auth::user()->id}}">
                                                 {!! Form::submit(trans('messages.wishlist'), ['class' => 'wislish btn btn-success']) !!}
                                                 {{ Form::close() }}
                                                 @endif
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <div class="aa-product-details-bottom">
                                <ul class="nav nav-tabs" id="myTab2">
                                    <li><a href="#description" data-toggle="tab">{{ trans('messages.desciption') }}</a></li>
                                    <li><a href="#review" data-toggle="tab">{{ trans('messages.comment') }} </a></li>
                                    <li><a href="#content" data-toggle="tab">{{ trans('messages.content') }} </a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade" id="description">
                                        <div class="well">
                                            <div class="alert alert-success" role="alert">{{ trans('messages.desciption') }}</div>
                                            <p>{!! $productDetail->content !!}</p>
                                        </div>
                                    </div>
                                     <div class="tab-pane fade" id="content">
                                        <div class="well">
                                            <div class="alert alert-success" role="alert">{{ trans('messages.desciption') }}</div>
                                            <p>{!! $productDetail->description !!}</p>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade " id="review">
                                     <div class="well">
                                        @if (Auth::check())
                                        <h4>
                                           {{ trans('fontend.write') }}
                                           <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                       </h4>
                                       @endif
                                       {{ Form::open([
                                        'method' => 'POST',
                                        'data-parsley-validate class' => 'form-horizontal form-label-left',
                                        'id'=>'form-comment'
                                        ]) }}
                                        <div class="form-group">
                                          @if (Auth::check())
                                            {!! Form::hidden('user_id', Auth::user()->id, ['id' => 'user_id']) !!}
                                          <div class="urlcomment" data-route="{{ url('comment') }}"></div>
                                            {!! Form::hidden('product_id', $productDetail->id, ['id' => 'product_id']) !!}
                                            {{ Form::textarea('description', null, ['size' => '30x5', 'class' => 'form-control','id' => 'desc2']) }}
                                          @endif
                                            </div>
                                          {{Form::close()}}
                                          </div>
                                          <div class="comment1" id="comments">
                                             @foreach($productDetail->comments as $cm )
                                             <div class="media">
                                                 <div class="dropdown">
                                                  @if (Auth::check())
                                                    <button class="btn dropdown-toggle" type="button" data-toggle="dropdown">
                                                      <span class="caret"></span></button>
                                                      <ul class="dropdown-menu">
                                                      @if ($cm->user->id == Auth::user()->id)
                                                        <li>
                                                          <a href="" class='edit-comment' id={{ $cm->id }}>{{ trans('fontend.edit') }}</a>
                                                        </li>
                                                        <li>
                                                        <a href="{{ action('CommentController@destroy', $cm->id) }}" class="delete-comment">{{ trans('fontend.delete') }}</a>
                                                        </li>
                                                        @endif
                                                      </ul>
                                                    </div>
                                                    @endif
                                                <div class="media-body">
                                                  <div id='edit-comment-aria'></div>
                                                  <div class="urleditcomment" data-route="{{ url('editComment') }}"></div>
                                                    <h4 class="media-heading">  {{ $cm->user->name }}
                                                        <small>
                                                            {!! $cm->created_at->diffForHumans() !!}
                                                        </small>
                                                        <br/>
                                                        <p id="content-comment{{ $cm->id }}">{{ $cm->content }}</p>
                                                    </h4>
                                                    <ul class="list-unstyle list-inline">
                                                      <li>
                                                          <button class="btn btn-xs btn-info" type="button" data-toggle="collapse" data-target="#view-comment-{{$cm->id}}" aria-expanded="false" aria-controls="#view-comment-{{$cm->id}}"><i class="fa fa-comment-o"></i>{{ trans('fontend.view') }}</button>
                                                      </li>
                                                  </ul>
                                              </div>
                                              {{ Form::open([
                                                'method' => 'GET',
                                                'data-parsley-validate class' => 'form-horizontal form-label-left',
                                                'id'=>'form-reply'
                                                ]) }}
                                                <div class="form-group">
                                                    <div class="input-group">
                                                    @if (Auth::check())
                                                       {!! Form::hidden('parent_id', $cm->id,['id' => 'parent_id']) !!}
                                                       {!! Form::hidden('user_id', Auth::user()->id, ['id' => 'user_id']) !!}
                                                       {!! Form::hidden('product_id', $productDetail->id, ['id' => 'product_id']) !!}
                                                    @endif
                                                    <div class="urlreply" data-route="{{ url('reply') }}"></div>
                                                    <input type="text" name="description"  class="form-control" placeholder={{ trans('fontend.commment')}}  id="desc3">
                                                   </div>
                                               </div>
                                               {{Form::close()}}
                                               <div class="panel-footer clearfix">
                                                <div class="collapse" id="view-comment-{{$cm->id}}">
                                                  <div class="media">
                                                    @foreach($cm->child as $child )
                                                    @if (Auth::check())
                                                    <div class="dropdown">
                                                      <button class="btn dropdown-toggle" type="button" data-toggle="dropdown" >
                                                        <span class="caret"></span></button>
                                                        <ul class="dropdown-menu">
                                                        @if ($child->user->id == Auth::user()->id)
                                                          <li><a href="" class='edit-reply' id={{ $child->id }}>{{trans('fontend.edit')}}</a></li>
                                                          <li>
                                                          <a href="{{ action('CommentController@destroy', $child->id) }}" class="delete-comment">{{ trans('fontend.delete') }}</a>
                                                          </li>
                                                        @endif
                                                        </ul>
                                                      </div>
                                                      @endif
                                                    <div class="comment2" id="comment1">
                                                        <div class="">
                                                            <div id="edit-reply-aria"></div>
                                                          <div class="urleditreply" data-route="{{ url('editReply') }}"></div>
                                                         <h4 class="media-heading">{{ $child->user->name }}
                                                            <small>
                                                                {!! $child->created_at->diffForHumans() !!}
                                                            </small>
                                                            <br/>
                                                            <p id="content-comment{{ $child->id }}">{{ $child->content }}</p>
                                                        </h4>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Related product -->
                    <div class="aa-product-related-item">
                        <h3>{{ trans('messages.relate') }}</h3>
                        <ul class="aa-product-catg aa-related-item-slider">
                            @foreach( $productCate as $item)
                            @if($item->saleoff == 0)
                            <li>
                                <figure>
                                    <a class="aa-product-img" href="{{ url('detail-product', [$item->id, $item->product_name]) }}"><img src="{!! $item->product_image !!}" alt="polo shirt img"  style="width: 250px;"></a>
                                    <a class="aa-add-card-btn" href="{{ url('detail-product', [$item->id, $item->product_name]) }}"><span class="fa fa-shopping-cart"></span>{{ trans('fontend.detail') }}</a>
                                    <figcaption>
                                        <h4 class="aa-product-title"><a href="{{ url('detail-product', [$item->id, $item->product_name]) }}">{{ $item->product_name }}</a></h4>
                                        <span class="aa-product-price">${{ number_format($item->price, 0, ",", ".")}}</span>
                                    </figcaption>
                                </figure>
                                <div class="aa-product-hvr-content">
                                    <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                                    <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                                </div>
                            </li>
                            @else
                            <li>
                                <figure>
                                    <a class="aa-product-img" href="{{ url('detail-product', [$item->id, $item->product_name]) }}"><img src="{!!  $item->product_image !!}" alt="polo shirt img"  style="width: 250px;"></a>
                                    <a class="aa-add-card-btn" href="{{ url('detail-product', [$item->id, $item->product_name]) }}"><span class="fa fa-shopping-cart"></span>{{ trans('fontend.detail') }}</a>
                                    <figcaption>
                                        <h4 class="aa-product-title"><a href="{{ url('detail-product', [$item->id, $item->product_name]) }}">{{ $item->product_name }}</a></h4>
                                        <span class="aa-product-price">${{ number_format($item->price, 0, ",", ".")}}</span>
                                    </figcaption>
                                </figure>
                                <div class="aa-product-hvr-content">
                                    <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                                    <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                                </div>
                                <span class="aa-badge aa-sale" href="#">{{ trans('fontend.sale') }}</span>
                            </li>
                            @endif
                            @endforeach
                        </ul>
                        <!-- quick view modal -->
                </div>
            </div>
        </div>
    </div>
</div>
</section>

@include('frontend.blocks.section-subscribe')

@include('frontend.blocks.footer')

@include('frontend.blocks.important')
