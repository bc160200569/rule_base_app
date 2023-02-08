@extends('layouts.app')

@php
$title = "Edit Sub Navigation";
@endphp
@section('title')
{{ $title }}
@endsection
@section('content')
<div class="row">
        <div class="pull-left">
            <h2>{{ $title }}</h2>
        </div>
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <a class="btn btn-danger" href="{{ route('navigation.index') }}"> Back</a>
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
@foreach($sub_navigation as $subnav)
@endforeach


{!! Form::open(array('url' => 'update_sub_navigation/'.$subnav->id,'method'=>'POST')) !!}
@csrf
<div class="row">
    <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="form-group">
            <strong>Sub Navigation Title:</strong>
            <input type="text" name="name" class="form-control" value="{{ $subnav->name }}">
        </div>
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="form-group">
            <strong>Is Show?:</strong>
            {!! Form::select('is_show', array('1' => 'Yes', '0' => 'No'), $subnav->is_show, array('class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="form-group">
            <strong>Route:</strong>
            <input type="text" name="route" class="form-control" value="{{ $subnav->route }}">
        </div>
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="form-group">
            <strong>Status:</strong>
            {!! Form::select('status', array('1' => 'Active', '0' => 'Deactive'), $subnav->status, array('class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12" style="margin-top: 20px ;">
        <button type="submit" class="btn btn-success">Update</button>
    </div>
</div>
{!! Form::close() !!}

@endsection