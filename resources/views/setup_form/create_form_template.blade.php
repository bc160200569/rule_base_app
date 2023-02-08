@extends('layouts.app')

@php
$title = "Create Form Fields";
@endphp
@section('title')
{{ $title }}
@endsection

@section('content')
<div class="row">
    <div class="pull-left">
        <h2>{{$form->name}}</h2>
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
@php
$count = get_form_field_position($form['id'])
@endphp

{!! Form::open(array('route' => 'savetemplate', 'method'=>'POST')) !!}
@csrf
<input class="form-control" name="form_id" type="hidden" value="{{ $form['id'] }}">

{{--<!-- <div class="row">
    <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="form-group">
            <strong>Label:</strong>
            {!! Form::text('name', null, array('class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="form-group">
            <strong>Field:</strong>
            {!! Form::text('name', null, array('class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="form-group">
            <strong>Field Type:</strong>
            {!! Form::text('name', null, array('class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12" style="margin-top: 20px ;">
        <button type="submit" class="btn btn-success">Submit</button>
    </div>
</div> -->--}}
<fieldset>
    <legend>Create Form Fields</legend>
    {{--<!-- Form Field Cut Here -->--}}
    <div id="label"></div>
    <div id="input"></div>
    <div id="formfield"></div>
        <div style="margin-top: 20px;" class="pull-right">
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
</fieldset>
    {{--<!-- <button id="addLabel" type="button" class="btn btn-info" style="margin-top: 20px;">Add Label</button> -->--}}
    <button id="addInput" type="button" class="btn btn-info" style="margin-top: 20px;">Add Input</button>
{!! Form::close() !!}

@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {

        /*------------------------------------------
        Country Dropdown Change Event
        --------------------------------------------*/
        $('#field').on('change', function() {
            var field_id = this.value;
            $("#field_type").html('');
            $.ajax({
                url: "{{url('get_form_field_type')}}",
                type: "POST",
                data: {
                    field_type : field_id,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function(result) {
                    console.log(result);
                    $('#field_type').html('<option value="">Select Field Type</option>');
                    $.each(result.field_type, function(key, value) {
                        $("#field_type").append('<option value="' + value.id + '">' + value.field_type + '</option>');
                    });
                }
            });
        });
        $('#field_type').on('change', function() {
            var field_type = this.value;
            // console.log(field_type)
            if (field_type==23 || field_type==24) {
                // console.log("name");
                $('#name').show();
            }
            else{
                $('#name').hide();
            }
        });
    });
</script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
        // Add More Labels
            $(document).on('click', '#addLabel', function () {
                var html = '';
                html += '<div id="lableField" class="row" style="margin-top: 20px;">';
                    // Start Label
                    html += '<div class="col-xs-4 col-sm-4 col-md-4" style="margin-top: 20px;">';
                        html += '<div class="form-group">';
                            html += '<strong>Field:</strong>';
                            html += '<select name="field" id="field" class="form-control">';
                                // html += '<option value="">Select Field</option>';
                                // html += '@foreach($field_data as $field)';
                                //     html += '<option value="{{ $field->id }}">{{ $field->field_name }}</option>';
                                // html += '@endforeach';
                                html += '<option value="label" selected>Label</option>';
                            html += '</select>';
                        html += '</div>';
                    html += '</div>';
                    // End Label
                    // Start Label type
                    html += '<div class="col-xs-4 col-sm-4 col-md-4" style="margin-top: 20px;">';
                        html += '<div class="form-group">';
                            html += '<strong>Field Type:</strong>';
                            html += '<select name="field_type" id="field_type" class="form-control">';
                                html += '<option value="">Select Field Type</option>';
                                html += '<option value="label">Label</option>';
                                html += '<option value="strong">Strong</option>';
                            html += '</select>';
                        html += '</div>';
                    html += '</div>';
                    // End Label type
                    // Start Lable Name
                    html += '<div class="col-xs-4 col-sm-4 col-md-4" style="margin-top: 20px;">';
                        html += '<div class="form-group">';
                            html += '<strong>Label Name:</strong>';
                            html += '<input class="form-control" name="name" type="text" autocomplete="off">';
                        html += '</div>';
                    html += '</div>';
                    // End Lable Name
                    html += '<div class="pull-right">';
                    html += '<button id="removeRow" type="button" class="btn btn-danger" style="margin-top: 20px;">Remove</button>';
                html += '</div>';
                html += '</div>';
                $('#formfield').append(html);
            });

            // Start Quiry Remove Button for Labels field
                $(document).on('click', '#removeRow', function () {
                    $(this).closest('#lableField').remove();
                });
            // End Quiry Remove Button for Labels field

        // End More Lable

        // Start Quiry For Add Input Fields
            var i = 0;
            var position = '{{ $count }}';
            // console.log(position);
            $(document).on('click', '#addInput', function(){
                ++i;
                ++position;
                // console.log(position);
                var html = '';
                html += '<div id="inputField" class="row" style="margin-top: 20px;">';
                    html += '@foreach($form as $forms)';
                    html += '@endforeach';
                        // html += '<input class="form-control" name="addmore['+i+'][form_id]" type="hidden" value="{{ $form["id"] }}">';
                        html += '<input class="form-control" name="addmore['+i+'][form_field_id]" type="hidden" value="1">';
                    html += '<div style="margin-top: 20px;">';
                    html += '<strong>Input Field:</strong>';
                    html += '</div>';

                    // Start Sorting Position Field
                    // html += '<div class="col-xs-2 col-sm-2 col-md-2" style="margin-top: 20px;">';
                        // html += '<div class="form-group">';
                            // html += '<strong>Sorting Position</strong>';
                            html += '@php';
                            html += '$count = get_form_field_position($form["id"])';;
                            html += '@endphp';
                            html += '<input class="form-control" name="addmore['+i+'][sorting_position]" type="hidden" min="1" value="'+position+'" readonly="readonly">';
                    //     html += '</div>';
                    // html += '</div>';

                    // End Sorting Position Field
                    // Start Lable Name
                    html += '<div class="col-xs-2 col-sm-2 col-md-2" style="margin-top: 20px;">';
                        html += '<div class="form-group">';
                            html += '<strong>Label</strong>';
                            html += '<input class="form-control" name="addmore['+i+'][input_label]" type="text" autocomplete="off" required>';
                        html += '</div>';
                    html += '</div>';
                    // End Lable Name
                    // Start Label type
                    html += '<div class="col-xs-2 col-sm-2 col-md-2" style="margin-top: 20px;">';
                        html += '<div class="form-group">';
                            html += '<strong>Label Type</strong>';
                            html += '<select name="addmore['+i+'][label_type]" id="input_label_type" class="form-control">';
                                // html += '<option value="">Select</option>';
                                html += '<option value="strong">Strong</option>';
                                html += '<option value="label">Label</option>';
                            html += '</select>';
                        html += '</div>';
                    html += '</div>';
                    // End Label type
                    //
                    html += '<div class="col-xs-2 col-sm-2 col-md-2" style="margin-top: 20px;">';
                        html += '<div class="form-group">';
                            html += '<strong>Type</strong>';
                            // html += '<input class="form-control" name="input_type" type="text">';
                            html += '<select name="addmore['+i+'][input_type]" id="input_type" class="form-control" required>';
                                html += '<option value="">Select Type</option>';
                                html += '@foreach($input_types as $inputtype)';
                                    html += '<option value="{{ $inputtype->id }}">{{ $inputtype->field_type }}</option>';
                                html += '@endforeach';
                                // html += '<option value="label" selected>Label</option>';
                            html += '</select>';
                        html += '</div>';
                    html += '</div>';
                    // End Lable Name
                    // //
                    // html += '<div class="col-xs-2 col-sm-2 col-md-2" style="margin-top: 20px;" id="placeholder">';
                    //     html += '<div class="form-group">';
                    //         html += '<strong>Name</strong>';
                    //         html += '<input class="form-control" name="addmore['+i+'][name]" type="text" required>';
                    //     html += '</div>';
                    // html += '</div>';
                    // //
                    html += '<div class="col-xs-2 col-sm-2 col-md-2" style="margin-top: 20px;" id="placeholder">';
                        html += '<div class="form-group">';
                            html += '<strong>Placeholder</strong>';
                            html += '<input class="form-control" name="addmore['+i+'][input_placeholder]" type="text">';
                        html += '</div>';
                    html += '</div>';
                    //
                    //
                    html += '<div class="col-xs-2 col-sm-2 col-md-2" style="margin-top: 20px;" id="required">';
                        html += '<div class="form-group">';
                            html += '<strong>Required</strong>';
                            html += '<select name="addmore['+i+'][required]" id="input_type" class="form-control" required>';
                                html += '<option value="0">No</option>';
                                html += '<option value="1">Yes</option>';
                                // html += '<option value="label" selected>Label</option>';
                            html += '</select>';
                        html += '</div>';
                    html += '</div>';
                    //
                    // Start Show on ICP Chart Field
                    html += '<div class="col-xs-2 col-sm-2 col-md-2" style="margin-top: 20px;" id="show_in_icp_chart">';
                        html += '<div class="form-group">';
                            html += '<strong>Show in ICP Chart</strong>';
                            html += '<select name="addmore['+i+'][show_in_icp_chart]" id="input_type" class="form-control" required>';
                                html += '<option value="0">No</option>';
                                html += '<option value="1">Yes</option>';
                            html += '</select>';
                        html += '</div>';
                    html += '</div>';
                    // End Show on ICP Chart Field
                    // Start Show on List Field
                    html += '<div class="col-xs-2 col-sm-2 col-md-2" style="margin-top: 20px;" id="show_in_list">';
                        html += '<div class="form-group">';
                            html += '<strong>Show in List</strong>';
                            html += '<select name="addmore['+i+'][show_in_list]" id="input_type" class="form-control" required>';
                                html += '<option value="0">No</option>';
                                html += '<option value="1">Yes</option>';
                            html += '</select>';
                        html += '</div>';
                    html += '</div>';
                    // End Show on List Field
                    // Start Active Field
                    html += '<div class="col-xs-2 col-sm-2 col-md-2" style="margin-top: 20px;" id="input_max_length">';
                        html += '<div class="form-group">';
                            html += '<strong>Min Length</strong>';
                            html += '<input class="form-control" name="addmore['+i+'][input_min_length]" type="number" min="1">';
                        html += '</div>';
                    html += '</div>';
                    // End Active Field
                    // Start Active Field
                    html += '<div class="col-xs-2 col-sm-2 col-md-2" style="margin-top: 20px;" id="input_min_length">';
                        html += '<div class="form-group">';
                            html += '<strong>Max Length</strong>';
                            html += '<input class="form-control" name="addmore['+i+'][input_max_length]" type="number" min="1">';
                        html += '</div>';
                    html += '</div>';
                    html += '<input class="form-control" name="addmore['+i+'][is_active]" value="1" type="hidden">';
                    // End Active Field
                    html += '<div class="pull-right">';
                    html += '<button id="removeinput" type="button" class="btn btn-danger" style="margin-top: 20px;">Remove</button>';
                html += '</div>';
                // html =+ '<div id="inputField" class="row" style="margin-top: 20px;">';
                // html += '<strong>Input Field:</strong>';
                // html =+ '</div>';
                // html =+ '</div>';
                $('#formfield').append(html);
            });

            // Start Quiry Remove Button for Input field
                $(document).on('click', '#removeinput', function () {
                    $(this).closest('#inputField').remove();
                });
            // End Quiry Remove Button for Input field

            // Start quiry On change Input type text related field show or hide
                $(document).on('change', '#input_type', function() {
                    var input_type = this.value;
                    // console.log(input_type)
                    // 11 meaning input type is number
                    if (input_type == 11) {
                        // console.log("name");
                        $('#input_max_length').hide();
                        $('#input_min_length').hide();
                    }
                    else{
                        $('#input_max_length').show();
                        $('#input_min_length').show();
                    }
                });
            // End quiry On change Input type text related field show or hide
            
            // // Start quiry On change Input type text related field show or hide
            //     $(document).on('change', '#input_type', function() {
            //         var input_type = this.value;
            //         // console.log(input_type)
            //         if (input_type == 19) {
            //             // console.log("name");
            //             $('#placeholder').show();
            //             $('#required').show();
            //             $('#input_max_length').show();
            //         }
            //         else{
            //             $('#placeholder').hide();
            //             $('#required').hide();
            //             $('#input_max_length').hide();
            //         }
            //     });
            // // End quiry On change Input type text related field show or hide

        // End Quiry For Add Input Fields
</script>