@extends('layouts.app')

@php
$title = "Form Fields";
@endphp
@section('title')
{{ $title }}
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <a class="btn btn-danger" href="{{ route('form.index') }}"> Back</a>
        </div>
    </div>
    <div class="pull-left">
        @foreach($forms as $form)
        @endforeach
        <h2>{{$form->formname}}</h2>
    </div>
</div>
<div class="row" style="margin-top: 20px;">
    @foreach($form_data as $data)    
    {{--<!-- {{ $data->form_field_id }} -->--}}
        @if($data->form_field_id == 1)
            @php
                $field_type = get_form_field_type($data->field_type)
            @endphp
            @foreach($field_type as $field)
            @endforeach
            @if($field->field_type == 'text' || $field->field_type == 'email' || $field->field_type == 'password' || $field->field_type == 'number')
                <div class="col-xs-4 col-sm-4 col-md-4" style="margin-top: 20px;">
                    <div class="form-group">
                        @if($data->label_type == 'label')
                            <label for="">{{ $data->label }}</label>
                        @endif
                        @if($data->label_type == 'strong')
                            <strong>{{ $data->label }}</strong>
                        @endif
                        @if($data->required == 1)
                            @php
                            $required = "required";
                            @endphp
                            <span class="required-asterisk" style="display: inline; color:red"> *</span>
                        @else
                            @php
                            $required = '';
                            @endphp
                        @endif
                        <input autocomplete="off" type="{{ $field->field_type }}" class="form-control" name="{{ $data->name }}" placeholder="{{ $data->placeholder }}" maxlength="{{ $data->max_length }}" {{ $required }}>
                    </div>
                </div>
            @endif
            @if($field->field_type == 'number')
            @endif
        @endif
        @php
        @endphp
    @endforeach
</div>
@endsection