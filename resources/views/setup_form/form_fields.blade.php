@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Form Fields</h2>
        </div>
        <div class="pull-right" style="margin-bottom: 10px;">
            <a class="btn btn-success" href="{{ route('form.show',$form_id) }}">Create Field</a>
            <a class="btn btn-danger" href="{{ route('form.index') }}">Back</a>
        </div>
    </div>
</div>


@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
<div id="messageContent"></div>
<style>
    body
    {
        font-family: Arial;
        font-size: 10pt;
    }
    
    table
    {
        border: 1px solid #ccc;
        border-collapse: collapse;
    }
    
    table thead th
    {
        background-color: #F7F7F7;
        color: #333;
        font-weight: bold;
    }
    
    table thead th, table thead td
    {
        width: 100px;
        padding: 5px;
        border: 1px solid #ccc;
    }
    .selected
    {
        background-color: #666;
        color: #fff;
    }
</style>
<meta name="csrf-token" content="{{ csrf_token() }}">
<table class="table table-bordered" id="tblLocations">
    <thead>
        <tr>
            <th>No</th>
            {{--<!-- <th>Sort Id</th> -->--}}
            <th>Field Name</th>
            <th>Label</th>
            <th>Label Type</th>
            <th>Field Type</th>
            <th>Name</th>
            <th>Place Holder</th>
            <th>Required</th>
            <th>Max Length</th>
            <th>Show In Listing</th>
            <th>Show in ICP Chart</th>
            <th>Is-Active</th>
        </tr>
    </thead>
    <tbody class="row_position">
        @php
            $i = 0;
        @endphp
        @foreach ($form_fields as $field)
        <tr id="{{ $field->id }}">
            <td>
                <a href="{{ route('edit_form_field',$field->id) }}" style="text-decoration: none;">{{ ++$i }}</a>
            </td>
            {{--
                <!-- <td>{{ $field->position_id }}</td> -->
                --}}
            {{--<td>
                <input type="number" name="position_id" value="{{ $field->position_id }}" min="1" style="width: 50px;">
            </td>--}}
            @php
                $form_field_name = get_form_field($field->form_field_id);
            @endphp
            @foreach($form_field_name as $field_name)
            @endforeach
            <td>{{ $field_name->field_name }}</td>
            <td>{{ $field->label }}</td>
            <td>{{ $field->label_type }}</td>
            @php
                $form_field_type = get_form_field_type($field->field_type);
            @endphp
            @foreach($form_field_type as $field_type)
            @endforeach
            <td>{{ $field_type->field_type }}</td>
            <td>{{ $field->name }}</td>
            @if(empty($field->placeholder))
                @php
                    $placeholder = "N/A";
                @endphp
            @else
                @php
                    $placeholder = $field->placeholder;
                @endphp
            @endif
            <td>{{ $placeholder }}</td>
            @if($field->required===1)
                @php
                    $required = 'Yes';
                @endphp
            @else
                @php
                    $required = 'No';
                @endphp
            @endif
            <td>{{ $required }}</td>
            @if(is_null($field->max_length))
                @php
                    $max_length = "N/A";
                @endphp
            @else
                @php
                    $max_length = $field->max_length;
                @endphp
            @endif
            <td>{{ $max_length }}</td>
             @if($field->show_in_listing===1)
                @php
                    $show_in_listing = 'Yes';
                    $field_name = "show_in_listing";
                @endphp
                <td>
                    <a class="btn btn-success" href="{{ route('show_status',[$field->id,$field_name,0]) }}">{{ $show_in_listing }}</a>
                </td>
            @else
                @php
                    $show_in_listing = 'No';
                    $field_name = "show_in_listing";
                @endphp
                <td>
                <a class="btn btn-danger" href="{{ route('show_status',[$field->id,$field_name,1]) }}">{{ $show_in_listing }}</a>
                </td>
            @endif
            @if($field->show_in_icp_chart===1)
                @php
                    $icp_chart = 'Yes';
                    $field_name = "show_in_icp_chart";
                @endphp
                <td>
                <a class="btn btn-success" href="{{ route('show_status',[$field->id,$field_name,0]) }}">{{ $icp_chart }}</a>
                </td>
            @else
                @php
                    $icp_chart = 'No';
                    $field_name = "show_in_icp_chart";
                @endphp
                <td>
                <a class="btn btn-danger" href="{{ route('show_status',[$field->id,$field_name,1]) }}">{{ $icp_chart }}</a>
                </td>
            @endif
            @if($field->is_active===1)
                @php
                    $is_active = 'Yes';
                    $field_name = "is_active";
                @endphp
                <td>
                <a class="btn btn-success" href="{{ route('show_status',[$field->id,$field_name,0]) }}">{{ $is_active }}</a>
                </td>
            @else
                @php
                    $is_active = 'No';
                    $field_name = "is_active";
                @endphp
                <td>
                <a class="btn btn-danger" href="{{ route('show_status',[$field->id,$field_name,1]) }}">{{ $is_active }}</a>
                </td>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
<!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.24/themes/smoothness/jquery-ui.css" /> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js" />
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" /> -->
<!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.24/jquery-ui.min.js"></script> -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script type="text/javascript">
    $(function () {
        // $("#tblLocations").sortable({
        //     items: 'tr:not(tr:nth-child(1))',
        //     cursor: 'pointer',
        //     axis: 'y',
        //     dropOnEmpty: false,
        //     start: function (e, ui) {
        //         ui.item.addClass("selected");
        //     },
        //     stop: function (e, ui) {
        //         ui.item.removeClass("selected");
        //         $(this).find("tr").each(function (index) {
        //             if (index > 0) {
        //                 $(this).find("td").eq(1).html(index);
        //             }
        //         });
        //     }
        // });
        $( ".row_position" ).sortable({
            cursor: 'pointer',
            axis: 'y',
            dropOnEmpty: false,
            delay: 150,
            stop: function() {
                    var selectedData = new Array();

                    $('.row_position>tr').each(function() {

                        selectedData.push($(this).attr("id"));

                    });

                    updateOrder(selectedData);
                    // console.log(selectedData);
                }

        });
        function updateOrder(data) {
            var form_id = '{{ $field->form_id }}';
            // console.log(form_id);
            // console.log(data);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({

                // // data:{position:data},
                url: "{{ route('update_field_position') }}",
                        type: "POST",
                        data: {
                            form_id: form_id,
                            position:data
                        },
                        // dataType: 'json',

                success:function(result){
                    var html = '';
                    html += '<p class="alert alert-success">Position Updated Successfully.</p>'
                    $('#messageContent').append(html);
                    setTimeout(() => {
                        window.location.reload();
                    }, 1000);
                    // window.location.reload();
                    // alert("Position Updated Successfully.");
                }
                
            })
            // var html = '';
            // html += '<p>success</p>'
            // $('#messageContent').append(html);

        };
        // $ (function(){
        //     if(function(result) == true) {
        //         bootstrap_alert.warning('Message has been sent.');
        //     }
        // })
    });
</script>