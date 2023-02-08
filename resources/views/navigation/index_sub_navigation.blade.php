@extends('layouts.app')

<!-- @php
$nav_id = $nav_id;
@endphp -->
@php
$title = "Sub Navigation List";
@endphp
@section('title')
{{ $title }}
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>{{ $title }}</h2>
        </div>
        <div class="pull-right" style="margin-bottom: 10px;">
            @can('product-create')
            <a class="btn btn-success" href="{{ route('create_sub_navigation', $nav_id) }}"> Create Sub Navigation</a>
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
            <th>Is Show?</th>
            <th>Route</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
            @if(empty($sub_navigation))
            {{ "No Sub Navigation" }}
            @else
            @php
            $i=1;
            @endphp
            @foreach($sub_navigation as $sub_nav)
            <tr>
                <td><a href="{{ route('edit_sub_navigation',$sub_nav->id) }}" style="text-decoration: none;">{{ $i }}</a></td>
                <td>{{ $sub_nav->name }}</td>
                @if($sub_nav->is_show===1)
                @php
                $is_show = 'Yes';
                @endphp
                @else
                @php
                $is_show = 'No';
                @endphp
                @endif
                <td>{{ $is_show }}</td>
                <td>{{ $sub_nav->route }}</td>
                @if($sub_nav->status===1)
                @php
                $status = 'Active';
                @endphp
                @else
                @php
                $status = 'Deactive';
                @endphp
                @endif
                <td>{{ $status }}</td>
                @php
                $i++;
                @endphp
            </tr>
            @endforeach
            @endif
    </tbody>
</table>

@endsection