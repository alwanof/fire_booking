@extends('layouts.admin-lte')
@section('breadcrumb', __('Dashboard') )
@section('content')

<div class="row">
    <div class="col-lg-3">


      <div class="card card-primary card-outline">
        <div class="card-body">
          <h5 class="card-title">{{ __('Reservation') }}</h5>

          <p class="card-text">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        {{ __('You are logged in!') }}
          </p>

        </div>
      </div><!-- /.card -->
    </div>
    <!-- /.col-md-12 -->

  </div>
  <!-- /.row -->
@endsection
