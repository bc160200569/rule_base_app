@extends('layouts.app')
@php
$title = "Permission";
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
            <a class="btn btn-success" href="{{ route('permission.create') }}"> Create Permisson</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Navigation</th>
        <th>Sub Navigation</th>
        <th>Permission Name</th>
        <th>Route</th>
    </tr>
    @php
    $i='';
    $navbar = navbar();
    @endphp
    @foreach ($permissions as $permission)
        <tr>
            <td><a href="{{ route('permission.edit',$permission->id) }}" style="text-decoration: none;">{{ ++$i }}</a></td>
            
            <td>
                @foreach ($navbar as $nav)
                    @if ($permission->navigation_id === $nav->id)
                        {{ $nav->name }}
                    @endif
                @endforeach
            </td>            
            @php
            $sub_nav = subnav($permission->navigation_id)
            @endphp
            <td>
                @foreach ($sub_nav as $sub)
                    @if ($permission->sub_navigation_id === $sub->id)
                        {{ $sub->name }}
                    @endif
                @endforeach
            </td>
            <td>{{ $permission->name }}</td>
            <td>{{ $permission->route }}</td>
        </tr>
    @endforeach
</table>

@endsection