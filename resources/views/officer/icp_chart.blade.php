@extends('layouts.app')

@php
$title = "ICP Chart";
@endphp
@section('title')
{{ $title }}
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="center-block">
            <h2 style="text-align: center;">{{ $title }}</h2>
        </div>
    </div>
</div>
<p>Officer Basic Info</p>
<table class="table table-bordered">
{{--    
    <!-- <thead>
        <tr>
            @foreach($check_list as $list_title)
            <th>{{ $list_title->label }}</th>
            @endforeach
        </tr>
    </thead> -->
    --}}
    <tbody>
            
            
                @foreach($officer_data as $off)
                    @foreach($check_list as $list_title)
                        @php
                            $table_heading = $list_title->name;        
                        @endphp
                        <tr>
                        <th>{{ $list_title->label }}</th>
                        <td>{{ $off->$table_heading}}</td>
                        </tr>
                    @endforeach
                @endforeach
            
            
    </tbody>
</table>



@endsection