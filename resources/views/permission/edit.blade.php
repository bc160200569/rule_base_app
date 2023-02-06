@extends('layouts.app')
@section('content')
<div class="row">
    <div class="pull-left">
        <h2>Edit Permission</h2>
    </div>
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <a class="btn btn-danger" href="{{ route('permission.index') }}"> Back</a>
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

{!! Form::open(array('route' => ['permission.update',$data->id],'method'=>'PATCH')) !!}
@csrf
<div class="row">
    <div class="col-xs-3 col-sm-3 col-md-3">
        <div class="form-group">
            <strong>Navigation:</strong>
            <select class="form-control" id="navigation" name="navigation">
                <option value="">Select Navigation</option>
                @foreach($navigations as $nav)
                <option value="{{ $nav->id }}" <?php if ($nav->id == $data->navigation_id) echo ' selected '; ?>>{{ $nav->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-xs-3 col-sm-3 col-md-3">
        <div class="form-group">
            <strong>Sub Navigation:</strong>
            <select class="form-control" name="sub_navigation" id="sub_navigation">
            </select>
        </div>
    </div>
    <div class="col-xs-3 col-sm-3 col-md-3">
        <div class="form-group">
            <strong>Permission Name:</strong>
            {!! Form::text('name', $data->name, array('class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-3 col-sm-3 col-md-3">
        <div class="form-group">
            <strong>Route Name:</strong>
            {!! Form::text('route', $data->route, array('class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12" style="margin-top: 20px ;">
        <button type="submit" class="btn btn-success">Update</button>
    </div>
</div>
{!! Form::close() !!}

@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        var navigation_id = '<?php echo $data->navigation_id ?>';
        var sub_navigation_id = '<?php echo $data->sub_navigation_id ?>';

        /*------------------------------------------
        --------------------------------------------
        Sub Navigation Dropdown Selected Data
        --------------------------------------------
        --------------------------------------------*/
        $.ajax({
            url: "{{url('get_sub_navigation')}}",
            type: "POST",
            data: {
                navigation_id: navigation_id,
                _token: '{{csrf_token()}}'
            },
            dataType: 'json',
            success: function(result) {
                $('#sub_navigation').html('<option value="">Select Sub Navigation</option>');
                $.each(result.sub_nav, function(key, value) {

                    $("#sub_navigation").append(`<option value='${value.id}' ${value.id==sub_navigation_id ? 'selected' : ''}>${value.name}</option>`);
                });
            }
        });

        /*------------------------------------------
        --------------------------------------------
        Sub Navigation Dropdown Change Event
        --------------------------------------------
        --------------------------------------------*/
        $('#navigation').on('change', function() {
            var nav_id = this.value;
            // var nav_id = $(this).find(':selected').value()
            $("#sub_navigation").html('');
            $.ajax({
                url: "{{url('get_sub_navigation')}}",
                type: "POST",
                data: {
                    navigation_id: nav_id,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function(result) {
                    $('#sub_navigation').html('<option value="">Select Sub Navigation</option>');
                    $.each(result.sub_nav, function(key, value) {
                        $("#sub_navigation").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                }
            });
        });
    });
</script>