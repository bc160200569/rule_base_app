@extends('layouts.app')

@php
$title = "Form List";
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

            <a class="btn btn-success" href="{{ route('form.create') }}">Create Form</a>

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
            <th>Name</th>
            <th>Is-Active</th>
            <th>Action</th>
            <th>Create Form Template</th>
        </tr>
    </thead>
    <tbody>
        @php
        $i = 0;
        @endphp
        @foreach ($forms as $form)
        <tr>
            <td>
                <a href="{{ route('form.edit',$form->id) }}" style="text-decoration: none;">{{ ++$i }}</a>
            </td>
            <td>{{ $form->formname }}</td>
            @if($form->is_active===1)
            @php
            $is_active = 'Yes';
            @endphp
            @else
            @php
            $is_active = 'No';
            @endphp
            @endif
            <td>{{ $is_active }}</td>
            <td>
            <a class="btn btn-info" href="{{ route('showform',$form->id) }}">Form Preview</a>
            <a class="btn btn-info" href="{{ route('form_fields',$form->id) }}">Form Field List</a>
            </td>
            <td>
                <a class="btn btn-info" href="{{ route('form.show',$form->id) }}">Create Field</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection