@extends('admin.index')
@section('content')
<div class="page-title">
    <div class="title_left">
        <h3> {{ trans('backend.listuser') }}</h3>
    </div>
</div>
<div class="clearfix"></div>
</div>
<div class="form-group">
    <input type="text" class="form-control" placeholder="Search" id="search1" data-href="{{ route('search.user')}}">
</div>
<ul id="result">
</ul>
 <div id="table-user">
     @include('admin.User.partial-user')
 </div>
<a href="{{ action('UserController@create') }}" class="btn btn btn-primary">{{ trans('backend.add') }}</a>
</div>
</table>
</div>
@endsection
