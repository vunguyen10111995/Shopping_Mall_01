<div class="modal fade" id="quick-view-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="aa-product-view-slider">
                            <div class="simpleLens-gallery-container" id="demo-1">
                                <div class="simpleLens-container">
                                    <div class="simpleLens-big-image-container">
                                        <a class="simpleLens-lens-image" data-lens-image="img/view-slider/large/polo-shirt-1.png">
                                            <img src="" class="imageproduct" width="300">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="aa-product-view-content">
                            <h3 class="test1"></h3>
                            <div class="aa-price-block">
                                <span class="price"></span>
                            </div>
                            <p class="desc"></p>
                            <h4>{{trans('fontend.size')}}</h4>
                            <div class="aa-prod-view-size">
                                @foreach($size as $sizes)
                                {!! Form::label('size', $name = $sizes->size_name) !!} |
                                @endforeach
                            </div>
                            <h4>{{trans('fontend.color')}}</h4>
                            <div class="aa-prod-view-size">
                                @foreach($color as $colors)
                                {!! Form::label('color', $name = $colors->color_name) !!}
                                {!! Form::checkbox('color[]', $value = $colors->id,NULL ) !!}
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
