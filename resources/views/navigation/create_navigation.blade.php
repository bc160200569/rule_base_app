@extends('layouts.app')


@section('content')
<div class="row">
        <div class="pull-left">
            <h2>Create Navigation</h2>
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



{!! Form::open(array('route' => 'navigation.store','method'=>'POST')) !!}
@csrf
<div class="row">
    <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="form-group">
            <strong>Navigation Title:</strong>
            {!! Form::text('name', null, array('class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="form-group">
            <strong>Fav Icon:</strong>
            {!! Form::text('icon', null, array('class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="form-group">
            <strong>Sub Nav:</strong>
            <select name="sub_nav" id="sub_nav" class="form-control" onchange="hiden(value)">
                <option value="1" >Yes</option>
                <option value="0" selected="selected">No</option>
            </select>
        </div>
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="form-group">
            <strong>Is Show?:</strong>
            {!! Form::select('is_show', array('1' => 'Yes', '0' => 'No'), '1', array('class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4" id="route">
        <div class="form-group">
            <strong>Route:</strong>
            {!! Form::text('route', null, array('class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="form-group">
            <strong>Status:</strong>
            {!! Form::select('status', array('1' => 'Active', '0' => 'Deactive'), '1', array('class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12" style="margin-top: 20px ;">
        <button type="submit" class="btn btn-success">Submit</button>
    </div>
</div>
{!! Form::close() !!}

@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    function hiden(value)
    {
        if(value == 1)
        {
            $('#route').css('display','none');    
        }
        else
        {
            $('#route').css('display','block');
        }
        
    }
</script>