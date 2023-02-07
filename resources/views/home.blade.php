@extends('layouts.app')

@section('content')
@if (count($errors) > 0)
<div id="error" class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Welcome to Roles and Permissions App!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    // $("#error").show();
    // setTimeout(function() {
    //     $("#error").hide();
    // }, 5000);
    $(function() {
setTimeout(function() { $("#error").fadeOut(1500); }, 2000)

})
</script>
