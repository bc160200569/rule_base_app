@extends('layouts.app')

<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script> -->
@section('content')
<div class="container">
{{--  <!-- Trigger the modal with a button -->
  <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
    Open modal
  </button> -->--}}
{{--<!-- The Modal -->--}}
<div class="modal" id="addProduct">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      {{--<!-- Modal Header -->--}}
      <div class="modal-header">
        <h4 class="modal-title">Add Product</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      {{--<!-- Modal body -->--}}
      <div class="modal-body">
        <form action="{{ route('products.store') }}" method="POST">
            @csrf


            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong>
                        <input type="text" name="name" class="form-control" placeholder="Enter Product Name">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Detail:</strong>
                        <textarea class="form-control" style="height:150px" name="detail" placeholder="Product Detail ..."></textarea>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary" style="margin-top: 10px;">Submit</button>
                </div>
            </div>


        </form>
      </div>

      {{--<!-- Modal footer -->--}}
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<div class="modal" id="editProduct">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      {{--<!-- Modal Header -->--}}
      <div class="modal-header">
        <h4 class="modal-title">Edit Product</h4>
        <button type="button" class="btn-close" id="edit_form" data-bs-dismiss="modal"></button>
      </div>

      {{--<!-- Modal body -->--}}
      <div class="modal-body">
        <form action="{{ route('update_products') }}" method="PUT">
            @csrf


            <div class="row">
                <input name="pro_id" type="hidden" id="pro_id">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong>
                        <input type="text" name="pro_name" id="pro_name" class="form-control" placeholder="Enter Product Name">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Detail:</strong>
                        <textarea class="form-control" id="detail" style="height:150px" name="detail" placeholder="Product Detail ..."></textarea>
                    </div>
                </div>
                {{--<!-- <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary" style="margin-top: 10px;">Update</button>
                </div> -->--}}
            </div>

          {{--<!-- Modal footer -->--}}
          <div class="modal-footer">
            <button type="submit" class="btn btn-success">Update</button>
            <button type="button" class="btn btn-danger" id="edit_form" data-bs-dismiss="modal">Close</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>
</div>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Products</h2>
            </div>
            <div class="pull-right" style="margin-bottom: 10px;">
               {{-- 
                <!-- @can('product-create')
                <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>
                @endcan -->
                --}}
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addProduct">Create New Product</button>
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
	    @foreach ($products as $product)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $product->name }}</td>
	        <td>{{ $product->detail }}</td>
	        <td>
                <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                    @can('product-list')
                    <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>
                    @endcan
                    @can('product-edit')
                    {{--<!-- <a class="btn btn-primary" id="editProduct" value="{{ $product->id }}">Edit</a> -->--}}
                    <button type="button" value="{{ $product->id }}" class="btn btn-primary" id="editProduct">Edit</button>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('product-delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>


    {!! $products->links() !!}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $(document).on('click','#editProduct', function(){
            var pro_id = $(this).val();
            // console.log(pro_id);
            $('#editProduct').modal('show');
            $.ajax({
              type: "GET",
              url:"edit_products/" + pro_id,
              success: function (response){
                // console.log(response);
                $('#pro_id').val(pro_id);
                $('#pro_name').val(response.product.name);
                $('#detail').val(response.product.detail);
              }
            });
        });
        // $(document).on('click','#edit_form', function(){
        //     // var pro_id = $(this).val();
        //     // console.log(pro_id);
        //     $('#editProduct').modal('ata-bs-dismiss');
        // });
    })
    $(document).ready(function() {
        $(document).on('click','#edit_form', function(){
            // var pro_id = $(this).val();
            // console.log(pro_id);
            $('#editProduct').modal('destroy');
        });
      })
</script>
@endsection
