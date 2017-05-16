<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/metisMenu/dist/metisMenu.min.css') }}">
    <link href="{!!url('admin/bootstrap/dist/css/bootstrap.min.css')!!}" rel="stylesheet">
    <link href="{!!url('admin/font-awesome/css/font-awesome.min.css')!!}" rel="stylesheet">
    <link href="{!!url('admin/build/css/custom.min.css')!!}" rel="stylesheet">
    <link href="{!!url('admin/jquery-ui/jquery-ui.css')!!}" rel="stylesheet">
</head>
<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="index.html" class="site_title"><i class="fa fa-paw"></i>
                            <span>
                                @if (Auth::check())
                                {!! Auth::user()->Full_name !!}
                                @endif
                            </span></a>
                        </div>
                        <div class="clearfix"></div>
                        <br />
                        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                            <div class="menu_section">
                                <ul class="nav side-menu">
                                    <li><a href=""><i class="fa fa-home"></i>{{trans('backend.home')}}</a></li>
                                    <li><a><i class="fa fa-user" aria-hidden="true"></i> {{trans('backend.user')}} <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="#">{{trans('backend.list_user')}}</a></li>
                                            <li><a href="#">{{trans('backend.add_user')}}</a></li>
                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-book" aria-hidden="true"></i>{{trans('backend.category')}} <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{ action('CategoryController@index') }}">{{trans('backend.list_category')}}</a></li>
                                            <li><a href="{{ action('CategoryController@create') }}">{{trans('backend.add_category')}}</a></li>
                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-shirtsinbulk" aria-hidden="true"></i> {{trans('backend.product')}} <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="#">{{trans('backend.list_product')}}</a></li>
                                            <li><a href="#">{{trans('backend.add_product')}}</a></li>
                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-paint-brush" aria-hidden="true"></i> {{trans('backend.color')}}<span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{ action('ColorController@index') }}">{{trans('backend.list_color')}}</a></li>
                                            <li><a href="{{ action('ColorController@create') }}">{{trans('backend.add_color')}}</a></li>
                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-truck"></i>{{trans('backend.size')}} <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{ action('SizeController@index') }}">{{trans('backend.list_size')}} </a></li>
                                            <li><a href="">{{trans('backend.add_size')}}</a></li>
                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-truck"></i>{{trans('backend.factories')}} <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="chartjs.html">{{trans('backend.list_factories')}}</a></li>
                                            <li><a href="chartjs2.html">{{trans('backend.add-factory')}}</a></li>
                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-envelope-o"></i>{{trans('backend.subscribes')}} <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="chartjs.html">{{trans('backend.list_subscribes')}} </a></li>
                                            <li><a href="chartjs2.html">{{trans('backend.add_subscribes')}}</a></li>
                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-comments"></i>{{trans('backend.comments')}} <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="chartjs.html">{{trans('backend.list_comments')}}</a></li>
                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-star"></i> {{trans('backend.rate')}}<span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="chartjs.html"> {{trans('backend.list_rates')}}</a></li>
                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-thumbs-up"></i> {{trans('backend.likes')}}<span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="chartjs.html">{{trans('backend.list_likes')}}</a></li>
                                        </ul>
                                    </li>

                                    <li><a><i class="fa fa-heart"></i> {{trans('backend.wishlists')}}<span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="chartjs.html"> {{trans('backend.list_wishlists')}}</a></li>
                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-check-square-o" aria-hidden="true"></i> {{trans('backend.orders')}} <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="#">{{trans('backend.list_orders')}}</a></li>
                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-pencil-square-o" aria-hidden="true"></i>{{trans('backend.order-details')}} <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="#">{{trans('backend.list_order-details')}}</a></li>
                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-credit-card-alt"></i>{{trans('backend.payments')}} <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="fixed_sidebar.html">{{trans('backend.list_payments')}}</a></li>
                                            <li><a href="fixed_footer.html">{{trans('backend.add_payments')}}</a></li>
                                        </ul>
                                    </li>{{trans('backend.list_payments')}}
                                    <li><a><i class="fa fa-truck"></i>{{trans('backend.delivers')}} <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="chartjs.html">{{trans('backend.list_delivers')}}</a></li>
                                            <li><a href="chartjs2.html">{{trans('backend.add_delivers')}}</a></li>
                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-phone" aria-hidden="true"></i>{{trans('backend.contact')}} <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="tables.html">{{trans('backend.list_contacts')}} </a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar-footer hidden-small">
                            <a data-toggle="tooltip" data-placement="top" title="Settings">
                                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="Lock">
                                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="Logout" href="">
                                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="top_nav">
                    <div class="nav_menu">
                        <nav>
                            <div class="nav toggle">
                                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                            </div>

                            <ul class="nav navbar-nav navbar-right">
                                <li class="">
                                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <img src="{!!asset('admin/images/img.jpg')!!}" alt="">
                                        <span class=" fa fa-angle-down"></span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                                        <li><a href="javascript:;"> </a></li>
                                        <li><a href="{!!url('authentication/logout')!!}"><i class="fa fa-sign-out pull-right"></i>{{trans('backend.logout')}}</a></li>
                                    </ul>
                                </li>

                                <li role="presentation" class="dropdown">
                                    <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="right_col" role="main">
                        <div class="">
                            <div class="page-title">
                                <div class="col-lg-12">
                                    @if(Session::has('flash_message'))
                                    <div class="alert alert-{!!Session::get('flash_level')!!}">
                                        {!!Session::get('flash_message')!!} 
                                    </div>
                                    @endif()
                                </div>
                                @yield('content')
                            </div>
                        </div>
                    </div>
                    <footer>
                        <div class="pull-right">
                            {{trans('backend.dailyshop-by')}}<a href="">{{trans('backend.ntd')}}</a>
                        </div>
                        <div class="clearfix"></div>
                    </footer>
                </div>
            </div>
            <div class="modal fade" id="modal-media-image">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">{{trans('backend.thư viện ảnh')}}</h4>
                        </div>
                        <div class="modal-body">
                            <iframe src="http://localhost/Shopping_Mall_01/filemanager/dialog.php?field_id=image" style="border:none; width:100%; height: 500px" ></iframe>
                        </div>
                        <div class="modal-footer">    
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="modal-id">
                <div class="modal-dialog modal-lg" style="height:100%">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body modal-lg">
                        </div>
                        <div class="modal-footer">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="modal-id1">
                <div class="modal-dialog modal-lg" style="height:60%">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body1">
                        </div>
                        <div class="modal-footer">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="edit">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="editcolor">  
                        </div>
                        <div class="modal-footer">  
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="xem-size">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>      
                        </div>
                        <div class="xem-size">    
                        </div>
                        <div class="modal-footer">   
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="sua-size">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>       
                        </div>
                        <div class="sua-size">
                        </div>
                        <div class="modal-footer"> 
                        </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript" src="{{ asset('admin/jquery/dist/jquery.min.js') }}"></script>
            <script src="{!!url('admin/bootstrap/dist/js/bootstrap.min.js')!!}"></script> 
            <script src="{!!url('admin/jquery-ui/jquery-ui.js')!!}"></script> 
            <script src="{!!url('admin/js/main.js')!!}"></script>
            <script src="{!!url('admin/js/logo.js')!!}"></script>
            <script src="{!!url('admin/build/js/custom.min.js')!!}"></script>
            <script src="{!!url('admin/js/edit.js')!!}"></script>
            <script src="{!!url('admin/js/list.js')!!}"></script>
            <script src="{!!url('admin/js/color.js')!!}"></script>
            <script src="{!!url('admin/js/editcolor.js')!!}"></script>
            <script src="{!!url('admin/js/size.js')!!}"></script>
            <script src="{!!url('admin/js/editsize.js')!!}"></script>
            <script src="{!!url('admin/js/ckeditor/ckeditor.js')!!}"></script>    
            <script src="{!!url('admin/tinymce/tinymce.min.js')!!}"></script>
            <script src="{!!url('admin/tinymce/plugins/advlist/plugin.min.js')!!}"></script>
            <script>
                var baseURL ="{!!url('/')!!}";
            </script>
            <script src="{!!url('admin/js/func_ckfinder.js')!!}"></script>
        </body>
        </html>
