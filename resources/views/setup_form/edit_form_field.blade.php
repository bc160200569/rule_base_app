@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Form Field Edit</h2>
        </div>
        <div class="pull-right" style="margin-bottom: 10px;">

            <a class="btn btn-danger" href="{{ route('form.index') }}">Back</a>

        </div>
    </div>
</div>


@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

{!! Form::open(array('route' => 'update_form_field', 'method'=>'POST')) !!}
@csrf

<div id="inputField" class="row" style="margin-top: 20px;">
    @foreach($form_fields as $field)
    @endforeach
    {{--<!-- // <input class="form-control" name="form_id" type="hidden" value="{{ $form['id'] }}"> -->--}}
    <input class="form-control" name="form_id" type="hidden" value="{{ $field->form_id }}">
    <input class="form-control" name="field_id" type="hidden" value="{{ $field->id }}">
    <div style="margin-top: 20px;">
        <strong>Input Field:</strong>
    </div>
    {{--
    <!-- <div class="col-xs-2 col-sm-2 col-md-2" style="margin-top: 20px;">
        <div class="form-group">
            <strong>Sorting Position</strong>
            <input class="form-control" name="sorting_position" type="number" min="1" value="{{ $field->position_id }}">
        </div>
    </div> -->
    --}}
    <div class="col-xs-2 col-sm-2 col-md-2" style="margin-top: 20px;">
        <div class="form-group">
            <strong>Label</strong>
            <input class="form-control" name="input_label" type="text" autocomplete="off" value="{{ $field->label }}">
        </div>
    </div>
    <div class="col-xs-2 col-sm-2 col-md-2" style="margin-top: 20px;">
        <div class="form-group">
            <strong>Label Type</strong>
            <select name="label_type" id="input_label_type" class="form-control">
                <option value="label" <?php if($field->label_type == "label") echo 'selected';?>>Label</option>
                <option value="strong" <?php if ($field->label_type == "strong") echo 'selected';?>>Strong</option>
            </select>
        </div>
    </div>
    <div class="col-xs-2 col-sm-2 col-md-2" style="margin-top: 20px;">
        <div class="form-group">
            <strong>Type</strong>
            <select name="input_type" id="input_type" class="form-control" required>
                @foreach($input_types as $inputtype)
                <option value="{{ $inputtype->id }}" <?php if ($field->field_type == $inputtype->id) echo 'selected';?>>{{ $inputtype->field_type }}</option>
                @endforeach
            </select>
        </div>
    </div>
{{--    
    <!-- <div class="col-xs-2 col-sm-2 col-md-2" style="margin-top: 20px;">
        <div class="form-group">
            <strong>Name</strong>
            <input class="form-control" name="name" type="text" value="{{ $field->name }}">
        </div>
    </div> -->
    --}}
    <div class="col-xs-2 col-sm-2 col-md-2" style="margin-top: 20px;" id="placeholder">
        <div class="form-group">
            <strong>Placeholder</strong>
            <input class="form-control" name="input_placeholder" type="text" value="{{ $field->placeholder }}">
        </div>
    </div>
    <div class="col-xs-2 col-sm-2 col-md-2" style="margin-top: 20px;" id="required">
        <div class="form-group">
            <strong>Required</strong>
            <select name="required" id="input_type" class="form-control" required>
                <option value="0" <?php if ($field->required == 0) echo 'selected';?>>No</option>
                <option value="1" <?php if ($field->required == 1) echo 'selected';?>>Yes</option>
            </select>
        </div>
    </div>
    <div class="col-xs-2 col-sm-2 col-md-2" style="margin-top: 20px;">
        <div class="form-group">
            <strong>Show in ICP Chart</strong>
            <select name="show_in_icp_chart" id="input_type" class="form-control" required>
                <option value="0" <?php if ($field->show_in_icp_chart == 0) echo 'selected';?>>No</option>
                <option value="1" <?php if ($field->show_in_icp_chart == 1) echo 'selected';?>>Yes</option>
            </select>
        </div>
    </div>
    <div class="col-xs-2 col-sm-2 col-md-2" style="margin-top: 20px;">
        <div class="form-group">
            <strong>Show in List</strong>
            <select name="show_in_list" id="input_type" class="form-control" required>
                <option value="0" <?php if ($field->show_in_listing == 0) echo 'selected';?>>No</option>
                <option value="1" <?php if ($field->show_in_listing == 1) echo 'selected';?>>Yes</option>
            </select>
        </div>
    </div>
    <div class="col-xs-2 col-sm-2 col-md-2" style="margin-top: 20px;">
        <div class="form-group">
            <strong>Max Length</strong>
            <input class="form-control" name="input_max_length" type="number" min="1" value="{{ $field->max_length }}">
        </div>
    </div>
    <div class="col-xs-2 col-sm-2 col-md-2" style="margin-top: 20px;">
        <div class="form-group">
            <strong>Active Status</strong>
            <select name="is_active" id="is_active" class="form-control" required>
                <option value="0" <?php if ($field->is_active == 0) echo 'selected';?>>No</option>
                <option value="1" <?php if ($field->is_active == 1) echo 'selected';?>>Yes</option>
            </select>
        </div>
    </div>
    <div style="margin-top: 20px;" class="pull-right">
            <button type="submit" class="btn btn-success">Update Field</button>
    </div>
</div>
{!! Form::close() !!}

@endsection