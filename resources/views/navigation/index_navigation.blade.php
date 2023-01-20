@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Navigation List</h2>
        </div>
        <div class="pull-right" style="margin-bottom: 10px;">
            @can('product-create')
            <a class="btn btn-success" href="{{ route('navigation.create') }}"> Create Navigation</a>
            @endcan
        </div>
    </div>
</div>


@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif


<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Title</th>
            <th>Icon</th>
            <th>Sub Nav</th>
            <th>Is Show?</th>
            <th>Route</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @php
        $i = 0;
        @endphp
        @foreach ($navigations as $navigation)
        <tr>
            <td>
                <a href="{{ route('navigation.edit',$navigation->id) }}" style="text-decoration: none;">{{ ++$i }}</a>
            </td>
            <td>{{ $navigation->name }}</td>
            <td>{{ $navigation->icon }}</td>
            @if($navigation->sub_nav===1)
            @php
            $sub_nav = 'Yes';
            @endphp
            @else
            @php
            $sub_nav = 'No';
            @endphp
            @endif
            <td>{{ $sub_nav }}</td>
            @if($navigation->is_show===1)
            @php
            $is_show = 'Yes';
            @endphp
            @else
            @php
            $is_show = 'No';
            @endphp
            @endif
            <td>{{ $is_show }}</td>
            <td>{{ $navigation->route }}</td>
            @if($navigation->status===1)
            @php
            $status = 'Active';
            @endphp
            @else
            @php
            $status = 'Deactive';
            @endphp
            @endif
            <td>{{ $status }}</td>
            <td>
                @if($navigation->sub_nav===1)
                <a href="{{ 'sub_navigation/'.$navigation->id }}">Sub Navigation</a>
                @else
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection