@extends('layouts.app')


@section('content')
<div class="row">
        <div class="pull-left">
            <h2>Edit Navigation</h2>
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



{!! Form::model($navigation, ['method' => 'PATCH','route' => ['navigation.update', $navigation->id]]) !!}
@csrf
<div class="row">
    <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="form-group">
            <strong>Navigation Title:</strong>
            <input type="text" name="name" class="form-control" value="{{$navigation->name}}">
        </div>
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="form-group">
            <strong>Fav Icon:</strong>
            <input type="text" name="icon" class="form-control" value="{{$navigation->icon}}">
        </div>
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="form-group">
            <strong>Sub Nav:</strong>
            {!! Form::select('sub_nav', array('1' => 'Yes', '0' => 'No'), $navigation->sub_nav, array('class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="form-group">
            <strong>Is Show?:</strong>
            {!! Form::select('is_show', array('1' => 'Yes', '0' => 'No'), $navigation->is_show, array('class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="form-group">
            <strong>Route:</strong>
            <input type="text" name="route" class="form-control" value="{{$navigation->route}}">
        </div>
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="form-group">
            <strong>Status:</strong>
            {!! Form::select('status', array('1' => 'Active', '0' => 'Deactive'), $navigation->status, array('class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12" style="margin-top: 20px ;">
        <button type="submit" class="btn btn-success">Update</button>
    </div>
</div>
{!! Form::close() !!}

@endsection