@extends('layouts.app')
@section('content')

<div class="row">
    <div class="pull-left">
        <h2>Setup Form</h2>
    </div>
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <a class="btn btn-danger" href="{{ route('form.index') }}"> Back</a>
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


{{--
<!-- {!! Form::open(array('route' => 'form.store','method'=>'POST')) !!}
@csrf
<div class="row">
    <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="form-group">
            <strong>Form Name:</strong>
            {!! Form::text('name', null, array('class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12" style="margin-top: 20px ;">
        <button type="submit" class="btn btn-success">Submit</button>
    </div>
</div>
{!! Form::close() !!} -->
--}}

{!! Form::open(array('route' => 'form.store','method'=>'POST')) !!}
@csrf
<div class="row">
    <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="form-group">
            <strong>Form Name:</strong>
            {{--
                <!-- {!! Form::text('name', null, array('class' => 'form-control')) !!} -->
                --}}
            <select name="formname" id="formname" class="form-control">
                <option value="">Select Form</option>
                <option value="Officer Form">Officer Form</option>
                <option value="Post Form">Post Form</option>
                <option value="User Form">User Form</option>
                {{--<!-- @foreach($forms as $form)
                <option value="{{ $form->id }}">{{ $form->name }}</option>
                @endforeach -->--}}
            </select>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12" style="margin-top: 20px;">
            <button type="submit" class="btn btn-success">Submit</button>
    </div>
</div>
{!! Form::close() !!}

@endsection