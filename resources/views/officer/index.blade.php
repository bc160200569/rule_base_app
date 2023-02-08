@extends('layouts.app')

@php
$title = "Officer List";
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

            <a class="btn btn-success" href="{{ route('officer.create') }}">Create Officer</a>

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
            <th>ICP Chart</th>
            @foreach($list_data as $list_title)
            <th>{{ $list_title->label }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @php
        $i = 1;
        @endphp
            @foreach($officer_data as $off)
            <tr>
                <td>{{ $i }}</td>
                <td><a href="{{ route('icp_chart',$off->id) }}">ICP Chart</a></td>
                @foreach($list_data as $list_title)
                    @php
                        $table_heading = $list_title->name;        
                    @endphp
                    <td>{{ $off->$table_heading}}</td>
                @endforeach
            </tr>
            @php
            $i++;
            @endphp
        @endforeach
    </tbody>
</table>

@endsection