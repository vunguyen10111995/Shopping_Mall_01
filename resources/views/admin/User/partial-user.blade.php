<table class="table table-striped table-bordered detail-view">
    <thead>
        <tr>
            <th>{{ trans('backend.stt') }}</th>
            <th>{{ trans('backend.name') }}</th>
            <th>{{ trans('backend.email') }}</th>
            <th>{{ trans('backend.sex') }}</th>
            <th>{{ trans('backend.phone') }}</th>
            <th>{{ trans('backend.level') }}</th>
            <th>{{ trans('backend.action') }}</th>
        </tr>
    </thead>
    @php 
    $stt = 0; 
    @endphp
    <tbody>
        @foreach($user as $us)
            @php 
            $stt++; 
            @endphp
            <tr>
                <td>{{ $stt }} </td>
                <td>{{ $us->full_name }}</td>
                <td>{{ $us->email }}</td>
                    @if(($us->sex) == 1)
                    <td><span class="label label-danger">{{ trans('backend.male') }}</span></td>
                    @else
                    <td><span class="label label-warning">{{ trans('backend.famale') }}</span></td>
                    @endif()
                <td>{{ $us->phone }}</td>
                    @if(($us->level) == 1)
                    <td><span class="label label-success">{{ trans('backend.admin') }}</span></td>
                    @else
                    <td><span class="label label-warning">{{ trans('backend.customer') }}</span></td>
                    @endif()
                <td>
                    {{ Form::open(array('route' => array('User.destroy', $us->id), 'id' => 'delForm', 'method' => 'DELETE')) }}
                    <button onclick = "return xacnhanxoa();" type = "button" id="delete"  class='btn btn-danger'>
                        <i class="fa fa-trash-o" aria-hidden="true"></i> {{ trans('backend.delete') }}
                    </button>
                    {{ Form::close() }}
                    {{ Form::open(array('route' => array('User.edit', $us->id), 'method' => 'GET')) }}
                    <button type = "submit" id="update" class="btn btn-primary btn-sm">
                    <i class="fa fa-pencil" aria-hidden="true"></i> {{ trans('backend.update') }}
                    </button>
                    {{ Form::close() }}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>