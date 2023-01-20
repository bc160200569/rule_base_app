@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Role</h2>
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


{!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
<div class="row">
    <div class="col-xs-4 col-sm-4 col-md-4" style="margin-bottom: 20px;">
        <div class="form-group">
            <strong>Name:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
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
                <td><label>{{ Form::checkbox('navigations[]', $nav->id, in_array($nav->id, $roleNavigations) ? true : false, array('class' => 'name')) }}
                    {{ $nav->name }}</label></td>
                <td></td>
                <td></td>
            </tr>
            @foreach ($sub_navigations as $sub_nav)
                @if ($sub_nav->nav_id === $nav->id)
                <tr>
                    <td></td>
                    <td><label>{{ Form::checkbox('sub_navigations[]', $sub_nav->id, in_array($sub_nav->id, $roleSubNavigations) ? true : false, array('class' => 'name')) }}
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
                            <td><label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                                {{ $value->name }}</label></td>
                        </tr>
                        @endif
                    @endif
                @endforeach
            @endforeach
        @endforeach
    </tbody>
</table>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center" style="margin-top: 10px;">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
{!! Form::close() !!}
@endsection