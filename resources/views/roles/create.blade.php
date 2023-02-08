@extends('layouts.app')

@php
$title = "Create Role";
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
                <a class="btn btn-danger" href="{{ route('roles.index') }}"> Back</a>
            </div>
        </div>
    </div>


    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    {!! Form::open(['route' => 'roles.store', 'method' => 'POST']) !!}
    <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4" style="margin-bottom: 20px;">
            <div class="form-group">
                <strong>Name:</strong>
                {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
            </div>
        </div>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Main Navigations</th>
                <th>Sub Navigations</th>
                <th>Permissions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($navigations as $nav)
                <tr>
                    <td><label>
                        {{--
                        <!-- {{ Form::checkbox('navigations[]', $nav->id, false, ['class' => 'name', 'id' => 'nav'.$nav->id]) }} -->
                        --}}
                                <input type="checkbox" name="navigations[]" class="nav" id="nav{{$nav->id}}" value="{{$nav->id}}" style="display: initial;">

                            {{ $nav->name }}</label></td>
                    <td></td>
                    <td></td>
                </tr>
                @foreach ($sub_navigations as $sub_nav)
                    @if ($sub_nav->nav_id === $nav->id)
                        <tr>
                            <td></td>
                            <td><label>
                                {{--
                                {{ Form::checkbox('sub_navigations[]', $sub_nav->id, false, ['class' => 'name', 'id' => 'sub_nav'.$sub_nav->id]) }}
                                --}}
                                <input type="checkbox" name="sub_navigations[]" class="sub_nav" id="sub_nav{{$sub_nav->id}}" value="{{$sub_nav->id}}" style="display: initial;">

                                    {{ $sub_nav->name }}</label></td>
                            <td></td>
                        </tr>
                    @endif
                    @foreach ($permission as $value)
                        @if ($value->navigation_id === $nav->id)
                            @if ($value->sub_navigation_id === $sub_nav->id)
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td><label>{{--{{ Form::checkbox('permission[]', $value->id, false, ['class' => 'name', 'id' => 'permission'.$value->id]) }}--}}
                                    <input type="checkbox" name="permission[]" class="permission" id="permission{{$value->id}}" value="{{$value->id}}" style="display: initial;">

                                            {{ $value->name }}</label></td>
                                </tr>
                            @endif
                        @endif
                    @endforeach
                @endforeach
            @endforeach
        </tbody>
    </table>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    {!! Form::close() !!}
@endsection
